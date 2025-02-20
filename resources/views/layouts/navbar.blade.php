<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container-fluid">
        {{-- Logo --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.svg') }}" alt="Sneat" height="30" class="me-2">
            <span class="fw-bold">sneat</span>
        </a>

        {{-- Navbar items aligned to the right --}}
        <div class="d-flex align-items-center">
            {{-- Search Icon --}}
            <button class="btn btn-link text-dark me-3">
                <i class="bi bi-search fs-5"></i>
            </button>

            {{-- Globe Icon --}}
            <button class="btn btn-link text-dark me-3">
                <i class="bi bi-globe fs-5"></i>
            </button>

            {{-- Theme Toggle --}}
            <button class="btn btn-link text-dark me-3">
                <i class="bi bi-sun fs-5"></i>
            </button>

            {{-- Grid Icon --}}
            <button class="btn btn-link text-dark me-3">
                <i class="bi bi-grid fs-5"></i>
            </button>

            {{-- Notification Bell --}}
            <button class="btn btn-link text-dark me-3 position-relative">
                <i class="bi bi-bell fs-5"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    2
                </span>
            </button>

            {{-- Profile Picture --}}
            <div class="dropdown">
                <button class="btn p-0" type="button" data-bs-toggle="dropdown">
                    <img src="{{ asset('images/profile.jpg') }}" alt="Profile" 
                         class="rounded-circle" width="40" height="40">
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>