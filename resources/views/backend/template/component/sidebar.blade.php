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
      @foreach(session()->get('hak_akses') as $menu)
      <li class="nav-item">
        <a href="{{ route('menu-engine') }}" class="nav-link">
          <i class="nav-icon <?= $menu->menu_icon ?>"></i>
          <p>
            {{$menu->menu_nama}}
            @if($menu->menu_status != NULL)
              <i class="fas fa-angle-left right"></i>
            @endif
          </p>
        </a>
        {{-- menu level 2 --}}
        @if($menu->menu_status != NULL)
        <ul class="nav nav-treeview">
          <?php $menu_level2 = DB::table('tb_akses')->leftjoin('tb_menu','tb_akses.menu_id','tb_menu.menu_id')->where('tb_akses.admin_id',session()->get('admin_id'))->where('tb_menu.menu_level','2')->where('tb_menu.menu_drop_id',$menu->menu_id)->get(); ?>
          @foreach($menu_level2 as $menu_level2)
          <li class="nav-item">
            <a href="pages/tables/simple.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>{{$menu_level2->menu_nama}}</p>
              @if($menu_level2->menu_status != NULL)
              <i class="fas fa-angle-left right"></i>
            @endif
            </a>
            {{-- menu level 3 --}}
            @if($menu_level2->menu_status != NULL)
            <ul class="nav nav-treeview">
              <?php $menu_level3 = DB::table('tb_akses')->leftjoin('tb_menu','tb_akses.menu_id','tb_menu.menu_id')->where('tb_akses.admin_id',session()->get('admin_id'))->where('tb_menu.menu_level','3')->where('tb_menu.menu_drop_id',$menu_level2->menu_id)->get(); ?>
              @foreach($menu_level3 as $menu_level3)
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{$menu_level3->menu_nama}}</p>
                </a>
              </li>
              @endforeach
            </ul>
            @endif
            {{-- /menu level 3 --}}
          </li>
          @endforeach
        </ul>
        @endif
        {{-- /menu level 2 --}}
      </li>
      @endforeach
    </ul>
</nav>