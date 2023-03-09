<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif
    

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                <div class="user-panel mt-0,5 pb-1 mb-1 d-flex">
        <div class="info">
          <a href="masyarakat.index" class="d-block">Halaman Pengaduan</a>
        </div>
      </div>
    
                <a class="nav-link" href="{{route('user.index')}}" 
               class="user-panel mt-3 pb-3 mb-3 d-flex">
               <i class="nav-icon fas fa-user "></i>Petugas</a>
                
                <li>
                <a href="{{ route('masyarakat.index') }}" class="nav-link active">
              <i class="nav-icon fas fa-balance-scale "></i>
              <p>Tanggapan Pengaduan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            </ul>
        </nav>
    </div>

</aside>
