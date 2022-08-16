<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container">
        <a href="{{route('beranda')}}" id="navbar-brand"> Bengkel Slamet Tehnik</a>
        <div class="d-flex" role="search">
            <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" href=""> Home </a> </li>
                <li class="nav-item"> <a class="nav-link" href=""> About </a> </li>
                <li class="nav-item"> <a class="nav-link" href="#layanan-kami"> Layanan </a> </li>
                @guest
                    <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}"> Login </a> </li>
                @endguest
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->username }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item link-dark" href="{{route('user.pengaturan-akun')}}">Pengaturan Akun</a></li>
                            <li><a class="dropdown-item link-dark" href="{{route('user.transaksi-user')}}">Pesanan anda</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                                    class="dropdown-item text-dark"> Logout </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>

                @endauth
            </ul>
        </div>
    </div>
</nav>
