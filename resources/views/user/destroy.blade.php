@extends('backend::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form method="post" action="{{ route('backend.user.destroy', $user) }}">

                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <p>@lang('backend::user.destroy.text', ['name' => $user->name, 'email' => $user->email])</p>

                    <button type="submit" class="btn btn-danger">@lang('backend::user.destroy.button.yes')</button>
                    <a href="{{ route('backend.user') }}" class="btn btn-default">@lang('backend::user.destroy.button.no')</a>

                </form>

            </div>
        </div>
    </div>
@endsection
