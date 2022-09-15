@extends('index')

@section('title', 'Страница регистрации')

@section('content')
    <div class="container p-4">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <form action="{{route('login')}}" method="POST">
                    @if(session()->has('success'))
                        <h3>Авторизация успешно выполнена</h3>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Ваше ФИО</label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               id="inputName"
                               name="fullname"
                               aria-describedby="invalidName">
                        @error('name')
                        <div id="invalidFullname" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Ваш логин</label>
                        <input type="text"
                               class="form-control @error('email') is-invalid @enderror"
                               id="inputLogin"
                               name="login"
                               aria-describedby="invalidLogin">
                        @error('email')
                        <div id="invalidLogin" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Ваш пароль</label>
                        <input type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               id="inputPassword"
                               name="password"
                               aria-describedby="invalidPassword">
                        @error('password')
                        <div id="invalidPassword" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Авторизация</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
