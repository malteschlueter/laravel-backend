@extends('backend::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('backend::auth.passwords.email.title')</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>@lang('backend::auth.passwords.email.text')</p>

                    <hr>

                    <form method="POST" action="{{ route('backend.password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group row justify-content-center{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 col-form-label">@lang('backend::auth.passwords.email.email')</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                    @lang('backend::auth.passwords.email.button')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
