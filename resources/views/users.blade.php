<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
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
    <table align="center" cellpadding="10" cellspacing="10" >
        <tr>
            {{--<td>id</td>--}}
            <td>UserName</td>
            <td>LastName</td>
            <td>FirstName</td>
            <td>Age</td>
            <td>profile</td>
            <td>edit</td>
            <td>delete</td>
        </tr>

        @foreach($users as $user)
            <tr>
                <td>{{$user['username']}}</td>
                <td>{{$user['lastname']}}</td>
                <td>{{$user['firstname']}}</td>
                <td>{{$user['age']}}</td>
                <td><a href="/profile/{{$user['username']}}"><img src="/images/profile.png" width="30px"></a></td>
                <td><a href="/edit/{{$user['username']}}"><img src="/images/edit.png" width="30px"></a></td>
                <td><a href="/delete/{{$user['username']}}" onclick="return confirm('Are you sure ?')"><img src="/images/delete.png" width="30px"></a></td>
            </tr>
        @endforeach

    </table>

    </body>
</html>
