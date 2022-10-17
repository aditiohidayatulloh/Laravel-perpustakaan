<div class="header">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon">
          <img src="{{asset('/img/logo.png')}}">
        </div>
        <div class="sidebar-brand-text mx-3"><span class="brand">Universitas Sangga Buana</span></div>
      </a>
        </div>
<div class="content">
                        <h1>Sistem Informasi Perpustakaan</h1>
                        <h2>Universitas Sangga Buana YPKP Bandung</h2>
                        @if (Route::has('login'))
                                <div class="auth">
                                    @auth
                                        <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"class="btn btn-outline-primary">Register</a>
                                        @endif
                                    @endauth
                            </div>
                            @endif
            </div>
