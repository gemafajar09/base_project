<!DOCTYPE html>
<html>
  {{-- head --}}
@include('backend.template.component.head')
  {{-- /head --}}
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i style="color:#1368a9" class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="#" class="nav-link" role="button">
        Admin&nbsp;<i style="color:#093f91" class="fa fa-user-circle"></i>
        </a>
      </li>
      <li class="nav navbar-nav dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i style="color:#fc035a" class="fas fa-cogs"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ route('menu-engine') }}">
            <i class="fas fa-users-cog fa-sm fa-fw mr-2 text-gray-400"></i>
            Menu Engine
          </a>
          <a class="dropdown-item" href="{{route('akses')}}">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Akses Akun
          </a>
          <a class="dropdown-item" href="{{route('router')}}">
            <i class="fas fa-code-branch fa-sm fa-fw mr-2 text-gray-400"></i>
            Routing
          </a>
          {{-- <div class="dropdown-divider"></div> --}}
        </div>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" role="button">
        <i style="color:#fcb103" class="fas fa-users-cog"></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('logout')}}" class="nav-link" role="button">
        <i style="color:#03befc" class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link">
      <img src="{{asset('/image/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Mediatama</span>
    </a>

    <div class="sidebar">
      @include('backend.template.component.sidebar')
    </div>
    
  </aside>

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>
  @include('backend.template.component.footer')
</div>
  @include('backend.template.component.script')
</body>
</html>
