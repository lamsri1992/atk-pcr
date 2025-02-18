@extends('layouts.appfrontend')
@section('content')
<div class="card mt-4">
    <div class="card-header">            
            <h5><i class="fa-regular fa-address-card"></i> ลงทะเบียนเข้าร่วมงาน {{$result->a_name}} 
                @php
                    $date = date("d/m/Y", strtotime($result->a_date) );
                @endphp
                วันที่ {{$date}}
                </h5>
    </div>
    <div class="card-body">
        <form action="{{route('frontend.store',$result->a_id)}}" method="post">
            @csrf
            <div class="row">
                <div class="mb-3" hidden>
                    <label class="form-label">วันที่ลงทะเบียน</label>
                    <input type="text" class="form-control" name="reg_date" value="{{date("Y-m-d")}}">
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">เลขบัตรประจำตัวประชาชน</label>
                    <input type="text" class="form-control" name="reg_cid" value="{{old('reg_cid')}}">
                </div>
                <div class="mb-3 col-md-2">
                    <label class="form-label">คำนำหน้า</label>
                    <input type="text" class="form-control" name="reg_prefix" value="{{old('reg_prefix')}}">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">ชื่อ-สกุลผู้ลงทะเบียน</label>
                    <input type="text" class="form-control" name="reg_visitor" value="{{old('reg_visitor')}}">
                </div>
                <div class="mb-3 col-md-2">
                    <label class="form-label">วันที่เกิด</label>
                    <input type="text" class="form-control myDate" name="reg_dob" value="{{old('reg_dob')}}">
                </div>
                <div class="mb-3 col-md-2">
                    <label class="form-label">อายุ</label>
                    <input type="text" class="form-control" name="reg_age" value="{{old('reg_age')}}">
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">เบอร์โทร</label>
                    <input type="text" class="form-control" name="reg_phone" value="{{old('reg_phone')}}">
                </div>
                {{-- <div class="mb-3 col-md-4">
                    <label class="form-label">ตำแหน่ง</label>
                    <input type="text" class="form-control" name="reg_position" value="{{old('reg_position')}}">
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label">หน่วยงาน</label>
                    <input type="text" class="form-control" name="reg_agency" value="{{old('reg_agency')}}">
                </div> --}}
                <div class="mb-3 col-md-3">
                    <label class="form-label">บ้านเลขที่</label>
                    <input type="text" class="form-control" name="no" value="{{old('no')}}">
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">หมู่ที่</label>
                    <input type="text" class="form-control" name="moo" value="{{old('moo')}}">
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">ตำบล</label>
                    <input type="text" class="form-control" name="sub_district" value="{{old('sub_district')}}">
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">อำเภอ</label>
                    <input type="text" class="form-control" name="district" value="{{old('district')}}">
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">จังหวัด</label>
                    <input type="text" class="form-control" name="province" value="{{old('province')}}">
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" name="zipcode" value="{{old('zipcode')}}">
                </div>
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
                    <i class="fa-solid fa-user-edit"></i>
                    ลงทะเบียนเข้าร่วมงาน
                </button>
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