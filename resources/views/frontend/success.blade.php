@extends('layouts.appfrontend')
@section('content')
    <div class="card mt-4">
        <div class="card-body text-center">
            <h1>
                <i class="fa-solid fa-check-circle text-success"></i>
                คุณ {{ $visitor}} 
                ลงทะเบียนกิจกรรม <br>
                 {{ $aid->a_name}} สำเร็จแล้ว
            </h1><br>
            <h3>
                <p> กรุณามาตรวจ ATK/PCR<br>
                    วันที่ {{ DateTimeThai($aid->a_date) }} <br>                
                 ณ. {{ $aid->a_place }}
                <br>
                (และบันทึกหน้าจอเก็บไว้ เพื่อแจ้งชื่อต่อเจ้าหน้าที่)
            </p>
            </h3>
        </div>
    </div>
@endsection
@section('script')
@endsection
