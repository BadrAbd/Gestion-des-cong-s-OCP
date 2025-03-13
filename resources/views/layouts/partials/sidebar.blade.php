<ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('/') ? '' : 'collapsed' }}" href="{{ url('/') }}">
            <i class="bi bi-grid"></i>
            <span>Nouvelle demande de congé</span>
        </a>
    </li>
    
    <!--<li class="nav-item">
        <a class="nav-link {{ Request::is('profile') ? '' : 'collapsed' }}" href="{{ url('profile') }}">
            <i class="bi bi-person"></i>
            <span>Profile</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('login') ? '' : 'collapsed' }}" href="{{ url('login') }}">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Login</span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{ Request::is('register') ? '' : 'collapsed' }}" href="{{ url('register') }}">
            <i class="bi bi-person-plus"></i>
            <span>Register</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('contact') ? '' : 'collapsed' }}" href="{{ url('contact') }}">
            <i class="bi bi-envelope"></i>
            <span>Contact</span>
        </a>
    </li> -->

    <li class="nav-item">
        <a class="nav-link {{ Request::is('faq') ? '' : 'collapsed' }}" href="{{ url('faq') }}">
            <i class="bi bi-question-circle"></i>
            <span>F.A.Q</span>
        </a>
    </li>
</ul>