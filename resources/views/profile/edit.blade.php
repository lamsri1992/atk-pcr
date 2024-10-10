@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">{{ Auth::user()->name }}</a></li>
                      <li class="breadcrumb-item"><a href="{{route('register.index')}}">แก้ไขโปรไฟล์</a></li>
                      {{-- <li class="breadcrumb-item active" aria-current="page">แก้ไข</li> --}}
                    </ol>
                </nav>                                
            </div>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" name="name" value="{{old('name',$user->name)}}">
            </div>
            <div class="mb-3">
                <label class="form-label">อีเมล์</label>
                <input type="email" class="form-control" name="email" value="{{old('email',$user->email)}}">
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
    
<div class="card mt-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">{{ Auth::user()->name }}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('register.index')}}">เปลี่ยนรหัสผ่าน</a></li>
                    {{-- <li class="breadcrumb-item active" aria-current="page">เพิ่ม</li> --}}
                    </ol>
                </nav>                                
            </div>
        </div>
    </div>
    <div class="card-body">
            <form action="{{ route('password.update') }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label">รหัสผ่านปัจจุบัน</label>
                    <input type="password" class="form-control" name="current_password" value="{{old('current_password')}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">รหัสผ่านใหม่</label>
                    <input type="password" class="form-control" name="password" value="{{old('password')}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">ย้นยันรหัสผ่านใหม่</label>
                    <input type="password" class="form-control" name="password_confirmation" value="">
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
    
@endsection


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
