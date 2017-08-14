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
        <a href="/home" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>home</a>
        {{--<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>--}}
        {{--<a href="/friends" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>--}}

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

            {{--<br>--}}

{{ csrf_field() }}
            <!-- Alert Box -->
            <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
                <p><strong>Hey!</strong></p>
                <p>People are looking at your profile. Find out who.</p>
            </div>


{{--" title="Messages"> 3 Avatar--}}
                <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>


                <h4>Requests:</h4><br>
                <hr class="w3-clear">
                    <table>
                        <tr>
                            {{--<td>id</td>--}}
                            <td>Picture</td>
                            <td>UserName</td>
                            <td>LastName</td>
                            <td>FirstName</td>
                        </tr>
                        @foreach($friends_req as $person)
                            <tr>

                                <td><img src="/images/users/{{$person['id']}}/30x30/{{$person['img_name']}}"></td>
                                <td>{{$person['UserName']}}</td>
                                <td>{{$person['LastName']}}</td>
                                <td>{{$person['FirstName']}}</td>
                                <td>  <button id="accept" type="button" class="w3-button w3-theme-d1 w3-margin-bottom accept"><i class="fa fa-thumbs-up"></i>  Accept</button></td>
                                <td>  <button  id="decline" type="button" class="w3-button w3-theme-d1 w3-margin-bottom decline"><i class="fa fa-thumbs-up"></i>  Decline</button></td>
                            </tr>
                        @endforeach
                    </table>
                </div>


{{--               friends                  --}}
                <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>


                    <h4>Friends:</h4><br>
                    <hr class="w3-clear">
                  <table>
                          <tr>
                              {{--<td>id</td>--}}
                              <td>Picture</td>
                              <td>UserName</td>
                              <td>LastName</td>
                              <td>FirstName</td>
                          </tr>
                          @foreach($friends as $person)
                          <tr>
                              <td hidden id="user_id">{{$person['id']}} </td>
                              <td><img src="/images/users/{{$person['id']}}/30x30/{{$person['img_name']}}"></td>
                              <td>{{$person['UserName']}}</td>
                              <td>{{$person['LastName']}}</td>
                              <td>{{$person['FirstName']}}</td>
                              <td> <button id="remove"  type="button" class="w3-button w3-theme-d1 w3-margin-bottom remove"><i class="fa fa-thumbs-up"></i>  remove</button></td>
                          </tr>
                              @endforeach

                      </table>

                </div>

<p>
</p>

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
    $('#accept').on("click",function () {
        console.log("accept");

        var data ={
            botton_id: 'accept',
           user_id: $('#user_id').html,
            _token:$("input[name=_token]").val()
        };
        console.log(data);

        $.ajax({
            type: 'POST',
            url: '/friends_req',
            data: data,
            success: function(data){
                alert('successful');
            }
        });
    });


    $('#decline').on("click",function () {
        console.log("decline");
        var data ={
            botton_id: 'decline',
            user_id: $('#user_id').html(),
            _token:$("input[name=_token]").val()
        };
        console.log(data);
        $.ajax({
            type: 'POST',
            url: '/friends_req',
            data: data,
            success: function(data){
                alert('successful');
                $('#decline').remove();
            }
        });
    });
    $('#remove').on("click",function () {
        console.log("remove");
        var data ={
            user_id: $('#user_id').html(),
            _token:$("input[name=_token]").val()
        };
        $.ajax({
            type: 'post',
            url: '/friends_remove',
            data: data,
            success: function(data){
                alert('successful');
            }
        });
    });

    var today = new Date();
    document.getElementById('time').innerHTML=today;
</script>
{{--$('#post_botton').on("click",function () {
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
    });--}}
</body>
</html>
