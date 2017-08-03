@extends('backend::layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('backend::user.index.title')</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('backend.user.create') }}" class="btn btn-default">
                        <span class="glyphicon glyphicon-plus"></span>
                        @lang('backend::user.index.button.add')
                    </a>

                    <hr>

                    <table class="table table-striped">
                        <thead>

                        <tr>
                            <th>@lang('backend::user.index.name')</th>
                            <th>@lang('backend::user.index.email')</th>
                            <th>@lang('backend::user.index.active')</th>
                            <th>@lang('backend::user.index.role')</th>
                            <th>@lang('backend::user.index.last_login')</th>
                            <th></th>
                        </tr>

                        </thead>
                        <tbody>

                        @foreach($users as $user)

                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->active)
                                        <span class="glyphicon glyphicon-check"></span>
                                    @else
                                        <span class="glyphicon glyphicon-unchecked"></span>
                                    @endif
                                </td>
                                <td>@lang('backend::user.index.roles.' . $user->role)</td>
                                <td>{{ $user->last_login or '-' }}</td>
                                <td>

                                    <div class="btn-group">

                                        @can('users.edit', $user)
                                            <a href="{{ route('backend.user.edit', $user) }}" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                @lang('backend::user.index.button.edit')
                                            </a>
                                        @endcan

                                        @can('users.destroy', $user)
                                            <a href="{{ route('backend.user.destroyConfirm', $user) }}" class="btn btn-danger">
                                                <span class="glyphicon glyphicon-trash"></span>
                                                @lang('backend::user.index.button.delete')
                                            </a>
                                        @endcan

                                    </div>

                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
