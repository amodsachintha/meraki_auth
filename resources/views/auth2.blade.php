<!doctype html>
<html lang="{{ app()->getLocale() }}">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Authenticate</title>
</head>
<body>
<div class="container" align="center">
    <div class="row"  style="margin-top: 40px; margin-bottom: 20px">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <img src="images/logo1.jpg" width="150px">
        </div>
        <div class="col-md-4">

        </div>
    </div>
    <div class="row" align="center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <div class="jumbotron-fluid">
                <h1>Internet Access Authorization</h1>
                <p>Please enter the code that you received on {{$phone}}</p>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
    <div class="row" align="center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <form action="/code" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="code"><code>Code from SMS</code></label>
                    <input type="text" name="usercode" class="form-control" id="code" style="text-align: center" required>
                </div>
                <input type="hidden" name="client_mac" value="{{$previousRequestData->client_mac}}">
                <input type="hidden" name="node_mac" value="{{$previousRequestData->node_mac}}">
                <input type="hidden" name="client_ip" value="{{$previousRequestData->client_ip}}">
                <input type="hidden" name="code" value="{{$code}}">
                <input type="hidden" name="nic" value="{{$nic}}">
                <input type="hidden" name="grant_url" value="{{$grant_url}}">
                <input type="submit" name="Submit" class="btn btn-primary">
            </form>
        </div>
        <div class="col-md-4">

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
</div>
</body>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</html>

