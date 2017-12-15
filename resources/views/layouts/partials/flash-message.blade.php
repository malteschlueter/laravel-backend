
@if(Session::has('message'))

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{ Session::get('message') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif
