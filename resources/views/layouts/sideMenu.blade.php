<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/voos') }}">
        <div class="sidebar-brand-icon ">
            <img src="{{ asset('img/favicon-32x32.png') }}" alt="Logo">
        </div>
        <div class="sidebar-brand-text mx-3">Aeroporto</div>
    </a>
    @if (Session::get('usuario.cpf') != null)
        <li class="nav-item">
            <a class="nav-link" href="{{ url('usuario/historico-compras') }}" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Histórico de compras</span>
            </a>
        </li>
    @endif
    @if (Session::get('usuario.cnpj') != null)
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Gerenciamento empresa</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="register.html">Cadastrar avião</a>
                    <a class="collapse-item" href="login.html">Cadastrar voo</a>
                    <a class="collapse-item" href="forgot-password.html">Cadastrar passagem</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
    @endif

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
