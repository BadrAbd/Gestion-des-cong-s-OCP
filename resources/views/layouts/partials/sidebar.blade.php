<ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('/') ? '' : 'collapsed' }}" href="{{ url('/') }}">
            <i class="bi bi-grid"></i>
            <span>Nouvelle demande de congé</span>
        </a>
    </li>
    
    @auth
    @if(auth()->user()->is_admin)
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/demandes*') ? '' : 'collapsed' }}" href="{{ route('admin.demandes') }}">
            <i class="bi bi-list-check"></i>
            <span>Gestion des demandes</span>
        </a>
    </li>
    @endif

    <li class="nav-item">
        <a class="nav-link {{ Request::is('profile*') ? '' : 'collapsed' }}" href="{{ route('profile') }}">
            <i class="bi bi-person"></i>
            <span>Profile</span>
        </a>
    </li>

    <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <a class="nav-link collapsed" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Déconnexion</span>
            </a>
        </form>
    </li>
    @else
    <li class="nav-item">
        <a class="nav-link {{ Request::is('login') ? '' : 'collapsed' }}" href="{{ route('login') }}">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Connexion</span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{ Request::is('register') ? '' : 'collapsed' }}" href="{{ route('register') }}">
            <i class="bi bi-person-plus"></i>
            <span>Inscription</span>
        </a>
    </li>
    @endauth

    <li class="nav-item">
        <a class="nav-link {{ Request::is('contact') ? '' : 'collapsed' }}" href="{{ url('contact') }}">
            <i class="bi bi-envelope"></i>
            <span>Contact</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('faq') ? '' : 'collapsed' }}" href="{{ url('faq') }}">
            <i class="bi bi-question-circle"></i>
            <span>F.A.Q</span>
        </a>
    </li>
</ul>