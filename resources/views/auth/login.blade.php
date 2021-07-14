@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <div class="card">

                    <div class="card-body">
                        @if($errors->any())
                            <h5 class="text-center alert-danger">{{$errors->first()}}</h5>
                        @endif
                        <h4 class="text-center m-3">Вход в MW</h4>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row justify-content-center">
                                <div class="col-8 mb-2">
                                    <input id="email" type="email" placeholder="Email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-8 mb-2">
                                    <input id="password" type="password" placeholder="Пароль"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="margin-left: 1%" class="row">
                                    <div class="form-check col-6 offset-2 mb-0">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Запомнить меня') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                @if (Route::has('password.request'))
                                    <a class="btn p-0 btn-link" href="{{ route('password.request') }}">
                                        {{ __('Напомнить пароль') }}
                                    </a>
                                @endif
                            </div>

                            <div class="form-group row justify-content-center">
                                <button type="submit"  class="btn btn-primary col-7 w-100">
                                    {{ __('Войти') }}
                                </button>
                            </div>
                            <div class="row justify-content-center ">
                                <p><b>Войти как покупатель</b></p>
                            </div>
                            <div class="row">
                                <a class="offset-4 col-1" href="{{route('google_redirect')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                </svg>
                                </a>
                                <a class="offset-1 col-1" href="{{route('fb_redirect')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                    </svg>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
