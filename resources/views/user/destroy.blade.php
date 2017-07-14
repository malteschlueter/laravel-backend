@extends('backend::layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('backend::user.destroy.title')</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="post" action="{{ route('backend.user.destroy', $user) }}">

                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <p class="text-center">@lang('backend::user.destroy.text', ['name' => $user->name, 'email' => $user->email])</p>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">

                                <div class="btn-group btn-group-justified">

                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-trash"></span>
                                            @lang('backend::user.destroy.button.yes')
                                        </button>
                                    </div>

                                    <div class="btn-group">
                                        <a href="{{ route('backend.user') }}" class="btn btn-default">
                                            @lang('backend::user.destroy.button.no')
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
