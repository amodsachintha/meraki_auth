<!doctype html>
<html lang="{{ app()->getLocale() }}">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Authenticated</title>
</head>
<body>
<div class="container" align="center">
    <div class="row" style="margin-top: 40px; margin-bottom: 20px">
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
                <p>Authorization Status</p>
            </div>
            <div class="text-success">
                <h2>Success!</h2>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
    <div class="row" align="center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <div>Registration closes in <strong><span id="time">60:00</span></strong> minutes!</div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
    <div class="row" style="margin-top: 30px">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            @if(isset($grant_url))
                <div class="text-primary">To continue please <a href="{{$grant_url}}" target="_blank" class="btn btn-success">click
                        here</a></div>
            @endif
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }

    window.onload = function () {
        var sixtyMinutes = 60 * 60,
            display = document.querySelector('#time');
        startTimer(sixtyMinutes, display);
    };
</script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</html>

