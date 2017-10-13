@extends('backend::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('backend::auth.login.title')</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('backend.login') }}" novalidate>
                        {{ csrf_field() }}

                        <div class="form-group row justify-content-center{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 col-form-label">@lang('backend::auth.login.email')</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-center{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 col-form-label">@lang('backend::auth.login.password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-9">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        @lang('backend::auth.login.remember_me')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">
                                    @lang('backend::auth.login.button')
                                </button>

                                <a class="btn btn-link" href="{{ route('backend.password.request') }}">
                                    @lang('backend::auth.login.forgot_password')
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
