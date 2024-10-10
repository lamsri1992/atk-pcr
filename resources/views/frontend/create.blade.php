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
            <div class="mb-3" hidden>
                <label class="form-label">วันที่ลงทะเบียน</label>
                <input type="text" class="form-control myDate" name="reg_date" value="{{date("Y-m-d")}}">
            </div>
            <div class="mb-3">
                <label class="form-label">ชื่อ-สกุลผู้ลงทะเบียน</label>
                <input type="text" class="form-control" name="reg_visitor" value="{{old('reg_visitor')}}">
            </div>
            <div class="mb-3">
                <label class="form-label">ตำแหน่ง</label>
                <input type="text" class="form-control" name="reg_position" value="{{old('reg_position')}}">
            </div>
            <div class="mb-3">
                <label class="form-label">หน่วยงาน</label>
                <input type="text" class="form-control" name="reg_agency" value="{{old('reg_agency')}}">
            </div>
            <div class="mb-3">
                <label class="form-label">เบอร์โทร</label>
                <input type="text" class="form-control" name="reg_phone" value="{{old('reg_phone')}}">
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