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
          
          <a class="nav-link" href="{{ route('admin.procesos.index') }}"><i class="fas fa-users"></i> <span>Procesos</span></a>
          <a class="nav-link" href="{{ route('admin.clientes.index') }}"><i class="fas fa-users"></i> <span>Clientes</span></a>
          <a class="nav-link" href="{{ route('admin.empresas.index') }}"><i class="fas fa-users"></i> <span>Empresas</span></a>
          <a class="nav-link" href="{{ route('admin.procesos_cliente.index') }}"><i class="fas fa-users"></i> <span>Procesos del Cliente</span></a>
        </li>
      @endif
      @if (Auth::check() && Auth::user()->role && Auth::user()->role->nombre === 'Cliente')
        <li class="menu-header">Menú del Cliente</li>
        <li class="{{ request()->is('cliente/empresas*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('cliente.empresas.index') }}"><i class="fas fa-building"></i> <span>Empresas</span></a>
        </li>
        <li class="{{ request()->is('cliente/procesos*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('cliente.procesos.index') }}"><i class="fas fa-tasks"></i> <span>Procesos</span></a>
        </li>
        <li class="{{ request()->is('cliente/agenda*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('cliente.agenda.index') }}"><i class="fas fa-calendar"></i> <span>Agenda</span></a>
        </li>
      @endif
    </ul>
  </aside>
</div>
