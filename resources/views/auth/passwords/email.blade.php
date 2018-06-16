@extends('layouts.app')

@section('content')

    <div class="breadcrumbs-views">
        @include('parts.breadcrumbs')
    </div>

    <div class="panel-heading">Сбросить пароль</div>
    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                {{--<div class="col-md-6">--}}
                    {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                    <div class="group">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>E-mail</label>
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                {{--</div>--}}
            </div>

            <div class="registr-page-btn">
                <button type="submit" class="btn btn-orange">
                    Отправить ссылку для сброса пароля
                </button>
            </div>
        </form>
    </div>
@endsection
