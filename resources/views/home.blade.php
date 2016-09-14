@extends('layouts.principal')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {!!Html::script('dist/js/pages/dashboard2.js')!!}

    <!-- AdminLTE for demo purposes -->
    {!!Html::script('dist/js/demo.js')!!}
@endsection

