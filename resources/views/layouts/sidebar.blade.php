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

        <li class="{{ (request()->is('admin/procesos*') && !request()->is('admin/procesos_cliente*')) ? 'active' : '' }}">
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
            <li class="{{ request()->is('admin.procesos_cliente*') ? 'active' : '' }}" style="display: flex; align-items: center;">
              <a class="nav-link" href="{{ route('admin.procesos_cliente.show', $clienteSidebar->id) }}" style="flex:1;">
                <i class="fas fa-user-check"></i>
                <span>Cliente ({{ $clienteSidebar->nombre }} {{ $clienteSidebar->apellido }})</span>
              </a>
              <form action="{{ route('admin.clientes.deseleccionar') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit"
                  class="btn btn-xs btn-light"
                  title="Deseleccionar cliente"
                  style="margin-left: 4px; padding: 0 6px; font-size: 1.1rem; line-height: 1; color: #333; border: 1px solid #ccc; height: 24px; width: 24px; display: inline-flex; align-items: center; justify-content: center;">
                  &times;
                </button>
              </form>
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

        @php
          $clienteSidebar = \App\Models\Cliente::find(session('cliente_seleccionado'));
        @endphp
        @if ($clienteSidebar)
          <li class="menu-header"></li>
          <li>
            <div class="d-flex align-items-center" style="padding-left: 15px; width: 100%;">
              <i class="fas fa-user-check"></i>
              <span style="margin-left: 8px;">{{ $clienteSidebar->nombre }} {{ $clienteSidebar->apellido }}</span>
              <a href="{{ route('admin.clientes.deseleccionar') }}"
                 class="btn btn-xs btn-light"
                 style="margin-left: auto; margin-right: 8px; padding: 0; font-size: 1.1rem; line-height: 1; color: #333; border: 1px solid #ccc; height: 20px; width: 20px; display: flex; align-items: center; justify-content: center;">
                &times;
              </a>
            </div>
          </li>
        @endif
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
