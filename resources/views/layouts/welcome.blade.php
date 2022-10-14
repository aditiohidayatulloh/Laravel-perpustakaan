<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('/template/img/logo/logo.png')}}" rel="icon">
        <title>SIA PERPUSTKAAN|Dashboard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('/css/style.css') }}">
        <link href="{{asset('/template/css/ruang-admin.min.css')}}" rel="stylesheet">
        <link href="{{asset('/template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('/template/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="header">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon">
          <img src="{{asset('/img/logo.png')}}">
        </div>
        <div class="sidebar-brand-text mx-3"><span class="brand">Universitas Sangga Buana</span></div>
      </a>
        </div>
        <div class="container-fluid">
            <div class="row">
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
        </div>
    </body>
</html>
