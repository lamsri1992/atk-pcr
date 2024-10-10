@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                      <li class="breadcrumb-item"><a href="{{route('activity.index')}}">จัดเรียงชุดส่งตรวจ</a></li>
                      {{-- <li class="breadcrumb-item active" aria-current="page">เพิ่ม</li> --}}
                    </ol>
                </nav>                                
            </div>
        </div>
    </div>
    <div class="card-body">
    <form action="{{route('activity.queupdate')}}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-barcode"></i></span>
            <input type="text" class="form-control" placeholder="Barcode" aria-label="barcode" name="barcode" aria-describedby="basic-addon1">
          </div>
          {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
    </form>

    </div>
</div>
    
@endsection
@section('script')
<script>
    flatpickr(".myDate", {
        "locale":"th",
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

</script>
@endsection