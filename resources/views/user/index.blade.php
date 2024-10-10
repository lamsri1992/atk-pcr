@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">รายชื่อผู้ใช้</a></li>
                      {{-- <li class="breadcrumb-item active" aria-current="page">รายการลงผลตรวจ<li> --}}
                    </ol>
                </nav>                                
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $res)                    
                <tr>
                    <td>{{$res->id}}</td>
                    <td>{{$res->name}}</td>
                    <td>{{$res->email}}</td>                    
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('user.show',$res->id)}}" type="button" class="btn btn-primary rounded">
                                <i class="fa-solid fa-edit"></i>
                                แก้ไข
                            </a>
                            <a href="{{route('user.reset',$res->id)}}" type="button" class="btn btn-success rounded">
                                <i class="fa-solid fa-eraser"></i>
                                Reset Password
                            </a>
                            <form action="{{route('user.destroy',$res->id)}}">
                                <button type="button" class="btn btn-danger rounded" 
                                onclick="Swal.fire({
                                    title: 'ยืนยันการลบข้อมูล ?',
                                    showCancelButton: true,
                                    confirmButtonText: `<i class='fa-solid fa-check-circle'></i> ตกลง`,
                                    cancelButtonText: `<i class='fa-solid fa-times-circle'></i> ยกเลิก`,
                                    icon: 'warning',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        form.submit();
                                    } else if (result.isDenied) {
                                        form.reset();
                                    }
                                })"
                                >       
                                <i class="fa-solid fa-trash"></i>                             
                                    ลบ
                                </button>
                            </form>
                          </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            

        </table>
    </div>
</div>
    
@endsection
@section('script')
    <script>
        new DataTable('#example',{
            scrollX:true
        });
    </script>
@endsection