<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #DEDED6;
                color: #636B6F;
                font-family: 'Noto Sans';
                font-weight: 100;
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
                font-size: 12px;
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
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <img src="/img/logo.png" style="height:250px;margin-bottom: 50px;">
                </div>
                @if (Route::has('login'))
                    <div class="links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <table>
                            <!-- <a href="{{ route('register') }}">Register</a> -->                        
                            | <a href="{{ route('login') }}">User</a> 
                            | <a href="{{url('/koki')}}">Koki</a> 
                            | <a href="#">Pantry</a> 
                            | <a href="#">Kasir</a> 
                            | <a href="{{ url('/admin/menu') }}">Admin</a> |
                            </table>
                        @endauth
                    </div>
                @endif              
            </div>
        </div>
    </body>
</html>
