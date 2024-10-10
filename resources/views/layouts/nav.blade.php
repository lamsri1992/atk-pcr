<nav class="navbar navbar-expand-lg navbar-dark bg-cmpho">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="{{asset('img/cmh.ico')}}" alt="Logo" width="10%" class="d-inline-block align-text-top">
          ATK-PCR
        </a>      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link" href="{{route('activity.index')}}">รายการกิจกรรม</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('activity/que')}}">จัดเรียงชุดส่งตรวจ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register.index')}}">ทะเบียนผู้ร่วมกิจกรรม</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.index')}}">รายชื่อผู้ใช้</a>
          </li>                      
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item dropdown pe-3 d-flex justify-content-end">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                {{-- <img src="{{ asset('nice/assets/img/profile-img.jpg') }}" alt="Profile"
                    class="rounded-circle"> --}}
                <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                {{-- <li class="dropdown-header">
                    <h6>{{ Auth::user()->name }}</h6>
                    <span>{{ Auth::user()->role }}</span>
                </li> --}}
                <li class="d-flex justify-content-center">
                    <a href="{{ route('profile.update') }}">{{ __('แก้ไขโปรไฟล์') }}</a>
                </li>
                {{-- <li class="d-flex justify-content-center">
                    <a href="{{ route('password.update') }}">{{ __('เปลี่ยนรหัสผ่าน') }}</a>
                </li> --}}
                <li class="d-flex justify-content-center">
                    <a href="{{ route('logout') }}">ออกจากระบบ</a>
                </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
</nav>