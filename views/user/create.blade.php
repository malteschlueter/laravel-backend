@extends('backend::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form method="post" action="{{ route('backend.user.store') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="E-Mail" value="{{ old('email') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Speichern</button>

                </form>

                @include('backend::layouts.partials.errors')

            </div>
        </div>
    </div>
@endsection
