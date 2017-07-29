function checkAvailability() {
    var data ={
        username: $('#username').val() ,
        _token:$("input[name=_token]").val()
    };
    console.log(data);
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "/checkUsername",
        data:data,
        type: "POST",
        success:function(data){
            if(data){
                $("#user-availability-status").html("you can use this username");
            }else{
                $("#user-availability-status").html("this user is exist!! change username");
            }
            $("#loaderIcon").hide();
        },
        error:function (){}
    });
}/**
 * Created by User on 7/19/2017.
 */
