@extends('backend::layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('backend::user.create.title')</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="post" action="{{ route('backend.user.store') }}">

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('backend::user.create.name.label')</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="@lang('backend::user.create.name.placeholder')" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">@lang('backend::user.create.email.label')</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" id="email" placeholder="@lang('backend::user.create.email.placeholder')" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">@lang('backend::user.create.role.label')</label>

                            <div class="col-md-6">
                                <select class="form-control" name="role" id="role" required>
                                    <option value="{{ \Mschlueter\Backend\Models\Role::USER }}">
                                        @lang('backend::user.create.roles.' . \Mschlueter\Backend\Models\Role::USER)
                                    </option>
                                    <option value="{{ \Mschlueter\Backend\Models\Role::ADMIN }}">
                                        @lang('backend::user.create.roles.' . \Mschlueter\Backend\Models\Role::ADMIN)
                                    </option>

                                    @can('users.create.roles.super_admin')
                                        <option value="{{ \Mschlueter\Backend\Models\Role::SUPER_ADMIN }}">
                                            @lang('backend::user.create.roles.' . \Mschlueter\Backend\Models\Role::SUPER_ADMIN)
                                        </option>
                                    @endcan
                                </select>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    @lang('backend::user.create.button')
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
