<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
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
            .form-group .form-control{
                display: block;
            }
            label {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="form-group content">
                <form action="{{ ($user->id) ? 
                    route('user.update', compact('user')) : 
                    route('user.store') }}" method="POST">
                    @csrf
                    @if($user->id)
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <label>Username</label>
                    <input class="form-control" type="text" name="username"  value="{{$user->username}}" />
                    <label>Email</label>
                    <input class="form-control" type="email" name="email"  value="{{$user->email}}" />
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" >
                    <label>Confirm</label>
                    <input class="form-control" type="password" name="confirm" >
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>
