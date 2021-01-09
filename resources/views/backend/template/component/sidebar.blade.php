<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item has-treeview menu-open">
        <a href="{{ route('dashboard') }}" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('menu-engine') }}" class="nav-link">
          <i class="nav-icon fas fa-users-cog"></i>
          <p>
            Menu Engine
          </p>
        </a>
      </li>
      @foreach(session()->get('hak_akses') as $menu)
      <li class="nav-item">
        <a href="{{ route('menu-engine') }}" class="nav-link">
          <i class="nav-icon <?= $menu->menu_level_1_icon ?>"></i>
          <p>
            {{$menu->menu_level_1_nama}}
            @if($menu->menu_level_1_status != NULL)
              <i class="fas fa-angle-left right"></i>
            @endif
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/tables/simple.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Simple Tables</p>
            </a>
          </li>
        </ul>
      </li>
      @endforeach
    </ul>
</nav>