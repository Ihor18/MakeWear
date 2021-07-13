@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center m-3">Редактировать пользователя</h4>
                        <form method="POST" action="{{ route('user.update',[$provider->id,'provider']) }}">
                            @method('PUT')
                            @csrf
                            <div class="form-group row justify-content-center ">
                                <div class="col-8 mb-2">
                                    <label  class="mb-0" for="company_name">Название компании</label>
                                    <input type="text" value="{{$provider->company_name}}"
                                           class="form-control @error('company_name') is-invalid @enderror"
                                           name="company_name"  required
                                           autocomplete="company_name" autofocus>
                                    @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-8 mb-2">
                                    <label  class="mb-0" for="site">Сайт</label>
                                    <input type="text" value="{{$provider->site}}"
                                           class="form-control @error('site') is-invalid @enderror" name="site"
                                            autofocus>

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
                                        <option value="clothes"
                                                @if($provider->clothes_category)
                                                selected
                                            @endif
                                        >Одежда
                                        </option>
                                        <option value="shoes"
                                                @if($provider->shoes_category)
                                                selected
                                            @endif
                                        >Обувь
                                        </option>
                                        <option value="accessories"
                                                @if($provider->accessories_category)
                                                selected
                                            @endif
                                        >Аксесуары
                                        </option>
                                    </select>
                                </div>
                                <div class="invalid-feedback">
                                    Select Category
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-8 mb-2">
                                    <label  class="mb-0" for="site">Email</label>
                                    <input id="email" type="email" value="{{$provider->email}}"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-2 justify-content-center">
                                <button type="submit" class="btn btn-primary col-7 w-100">
                                    {{ __('Изменить') }}
                                </button>
                            </div>
                        </form>
@endsection
