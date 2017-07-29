<!DOCTYPE html>
<html>

<head>
    <script src="/js/signup.js"></script>
    <script src="/js/jquery-3.2.1.min.js"></script>

    <meta charset="UTF-8">

    <title>CodePen - Random Login Form</title>

    <style>
        @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
        @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

        body{
            margin: 0;
            padding: 0;
            background: #fff;

            color: #fff;
            font-family: Arial;
            font-size: 12px;
        }

        .body{
            position: absolute;
            top: -20px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background-image: url(http://ginva.com/wp-content/uploads/2012/07/city-skyline-wallpapers-008.jpg);
            background-size: cover;
            -webkit-filter: blur(5px);
            z-index: 0;
        }

        .grad{
            position: absolute;
            top: -20px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
            z-index: 1;
            opacity: 0.7;
        }

        .header{
            position: absolute;
            top: calc(50% - 35px);
            left: calc(50% - 255px);
            z-index: 2;
        }

        .header div{
            float: left;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 35px;
            font-weight: 200;
        }

        .header div span{
            color: #5379fa !important;
        }

        .login{
            position: absolute;
            top: calc(50% - 75px);
            left: calc(50% - 50px);
            height: 150px;
            width: 350px;
            padding: 10px;
            z-index: 2;
        }

        .login input[type=text]{
            width: 250px;
            height: 30px;
            background: transparent;
            border: 1px solid rgba(255,255,255,0.6);
            border-radius: 2px;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 4px;
        }

        .login input[type=password]{
            width: 250px;
            height: 30px;
            background: transparent;
            border: 1px solid rgba(255,255,255,0.6);
            border-radius: 2px;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 4px;
            margin-top: 10px;
        }

        .login input[type=button]{
            width: 260px;
            height: 35px;
            background: #fff;
            border: 1px solid #fff;
            cursor: pointer;
            border-radius: 2px;
            color: #a18d6c;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 6px;
            margin-top: 10px;
        }

        .login input[type=button]:hover{
            opacity: 0.8;
        }

        .login input[type=button]:active{
            opacity: 0.6;
        }

        .login input[type=text]:focus{
            outline: none;
            border: 1px solid rgba(255,255,255,0.9);
        }

        .login input[type=password]:focus{
            outline: none;
            border: 1px solid rgba(255,255,255,0.9);
        }

        .login input[type=button]:focus{
            outline: none;
        }

        ::-webkit-input-placeholder{
            color: rgba(255,255,255,0.6);
        }
        input[type="submit"]{
            background:#0098cb;
            border:0px;
            border-radius:5px;
            color:#fff;
            padding:10px;
            margin:20px auto;
        }
        /*input[type="file"]{*/
            /*background:#0098cb;*/
            /*border:0px;*/
            /*border-radius:5px;*/
            /*color:#fff;*/
            /*padding:10px;*/
            /*margin:20px auto;*/
        /*}*/
        .login input[type=file]{
            width: 250px;
            height: 30px;
            background: transparent;
            border: 1px solid rgba(255,255,255,0.6);
            border-radius: 2px;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 4px;
        }


        /*::-moz-input-placeholder{*/
            /*color: rgba(255,255,255,0.6);*/
        /*}*/
    </style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>

<div class="body"></div>
<div class="grad"></div>
<div class="header">
    <div>sign<span>Up</span></div>
</div>
{{--<div id="frmCheckUsername">
  <label>Check Username:</label>
  <input name="username" type="text" id="username" class="demoInputBox" onBlur="checkAvailability()"><span id="user-availability-status"></span>
</div>
<p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>--}}
<br>
<div class="login" id="frmCheckUsername">
    <form action="" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="text" placeholder="username" id="username" name="username" class="demoInputBox" onBlur="checkAvailability()"><span id="user-availability-status"></span>
            <p><img src="images/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
            <br>
    <input type="password" placeholder="password" name="password"><br>
    <input type="text" placeholder="firstname" name="firstname"><br>
    <input type="text" placeholder="lastName" name="lastname"><br>
    <input type="text" placeholder="age" name="age"><br>
        <input type="file" name="photo" id="fileToUpload"><br>
        {{--<input type="submit" value="Upload" name="upload"><br>--}}
    <input type="submit" value="signUp">

    </form>
</div>


<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>