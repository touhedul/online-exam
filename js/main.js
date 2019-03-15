$(document).ready(function () {
    //User Registration
    $("#reg_submit").click(function (){
        var name = $("#name").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var email = $("#email").val();
        var dataString = 'name='+name+'&username='+username+'&password='+password+'&email='+email;
        $.ajax({
           type:"POST",
           url:"ajax/user_register.php",
           data:dataString,
           success:function(data){
               $("#msg").html(data);
           }
        });
        
        return false;
    });
    
    //User Login
    $("#login").click(function (){
        var password = $("#password").val();
        var email = $("#email").val();
        var dataString ='password='+password+'&email='+email;
        $.ajax({
           type:"POST",
           url:"ajax/user_login.php",
           data:dataString,
           success:function(data){
               $("#msg").html(data);
               /*setTimeout(function(){
                   $("#msg").fadeOut();
               },3000);*/
           }
        });
        
        return false;
    });
    
    $("#show_answer").click(function(){
        var category_id = $("#category_id").val();
        $.ajax({
           type:"POST",
           url:"ajax/show_answer.php",
           data:{category_id:category_id},
           success:function(data){
               $("#answer").html(data);
           }
        });
        return false;
    });
});