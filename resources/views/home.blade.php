{{--<!DOCTYPE html>--}}
<!--
Template Name: Gestpio
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
{{--<html>--}}
{{--<head >--}}
    {{--<title>Home</title>--}}
    {{--<link rel="stylesheet" href="/css/home.css">--}}
    {{--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">--}}
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="w3-bar w3-black w3-card-2">--}}
    {{--<spam><form action="/search" method="POST">--}}
        {{--{{ csrf_field() }}--}}
        {{--<input type="text" placeholder="search" name="search" >--}}
    {{--</form></spam>--}}
    {{--<spam class="friend"><a href="/friends">friends</a></spam>--}}
    {{--<spam class="name">{{Auth::user()->FirstName}}  {{Auth::user()->LastName}}</spam>--}}
    {{--<spam class="logout"><a href="logout">logout</a></spam>--}}
{{--</div>--}}

    {{--<form action="" method="POST">--}}
        {{--<div class="w3-col m7">--}}

            {{--<div class="w3-row-padding">--}}
                {{--<div class="w3-col m12">--}}
                    {{--<div class="w3-card-2 w3-round w3-white">--}}
                        {{--<div class="w3-container w3-padding">--}}
                            {{--<h6 class="w3-opacity">Social Media template by w3.css</h6>--}}
                            {{--<p contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p>--}}
                            {{--<button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
    {{--</form>--}}

{{--</body>--}}
{{--</html>--}}


        <!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Home</a>
        <a href="/logout" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="logout">logout</a>
        <a href="/friends" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="friends"><i class="fa fa-user"></i></a>
        {{--<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>--}}
        {{--" title="Messages"><i class="fa fa-envelope"></i></a>--}}
        {{--<div class="w3-dropdown-hover w3-hide-small">--}}
            {{--<button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>--}}
            {{--<div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">--}}
                {{--<a href="#" class="w3-bar-item w3-button">One new friend request</a>--}}
                {{--<a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>--}}
                {{--<a href="#" class="w3-bar-item w3-button">Jane likes your post</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="/w3images/avatar2.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a>--}}
    </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
        <!-- Left Column -->
        <div class="w3-col m3">
            <!-- Profile -->
            <div class="w3-card-2 w3-round w3-white">
                <div class="w3-container">
                    @foreach($user['user'] as $person)
                    <h4 class="w3-center">My Profile</h4>
                    <p class="w3-center"><img src="/images/users/{{$person['id']}}/30x30/{{$person['img_name']}}" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                    <hr>
                    <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> {{$person['FirstName']}} {{$person['LastName']}} </p>
                    {{--<p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>--}}
                    <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> {{$person['Age']}}</p>
                        @endforeach
                </div>
            </div>
            <br>

            <!-- Accordion -->
            {{--<div class="w3-card-2 w3-round">--}}
                {{--<div class="w3-white">--}}
                    {{--<button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>--}}
                    {{--<div id="Demo1" class="w3-hide w3-container">--}}
                        {{--<p>Some text..</p>--}}
                    {{--</div>--}}
                    {{--<button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>--}}
                    {{--<div id="Demo2" class="w3-hide w3-container">--}}
                        {{--<p>Some other text..</p>--}}
                    {{--</div>--}}
                    {{--<button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>--}}
                    {{--<div id="Demo3" class="w3-hide w3-container">--}}
                        {{--<div class="w3-row-padding">--}}
                            {{--<br>--}}
                            {{--<div class="w3-half">--}}
                                {{--<img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">--}}
                            {{--</div>--}}
                            {{--<div class="w3-half">--}}
                                {{--<img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">--}}
                            {{--</div>--}}
                            {{--<div class="w3-half">--}}
                                {{--<img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">--}}
                            {{--</div>--}}
                            {{--<div class="w3-half">--}}
                                {{--<img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">--}}
                            {{--</div>--}}
                            {{--<div class="w3-half">--}}
                                {{--<img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">--}}
                            {{--</div>--}}
                            {{--<div class="w3-half">--}}
                                {{--<img src="/w3images/fjords.jpg" style="width:100%" class="w3-margin-bottom">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<br>--}}

            {{--<!-- Interests -->--}}
            {{--<div class="w3-card-2 w3-round w3-white w3-hide-small">--}}
                {{--<div class="w3-container">--}}
                    {{--<p>Interests</p>--}}
                    {{--<p>--}}
                        {{--<span class="w3-tag w3-small w3-theme-d5">News</span>--}}
                        {{--<span class="w3-tag w3-small w3-theme-d4">W3Schools</span>--}}
                        {{--<span class="w3-tag w3-small w3-theme-d3">Labels</span>--}}
                        {{--<span class="w3-tag w3-small w3-theme-d2">Games</span>--}}
                        {{--<span class="w3-tag w3-small w3-theme-d1">Friends</span>--}}
                        {{--<span class="w3-tag w3-small w3-theme">Games</span>--}}
                        {{--<span class="w3-tag w3-small w3-theme-l1">Friends</span>--}}
                        {{--<span class="w3-tag w3-small w3-theme-l2">Food</span>--}}
                        {{--<span class="w3-tag w3-small w3-theme-l3">Design</span>--}}
                        {{--<span class="w3-tag w3-small w3-theme-l4">Art</span>--}}
                        {{--<span class="w3-tag w3-small w3-theme-l5">Photos</span>--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<br>--}}

            <!-- Alert Box -->
            {{--<div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">--}}
        {{--<span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">--}}
          {{--<i class="fa fa-remove"></i>--}}
        {{--</span>--}}
                {{--<p><strong>Hey!</strong></p>--}}
                {{--<p>People are looking at your profile. Find out who.</p>--}}
            {{--</div>--}}

            <!-- End Left Column -->
        </div>

        <!-- Middle Column -->
        <div class="w3-col m7">

            <div class="w3-row-padding">
                <div class="w3-col m12">
                    <div class="w3-card-2 w3-round w3-white">
                        <div class="w3-container w3-padding">
                            <h6 class="w3-opacity">Social Media </h6>
                            <p id="post_text" contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p>
                            <button  id="post_botton" type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Post</button>
                        </div>
                    </div>
                </div>
            </div>

            @foreach($user['friend_post'] as $person)
            <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>

                <img src="/images/users/{{$person['id']}}/30x30/{{$person['img_name']}}"  class="w3-left w3-circle w3-margin-right" style="width:60px">
                {{--<span class="w3-right w3-opacity">1 min</span>--}}
                <h4>{{$person['FirstName']}} {{$person['LastName']}} </h4><br>
                <hr class="w3-clear">{{$person['posts']}}
                <div class="w3-row-padding" style="margin:0 -16px">
                    {{--<div class="w3-half">--}}
                        {{--<img src="/w3images/lights.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">--}}
                    {{--</div>--}}
                    {{--<div class="w3-half">--}}
                        {{--<img src="/w3images/nature.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom">--}}
                    {{--</div>--}}
                </div>
                {{--<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>--}}
                {{--<button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>--}}
            </div>

            @endforeach



            <!-- End Middle Column -->
        </div>

        <!-- Right Column -->
        <div class="w3-col m2">
            <div class="w3-card-2 w3-round w3-white w3-center">
                {{--<div class="w3-container">--}}
                    {{--<p>Upcoming Events:</p>--}}
                    {{--<img src="/w3images/forest.jpg" alt="Forest" style="width:100%;">--}}
                    {{--<p><strong>Holiday</strong></p>--}}
                    {{--<p>Friday 15:00</p>--}}
                    {{--<p><button class="w3-button w3-block w3-theme-l4">Info</button></p>--}}
                {{--</div>--}}
            </div>
            <br>

            <div class="w3-card-2 w3-round w3-white w3-center">
                <div class="w3-container">
                    <p> Request to Friend</p>
                    {{--<img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>--}}
                    {{--<span>Jane Doe</span>--}}
                    <div class="w3-row w3-opacity">
                        <form action="/send_req" method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <input type="text" placeholder="username" name="user"><br>
                            <input type="submit"  class=" w3-button w3-block w3-hide-small w3-padding-large w3-hover-white"  >


                        </form>

                        {{--<div class="w3-half">--}}
                            {{--<button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>--}}
                        {{--</div>--}}
                        {{--<div class="w3-half">--}}
                            {{--<button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
            <br>

            {{--<div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">--}}
                {{--<p>ADS</p>--}}
            {{--</div>--}}
            {{--<br>--}}

            <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
                <p><i class="fa fa-bug w3-xxlarge"></i></p>
            </div>

            <!-- End Right Column -->
        </div>

        <!-- End Grid -->
    </div>

    <!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
    <h5>Footer</h5>
    <spam>
    <marquee behavior="scroll" bgcolor="gray" loop="-1" width="30%">
        <i>
            <font color="#435761">
                Today's date is :
                <strong>
                    <span id="time"></span>
                </strong>
            </font>
        </i>
    </marquee>
    </spam>
</footer>

<footer class="w3-container w3-theme-d5">
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
<script src="/js/jquery-3.2.1.min.js"></script>

<script>
    // Accordion
    function myFunction(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-theme-d1";
        } else {
            x.className = x.className.replace("w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-theme-d1", "");
        }
    }

    // Used to toggle the menu on smaller screens when clicking on the menu button
    function openNav() {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }

    $('#post_botton').on("click",function () {
       /// console.log("accept");
        var data ={
           posts: $('#post_text').html(),
            _token:$("input[name=_token]").val()

        };
        console.log(data);
        $.ajax({
            type: 'post',
            url: '/sendpost',
            data: data,
            success: function(data){
                alert('successful');
            }
        });
    });
    var today = new Date();
    document.getElementById('time').innerHTML=today;
</script>

</body>
</html>
