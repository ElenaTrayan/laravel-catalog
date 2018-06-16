@extends('layouts.app')

@section('content'){{ csrf_field() }}
    <div class="breadcrumbs-views">
        @include('parts.breadcrumbs')
    </div>

    <div class="panel-heading">{{ $page->title }}</div>
    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="group-error{{ $errors->has('email') ? ' has-error' : '' }}">
                {{--<label for="email" class="control-label">E-mail</label>--}}

                {{--<div class="">--}}
                    {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>--}}

                    <div class="form-group">
                        <input type="email" id="email" placeholder="E-mail" name="email" value="{{ old('email') }}" required autofocus>
                        <label for="">E-mail</label>
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                {{--</div>--}}
            </div>

            <div class="group-error{{ $errors->has('password') ? ' has-error' : '' }}">
                {{--<label for="password" class="control-label">Пароль</label>--}}

                {{--<div class="">--}}
                    {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                    <div class="form-group">
                        <input id="password" type="password" placeholder="Пароль *" name="password" required>
                        <label for="">Пароль *</label>
                    </div>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                {{--</div>--}}
            </div>


            <div class="checkbox">
                {{--<label>--}}
                    {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня--}}
                {{--</label>--}}
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="checkbox__input" value="1" id="c1">
                <label for="c1" class="checkbox__label">Запомнить меня</label>
            </div>

            <div class="login-page-btn">
                <button type="submit" class="btn btn-orange">
                    Войти
                </button>

                <a class="link-request-password" href="{{ route('password.request') }}">
                    Забыли пароль?
                </a>
                <a href="{{ route('register') }}">
                    Зарегистрироваться
                </a>

            </div>

        </form>
    </div>

@endsection
