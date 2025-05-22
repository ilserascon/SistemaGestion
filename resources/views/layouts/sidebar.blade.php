<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ url('/home') }}"><img src="{{ asset('stisla/assets/img/Logo.png') }}" alt="logo" width="50%"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ url('/home') }}"></a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Menú</li>
      @if (Auth::check() && Auth::user()->role && Auth::user()->role->nombre === 'Administrador')
        <li class="{{ request()->is('admin/users*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="fas fa-users"></i> <span>Usuarios</span></a>
        </li>

        <li class="{{ request()->is('admin/clientes*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.clientes.index') }}"><i class="fas fa-users"></i> <span>Clientes</span></a>
        </li>

        <li class="{{ request()->is('admin/empresas*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.empresas.index') }}"><i class="fas fa-users"></i> <span>Empresas</span></a>
        </li>

        @if (session('cliente_seleccionado'))
          @php
            $clienteSidebar = \App\Models\Cliente::find(session('cliente_seleccionado'));
          @endphp
          @if ($clienteSidebar)
            <li class="menu-header"></li>
            <li>
              <a class="nav-link"><i class="fas fa-user-check"></i> <span>{{ $clienteSidebar->nombre }}</span></a>
            </li>
          @endif
        @endif

      @endif
    </ul>
  </aside>
</div>
