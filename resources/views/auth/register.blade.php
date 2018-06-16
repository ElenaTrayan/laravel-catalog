@extends('layouts.app')

@section('content')
    <div class="breadcrumbs-views">
        @include('parts.breadcrumbs')
    </div>

    <div class="panel-heading">{{ $page->title }}</div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="group-error{{ $errors->has('name') ? ' has-error' : '' }}">
                    {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                        {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

                        <div class="form-group">
                            <input id="name" type="text" placeholder="Логин *" name="name" value="{{ old('name') }}" required autofocus>
                            <label for="">Логин *</label>
                        </div>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                                {{--<strong>{{ $errors->first('name') }}</strong>--}}
                            </span>
                        @endif
                </div>

                <div class="group-error{{ $errors->has('email') ? ' has-error' : '' }}">
                    {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                    {{--<div class="col-md-6">--}}
                        {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

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
                    {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

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
                </div>

                {{--<div class="form-group">--}}
                    {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                    {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}

                    <div class="form-group">
                        <input id="password-confirm" type="password" placeholder="Повторите пароль *" name="password_confirmation" required>
                        <label for="">Повторите пароль *</label>
                    </div>
                {{--</div>--}}

                <div class="registr-page-btn">
                    <button type="submit" class="btn btn-orange">
                        Зарегистрироваться
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
