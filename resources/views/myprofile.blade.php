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
        {{--<td>UserName</td>--}}
        <td>picture</td>
        <td>LastName</td>
        <td>FirstName</td>
        <td>Age</td>
    </tr>


        <tr>
<!--              --><?php
            use App\User;
            $user= Auth::user();
//               var_dump($person['UserName']);
//               die;
            $person=User::leftJoin('images', 'person.id', '=', 'images.userId')
                ->where('person.id',$user->id)
                ->select('person.id' , 'person.UserName', 'person.LastName', 'person.FirstName','person.Age', 'images.img_name')
                ->get();
//            var_dump('<pre>',$current);die;
            ?>
            @foreach($person as $current)
                <td><img src="/images/users/{{$current['id']}}/30x30/{{$current['img_name']}}"></td>
                <td>{{$current['LastName']}}</td>
                <td>{{$current['FirstName']}}</td>
                <td>{{$current['Age']}}</td>
            @endforeach
        </tr>

    <a href="/logout">Logout</a>


</table>

</body>
</html>
