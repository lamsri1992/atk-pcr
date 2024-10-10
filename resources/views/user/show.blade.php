@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('user.index')}}">รายชื่อผู้ใช้</a></li>
                      <li class="breadcrumb-item active" aria-current="page">แก้ไข</li>
                    </ol>
                </nav>                                
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('user.update',$data->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" name="name" value="{{$data->name}}">
            </div>
            <div class="mb-3">
                <label class="form-label">อีเมล์</label>
                <input type="email" class="form-control" name="email" value="{{$data->email}}">
            </div>

            <div class="md-3">
                <button class="btn btn-success" type="button"
                onclick="Swal.fire({
                    title: 'ยืนยันการบันทึกข้อมูล ?',
                    showCancelButton: true,
                    confirmButtonText: `<i class='fa-solid fa-check-circle'></i> ตกลง`,
                    cancelButtonText: `<i class='fa-solid fa-times-circle'></i> ยกเลิก`,
                    icon: 'success',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    } else if (result.isDenied) {
                        form.reset();
                    }
                })"
                >                    
                    บันทึก</button>
            </div>
        </form>
    </div>
</div>
    
@endsection
@section('script')
<script>
    flatpickr(".myDate", {
        "locale":"th"
    });
</script>
@endsection