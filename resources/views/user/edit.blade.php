@extends('backend::layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form method="post" action="{{ route('backend.user.update', $user) }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="name">@lang('backend::user.edit.name.label')</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="@lang('backend::user.edit.name.label')" value="{{ old('name', $user->name) }}">
                </div>

                <div class="form-group">
                    <label for="email">@lang('backend::user.edit.email.label')</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="@lang('backend::user.edit.email.placeholder')" value="{{ old('email', $user->email) }}">
                </div>

                <button type="submit" class="btn btn-primary">@lang('backend::user.edit.button')</button>

            </form>

        </div>
    </div>
</div>
@endsection
