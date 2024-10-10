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
                      <li class="breadcrumb-item active" aria-current="page">เพิ่ม</li>
                    </ol>
                </nav>                                
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('register.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">วันที่ลงทะเบียน</label>
                <input type="text" class="form-control myDate" name="reg_date" value="{{old('reg_date')}}">
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
            <div class="mb-3">
                <label class="form-label">กิจกรรม</label><br>            
                <select class="js-example-basic-single" name="activity_a_id">
                    <option></option>
                    @foreach ($result as $res)
                        <option value="{{$res->a_id}}">{{$res->a_date.'-'.$res->a_name}}</option>
                    @endforeach
                </select>
            </div>
            {{-- <br><hr>
            <div class="mb-3">
                <label class="form-label">วันที่ตรวจ</label>
                <input type="text" class="form-control myDate" name="exam_date" value="{{old('exam_date')}}">
            </div>
            <div class="mb-3">
                <label class="form-label">ประเภทการตรวจ</label><br>            
                <select class="js-example-basic-single" name="exam_type_id">
                    <option></option>
                    @foreach ($result2 as $res2)
                        <option value="{{$res2->type_id}}">{{$res2->type_name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">ผลตรวจ</label><br>            
                <select class="js-example-basic-single" name="exam_result">
                    <option></option>
                    @foreach ($result3 as $res3)
                        <option value="{{$res3->result_id}}">{{$res3->result_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">ชื่อผู้ตรวจ</label>
                <input type="text" class="form-control" name="exam_name" value="{{old('exam_name')}}">
            </div> --}}

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