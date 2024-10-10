@extends('layouts.app')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                            <li class="breadcrumb-item"><a href="{{ route('activity.index') }}">รายการกิจกรรม</a></li>
                            <li class="breadcrumb-item active" aria-current="page">แก้ไข</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('activity.update', $data->a_id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">วันที่ทำกิจกรรม</label>
                    <input type="text" class="form-control myDate" name="a_date" value="{{ $data->a_date }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">ชื่อกิจกรรม</label>
                    <input type="text" class="form-control" name="a_name" value="{{ $data->a_name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">สถานที่ทำกิจกรรม</label>
                    <input type="text" class="form-control" name="a_place" value="{{ $data->a_place }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">วันที่สิ้นสุดลงทะเบียน</label>
                    <input type="text" class="form-control myDate" name="a_register_date"
                        value="{{ $data->a_regis_date }}">
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
                })">
                        บันทึก</button>
                </div>
            </form>
            <div>
                <br>

                <p>
                    {{$url}}
                </p>
                {{-- &nbsp;&nbsp;&nbsp;<i class="fa-solid fa-copy"></i><br><br> --}} <br>




                <p id="container" >{!! $simple !!}</p>
                    <button id="download" class="mt-2 btn btn-dark btn-sm" onclick="downloadSVG()">Download SVG</button><br>
                    <input type="hidden" id="a_hashurl" class="form-control text-center" value="{{ $data->a_hashurl }}" @readonly(true)>
                
                {{-- <input type="text" value="https://8785-61-19-145-132.ngrok-free.app/frontend/activity/{{$data->a_hashurl}}" class="form-control"> --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        flatpickr(".myDate", {
            "locale": "th",
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        function downloadSVG() {
        const svg = document.getElementById('container').innerHTML;
        const blob = new Blob([svg.toString()]);
        const element = document.createElement("a");
        var value = document.getElementById('a_hashurl').value;
        element.download = value + ".svg";
        element.href = window.URL.createObjectURL(blob);
        element.click();
        element.remove();
    }
    </script>
@endsection
