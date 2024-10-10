@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                      <li class="breadcrumb-item active" aria-current="page">รายการลงทะเบียน<li>
                    </ol>
                </nav>                                
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a href="{{route('register.create')}}" class="btn btn-success">เพิ่ม</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>วันที่</th>
                    <th>ชื่อผู้ลงทะเบียน</th>
                    <th>เบอร์โทร</th>
                    <th>หน่วยงาน</th>
                    <th>กิจกรรม</th>
                    <th>ผลตรวจ</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $res)                    
                <tr>
                    <td>{{$res->reg_id}}</td>
                    <td>{{$res->reg_date}}</td>
                    <td>{{$res->reg_visitor}}</td>
                    <td>{{$res->reg_phone}}</td>
                    <td>{{$res->reg_agency}}</td>
                    <td>{{$res->a_name}}</td>
                    <td>
                        @if (!isset($res->exam_result))
                            <span class="text-warning">ไม่มีผลผลตรวจ</span>
                        @else
                            @if ($res->exam_result==1)
                                <span class="text-success">บวก</span>
                            @else
                            <span class="text-danger">ลบ</span>
                            @endif
                            
                        @endif
                    </td>
                    <td>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-hand-pointer"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{route('register.showexam',$res->reg_id)}}" class="dropdown-item">
                                            <i class="fa-solid fa-vial"></i>
                                            ลงผลตรวจ
                                        </a>                                
                                    </li>
                                  <li>
                                    <a href="{{route('register.show',$res->reg_id)}}" class="dropdown-item">
                                        <i class="fa-solid fa-edit"></i>
                                        แก้ไข
                                    </a>                                
                                </li>
                                  <li>
                                    <form action="{{route('register.destroy',$res->reg_id)}}">
                                        <a class="dropdown-item" href="#"
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
                                        </a>
                                    </form>
                                </ul>
                              </li>
                        </ul>
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
            // scrollX:true,
            responsive: true
        });
    </script>
@endsection