@extends('backend::layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form method="post" action="{{ route('backend.user.update', $user) }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name', $user->name) }}">
                </div>

                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="E-Mail" value="{{ old('email', $user->email) }}">
                </div>

                <button type="submit" class="btn btn-primary">Speichern</button>

            </form>

        </div>
    </div>
</div>
@endsection
