@extends('layouts.app')
@section('content')
    <div class="card mt-4 align-middle">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                            <li class="breadcrumb-item active" aria-current="page" style="color: green">
                                <h5>รายการกิจกรรม</h5>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('activity.create') }}" class="btn btn-success">เพิ่ม</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead style="color: blue">
                    <tr>
                        <th>ID</th>
                        <th>วันที่ทำกิจกรรม</th>
                        <th>กิจกรรม</th>
                        <th>สถานที่</th>
                        <th>วันที่สิ้นสุดลงทะเบียน</th>
                        {{-- <th>สถานะ</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $res)
                        <tr>
                            <td>{{ $res->a_id }}</td>
                            <td>{{ $res->a_date }}</td>
                            <td>{{ $res->a_name }}</td>
                            <td>{{ $res->a_place }}</td>
                            <td>{{ $res->a_regis_date }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('activity.register', $res->a_id) }}" class="btn btn-outline-success">
                                        <i class="fa-solid fa-eye"></i>
                                        ดูผู้ลงทะเบียน
                                    </a>
                                    <a href="{{ route('activity.show', $res->a_id) }}" class="btn btn-outline-info m">
                                        <i class="fa-solid fa-edit"></i>
                                        แก้ไข
                                    </a>


                                    <form action="{{ route('activity.destroy', $res->a_id) }}">
                                        <a href="#" class="btn btn-outline-danger"
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
                                    })">
                                            <i class="fa-solid fa-trash"></i>
                                            ลบ
                                        </a>
                                    </form>
                                </div>
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
        new DataTable('#example', {
            scrollX: true
        });
    </script>
@endsection
