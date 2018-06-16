@extends('layouts.app')

@section('content')

    <div class="breadcrumbs-views">
        @include('parts.breadcrumbs')
    </div>

    <div class="panel-heading">{{ $page->title }}</div>
    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {{--<label for="email" class="col-md-4 control-label">E-mail</label>--}}

                    {{--<input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>--}}

                    <div class="group">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>E-mail</label>
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {{--<label for="password" class="col-md-4 control-label">Пароль</label>--}}

                    {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                    <div class="group">
                        <input id="password" type="password" class="form-control" name="password" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Пароль</label>
                    </div>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                {{--<label for="password-confirm" class="col-md-4 control-label">Повторите пароль</label>--}}

                    {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}

                    <div class="group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Повторите пароль</label>
                    </div>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                             {{ $errors->first('password_confirmation') }}
                        </span>
                    @endif

            </div>

            <div class="registr-page-btn">
                <button type="submit" class="btn btn-orange">
                    Сбросить пароль
                </button>
            </div>
        </form>
    </div>
@endsection
