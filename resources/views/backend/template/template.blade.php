<!DOCTYPE html>
<html>
  {{-- head --}}
@include('backend.template.component.head')
  {{-- /head --}}
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" role="button">
        Admin&nbsp;<i class="fa fa-user-circle"></i>
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
