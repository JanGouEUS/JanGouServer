<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JANGOU</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color:#333333;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body style="background-color: #333333;color: #b5bd2c">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a style="color:#b5bd2c" href="{{ url('/foodcard/upload') }}">Home</a>
                    @else
                        <a style="color:#b5bd2c" href="{{ route('login') }}">{{__('createTaberna.login')}}</a>

                        @if (Route::has('register'))
                        <a style="color:#b5bd2c" href="{{ route('register') }}">{{__('createTaberna.register')}}</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="row justify-content-center">
                            {{-- <div class="col mb-2" >
                                <a  style="background-color:#b5bd2c;color:black;padding:20px;border-radius:5px;"  href="{{ route('login') }}"><b>{{__('createTaberna.login')}}</b></a>
                            </div> --}}
 
                            {{-- <div class="col mt-2" >
                             <a style="background-color:#b5bd2c;color:black;border-radius:5px;" href="{{ route('register') }}">{{__('createTaberna.register')}}</a>
                            </div>    --}}
                            {{-- <div class="col" >
                                    <a href="https://play.google.com/store/apps/details?id=eus.skura.jangou&hl=es_419"><img class="img-fluid" src="https://jangou.eus/googlePlay.png"></a>
                                </div>
                                <div class="col" >   
                                    <a href="https://itunes.apple.com/us/app/keynote/id1513820744?mt=8"><img class="img-fluid" src="https://jangou.eus/appStore.png"></a>
                                </div> --}}
                        <div class="col mt-1" >
                                {{-- <jangou-animation></jangou-animation> --}}
                            <img class="img-fluid" src="https://jangou.eus/jangou.gif">
                        </div>
                        <div class="col" >
                                <h3>{{__('createTaberna.users')}}</h3>
                            </div>
                        <div class="col" >
                            <a href="https://play.google.com/store/apps/details?id=eus.skura.jangou&hl=es_419"><img class="img-fluid" src="https://jangou.eus/googlePlay.png"></a>
                        </div>
                        <div class="col" >   
                            <a href="https://itunes.apple.com/us/app/keynote/id1513820744?mt=8"><img class="img-fluid" src="https://jangou.eus/appStore.png"></a>
                        </div>
                 
                </div>
            </div>
        </div>
    </body>
</html>
