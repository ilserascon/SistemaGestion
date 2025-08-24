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

        <li class="{{ request()->is('admin/agenda*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.agenda.index') }}">
            <i class="fas fa-calendar-alt"></i> <span>Agenda</span>
          </a>
          
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
            <li class="menu-header">Cliente seleccionado</li>
            <li style="display: flex; align-items: center; padding: 8px 16px;">
              <i class="fas fa-user-check"></i>
              <span style="margin-left: 8px;">Cliente ({{ $clienteSidebar->nombre }} {{ $clienteSidebar->apellido }})</span>
              <a href="{{ route('admin.clientes.deseleccionar') }}"
                 class="btn btn-xs btn-light"
                 title="Deseleccionar cliente"
                 style="margin-left: auto; padding: 0 6px; font-size: 1.1rem; line-height: 1; color: #333; border: 1px solid #ccc; height: 24px; width: 24px; display: inline-flex; align-items: center; justify-content: center;">
                &times;
              </a>
            </li>

            <li class="{{ request()->is('admin/procesos_cliente*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.procesos_cliente.show', $clienteSidebar->id) }}">
                <i class="fas fa-tasks"></i> <span>Procesos</span>
              </a>
            </li>

            <li class="{{ request()->is('admin/empresas*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.empresas.index', ['cliente' => $clienteSidebar->id]) }}">
                <i class="fas fa-building"></i> <span>Empresas</span>
              </a>
            </li>
          @endif
        @endif
      @endif
    </ul> 
  </aside>
</div>
