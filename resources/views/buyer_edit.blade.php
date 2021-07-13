@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center m-3">Редактировать пользователя</h4>
                        <form method="POST" action="{{ route('user.update',[$buyer->id,$type]) }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group row justify-content-center ">

                                <div class="col-8 mb-2">
                                    <label  class="mb-0" for="first_name">Имя</label>
                                    <input id="first_name" type="text" value="{{$buyer->first_name}}" class="form-control @error('first_name') is-invalid @enderror" name="first_name"  required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-8 mb-2">
                                    <label  class="mb-0" for="last_name">Фамилия</label>
                                    <input id="name" type="text"  value="{{$buyer->last_name}}" class="form-control @error('last_name') is-invalid @enderror" name="last_name"  required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-8 mb-2">
                                    <label  class="mb-0" for="email">Email</label>
                                    <input id="email" type="email"  value="{{$buyer->email}}" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

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
