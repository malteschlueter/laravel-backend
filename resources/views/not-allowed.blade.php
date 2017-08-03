@extends('backend::layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('backend::not-allowed.title')</div>

                <div class="panel-body">
                    <p>@lang('backend::not-allowed.text')</p>

                    <a class="btn btn-primary" href="{{ URL::previous() }}">@lang('backend::not-allowed.button')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
