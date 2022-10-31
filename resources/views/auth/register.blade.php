@extends('layouts.welcome')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-lg text-dark">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }} ">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-dark">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="npm" class="col-md-4 col-form-label text-md-end text-dark">{{ __('NPM') }}</label>

                            <div class="col-md-6">
                                <input id="npm" type="text" class="form-control @error('npm') is-invalid @enderror" name="npm" value="{{ old('npm') }}">

                                @error('npm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="prodi" class="col-md-4 col-form-label text-md-end text-dark">{{ __('Program Studi') }}</label>

                            <div class="col-md-6">
                                <input id="prodi" type="text" class="form-control @error('prodi') is-invalid @enderror" name="prodi" value="{{ old('prodi') }}">

                                @error('prodi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end text-dark" >Alamat</label>

                            <div class="col-md-6">
                               <textarea name="alamat" id="" class="form-control @error('alamat') is-invalid @enderror">{{old('alamat')}}</textarea>
                               @error('alamat')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="notelp" class="col-md-4 col-form-label text-md-end text-dark">{{ __('No.telp') }}</label>

                            <div class="col-md-6">
                                <input id="notelp" type="text" class="form-control @error('noTelp') is-invalid @enderror" name="noTelp" value="{{ old('noTelp') }}">

                                @error('noTelp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-dark">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-dark">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end text-dark">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        <div class="row mb-0">
                        <span class="col-md-8 mb-3 text-md-end text-dark">Sudah Punya Akun ? <a href="{{ route('login') }}" class="p-0">login</a></span>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-5 offset-md-4">
                                <button type="submit" class="btn btn-primary px-5">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
