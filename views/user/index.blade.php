@extends('backend::layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <a href="{{ route('backend.user.create') }}" class="btn btn-default">Benutzer hinzufügen</a>

            <table class="table table-striped">
                <thead>

                <tr>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th></th>
                </tr>

                </thead>
                <tbody>

                @foreach($users as $user)

                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('backend.user.edit', $user) }}" class="btn btn-primary">Bearbeiten</a>

                            @if(Auth::id() !== $user->id)
                                <a href="{{ route('backend.user.destroyConfirm', $user) }}" class="btn btn-danger">Löschen</a>
                            @endif
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
