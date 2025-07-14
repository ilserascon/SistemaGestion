<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ url('/home') }}">
        <img src="{{ asset('stisla/assets/img/Logo.png') }}" alt="logo" width="50%">
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ url('/home') }}"></a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Menú</li>

  @if (Auth::check() && Auth::user()->role && Auth::user()->role->nombre === 'Administrador')
    <li class="{{ request()->is('admin/users*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.users.index') }}">
        <i class="fas fa-users"></i> <span>Usuario</span>
      </a>
    </li>

<li class="{{ request()->is('admin/empresas/*/organigramas*') ? 'active' : '' }}">
  <a class="nav-link" href="{{ route('admin.empresas.organigramas.index', ['empresa' => 1]) }}">
    <i class="fas fa-sitemap"></i> <span>Organigrama</span>
  </a>
</li>


    <li class="{{ request()->is('admin/procesos*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.procesos.index') }}">
        <i class="fas fa-cogs"></i> <span>Procesos</span>
      </a>
    </li>

    <li class="{{ request()->is('admin/clientes*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.clientes.index') }}">
        <i class="fas fa-users"></i> <span>Clientes</span>
      </a>
    </li>

            @if (session('cliente_seleccionado'))
          @php
            $clienteSidebar = \App\Models\Cliente::with('empresas')->find(session('cliente_seleccionado'));
          @endphp

          @if ($clienteSidebar)
            <li class="menu-header"></li>
            <li>
              <a class="nav-link" href="#">
                <i class="fas fa-user"></i>
                <strong>{{ $clienteSidebar->nombre }}</strong>
              </a>
            </li>
          @endif
        @endif
  @endif

      @if (Auth::check() && Auth::user()->role && Auth::user()->role->nombre === 'Administrador' && session()->has('cliente_seleccionado'))
          <li class="menu-header">Menú del Cliente</li>

          <li class="{{ request()->is('admin/empresas*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.empresas.index') }}">
              <i class="fas fa-building"></i> <span>Empresas</span>
            </a>
          </li>

          <li class="{{ request()->is('admin/procesos_cliente*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.procesos_cliente.index') }}">
              <i class="fas fa-users"></i> <span>Procesos del Cliente</span>
            </a>
          </li>

          <li class="{{ request()->is('admin/agenda*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.agenda.index') }}">
              <i class="fas fa-calendar"></i> <span>Agenda</span>
            </a>
          </li>
      @endif
    </ul>
  </aside>
</div>
