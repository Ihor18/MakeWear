@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="text-center mb-3">Поставщики</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Компания</th>
                    <th scope="col">Сайт</th>
                    <th scope="col">Категории</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($first as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->company_name}}</td>
                        <td>{{$user->site}}</td>
                        <td>
                            @if($user->clothes_category)
                                Одежда,
                                @endif
                                @if($user->shoes_category)
                                    Обувь,
                                @endif
                                @if($user->accessories_category)
                                    Аксесуары
                                @endif
                        </td>
                        <td>{{$user->email}}</td>
                        <td><form method="post" action="{{route("user.delete",['id'=>$user->id,'type'=>'provider'])}}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning" href="{{route('user.edit',['id'=>$user->id,'type'=>'provider'])}}">Изменить</a>
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form></td>

                    </tr>
                @endforeach
                </tbody>
            </table>

            <h3 class="text-center mb-3">Покупатели</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Email</th>
                    <th scope="col">Тип покупателя</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($second as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>Оптовый</td>
                        <td><form method="post" action="{{route("user.delete",['id'=>$user->id,'type'=>'wholesale_buyer'])}}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning" href="{{route('user.edit',['id'=>$user->id,'type'=>'wholesale_buyer'])}}">Изменить</a>
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form></td>
                    </tr>
                @endforeach

                @foreach($third as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>Розничный</td>
                        <td><form method="post" action="{{route("user.delete",['id'=>$user->id,'type'=>'retail_buyer'])}}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning" href="{{route('user.edit',['id'=>$user->id,'type'=>'retail_buyer'])}}">Изменить</a>
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
