@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                      <li class="breadcrumb-item"><a href="{{route('register.index')}}">รายการลงทะเบียน</a></li>
                      <li class="breadcrumb-item" aria-current="page">แก้ไข</li>
                      <li class="breadcrumb-item active" aria-current="page">ID: {{$data->reg_id}}</li>
                    </ol>
                </nav>                                
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('register.update',$data->reg_id)}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">วันที่ลงทะเบียน</label>
                <input type="text" class="form-control myDate" name="reg_date" value="{{$data->reg_date}}">
            </div>
            <div class="mb-3">
                <label class="form-label">ชื่อ-สกุลผู้ลงทะเบียน</label>
                <input type="text" class="form-control" name="reg_visitor" value="{{$data->reg_visitor}}">
            </div>
            <div class="mb-3">
                <label class="form-label">ตำแหน่ง</label>
                <input type="text" class="form-control" name="reg_position" value="{{$data->reg_position}}">
            </div>
            <div class="mb-3">
                <label class="form-label">หน่วยงาน</label>
                <input type="text" class="form-control" name="reg_agency" value="{{$data->reg_agency}}">
            </div>
            <div class="mb-3">
                <label class="form-label">เบอร์โทร</label>
                <input type="text" class="form-control" name="reg_phone" value="{{$data->reg_phone}}">
            </div>
            <div class="mb-3">
                <label class="form-label">กิจกรรม</label>
                <select class="js-example-basic-single" name="activity_a_id">
                    <option></option>
                    @foreach ($result as $res)
                        <option value="{{$res->a_id}}" 
                            {{$data->activity_a_id===$res->a_id ? 'SELECTED':''}}>{{$res->a_name}}</option>
                    @endforeach
                </select>
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