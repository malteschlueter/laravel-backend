@extends('backend::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form method="post" action="{{ route('backend.user.destroy', $user) }}">

                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <p>Möchten Sie wirklich den Benutzer {{ $user->name }} ({{ $user->email }}) löschen?</p>

                    <button type="submit" class="btn btn-danger">Ja</button>
                    <a href="{{ route('backend.user') }}" class="btn btn-default">Nein</a>

                </form>

            </div>
        </div>
    </div>
@endsection
