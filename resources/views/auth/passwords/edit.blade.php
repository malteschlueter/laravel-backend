@extends('backend::layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('backend::auth.passwords.change.title')</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('backend.password.change.request') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('old-password') ? ' has-error' : '' }}">
                            <label for="old-password" class="col-md-4 control-label">@lang('backend::auth.passwords.change.old-password')</label>

                            <div class="col-md-6">
                                <input id="old-password" type="password" class="form-control" name="old-password" required>

                                @if ($errors->has('old-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">@lang('backend::auth.passwords.change.new-password')</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password_confirmation') ? ' has-error' : '' }}">
                            <label for="new-password-confirm" class="col-md-4 control-label">@lang('backend::auth.passwords.change.new-password_confirm')</label>
                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>

                                @if ($errors->has('new-password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('backend::auth.passwords.change.button')
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
