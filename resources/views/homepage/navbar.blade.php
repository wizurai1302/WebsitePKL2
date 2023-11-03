<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container px-5">
        <a class="navbar-brand" href="{{ route('home.index') }}"><span class="fw-bolder text-primary">Website PKL</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                <li class="nav-item"><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('homepage.home') }}">Jurnal</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('homepage.perusahaan') }}">Perusahaan</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-user me-sm-1"></i>
                          @if(Auth::check())
                          <span class="d-sm-inline d-none">{{ Auth::user()->name }}</span>
                        @else
                        <a href="/login">
                         <span class="d-sm-inline d-none">Login</span>
                        </a>
                        @endif
                          {{-- <i class="fa fa-caret-down ml-1"></i> <!-- Ikon dropdown --> --}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                          <!-- Isi dropdown menu -->
                          <a class="dropdown-item" href="/logout">Logout</a>
                        </div>
                      </li>
            </ul>
        </div>
    </div>
</nav>
