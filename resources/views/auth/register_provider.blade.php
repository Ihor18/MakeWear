@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center m-3">Регистрация в MW</h4>
                        <form method="POST" action="{{ route('register_provider') }}">
                            @csrf
                            <div class="form-group row justify-content-center ">

                                <div class="col-8 mb-2">
                                    <input type="text" placeholder="Название компании" class="form-control @error('companyName') is-invalid @enderror" name="companyName" value="{{ old('companyName') }}" required autocomplete="companyName" autofocus>

                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-8 mb-2">
                                    <input type="text" placeholder="Сайт" class="form-control @error('site') is-invalid @enderror" name="site" value="{{ old('site') }}" autofocus>

                                    @error('site')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-8 mb-2">
                                    <select class="form-control select" name="category[]" multiple required>
                                        <option disabled>Выберите категорию</option>
                                        <option value="clothes">Одежда</option>
                                        <option value="shoes">Обувь</option>
                                        <option value="accessories">Аксесуары</option>
                                    </select>
                                </div>
                                <div class="invalid-feedback">
                                    Select Category
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-8 mb-2">
                                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-8 mb-2">
                                    <input id="password" type="password" placeholder="Пароль" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-8 mb-2">
                                    <input id="password-confirm" type="password" placeholder="Повторите пароль" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-0">
                                <button type="submit"  class="btn btn-primary col-7 w-100">
                                    {{ __('Зарегистрироваться') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
