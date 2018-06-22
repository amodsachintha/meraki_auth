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
                <p>Use your National Identity Card number to validate you as a customer. You will recieve a text with
                    a short-code that you'll have to enter briefly</p>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
    <div class="row" align="center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <form action="/validate" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="nic"><code>National ID Number</code></label>
                    <input type="text" name="nic" class="form-control" id="nic" placeholder="123456789v" style="text-align: center" required>
                </div>
                <input type="hidden" name="client_mac" value="{{$requestData->client_mac}}">
                <input type="hidden" name="node_mac" value="{{$requestData->node_mac}}">
                <input type="hidden" name="client_ip" value="{{$requestData->client_ip}}">
                <input type="hidden" name="base_grant_url" value="{{$requestData->base_grant_url}}">
                <input type="hidden" name="user_continue_url" value="{{$requestData->user_continue_url}}">
                <input type="submit" name="Submit" class="btn btn-primary" onclick="alert('A SMS will be sent to your mobile now')">
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

