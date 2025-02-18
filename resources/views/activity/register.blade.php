@extends('layouts.app')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('activity.index') }}">รายการกิจกรรม</a></li>
                            <li class="breadcrumb-item active" aria-current="page">รายชื่อผู้ลงทะเบียนกิจกรรม
                            <li>
                        </ol>
                    </nav>
                </div>
                {{-- <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ route('register.create') }}" class="btn btn-success">เพิ่ม</a>
                </div> --}}
            </div>
        </div>
        <div class="card-body">
            <table id="pdf_table" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>วันที่</th>
                        <th>CID</th>
                        <th>ชื่อผู้ลงทะเบียน</th>
                        <th>วันเกิด</th>
                        <th>อายุ</th>
                        <th>เบอร์โทร</th>
                        <th>ที่อยู่</th>
                        <th>กิจกรรม</th>
                        <th>วันที่ตรวจ</th>
                        <th>สถานะ</th>
                        <th>ลำดับ</th>
                        <th>พิมพ์</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $res)
                        <tr>
                            <td>{{ $res->reg_id }}</td>
                            <td>{{ date('d/m/Y', strtotime($res->reg_date)) }}</td>
                            <td>{{ $res->reg_cid }}</td>
                            <td>{{ $res->reg_prefix.$res->reg_visitor }}</td>
                            <td>{{ date('d/m/Y', strtotime('+543 years',strtotime($res->reg_dob))) }}</td>
                            <td>{{ $res->reg_age }}</td>
                            <td>{{ $res->reg_phone }}</td>
                            <td>
                                @php $adr = explode(",",$res->reg_address) @endphp
                                {{ "บ้านเลขที่ ".$adr[0]." หมู่ ".$adr[1]." ตำบล".$adr[2]." อำเภอ".$adr[3]." จังหวัด".$adr[4]." รหัสไปรษณีย์ ".$adr[5] }}
                            </td>
                            <td>{{ $res->a_name }}</td>
                            <td>{{ $res->exam_date }}</td>
                            <td>{{ $res->reg_status }}</td>
                            <td>{{ $res->reg_qr }}</td>
                            {{-- <td>
                        @if (!isset($res->exam_result))
                            <span class="text-warning">ไม่มีผลผลตรวจ</span>
                        @else
                            @if ($res->exam_result == 1)
                                <span class="text-success">บวก</span>
                            @else
                            <span class="text-danger">ลบ</span>
                            @endif
                            
                        @endif
                    </td> --}}
                            <td>
                                <a href="{{ route('activity.rprint', $res->reg_id) }}" class="btn btn-outline-success">
                                    <i class="fa-solid fa-print"></i>
                                    ลาเบล
                                </a>
                                {{-- <ul class="navbar-nav">
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
                        </ul> --}}
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
            // scrollX:true,
            responsive: true,
            layout: {
                topStart: {
                    buttons: ['excel', 'print']
                }
            }
        });
    </script>
@endsection
