<?php include 'inc/header.php'; 
//include 'admin/adminClasses/Users.php';
//$users = new Users();
Session::chkLogin();
?>

<div class="main">
    <h1> User Registration</h1>
    <div class="segment" style="margin-right:30px;">
        <img src="img/regi.png"/>
    </div>
    <div id="msg"></div>
    <div class="segment">
        
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" id="name"</td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input name="username" type="text" id="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>

                <tr>
                    <td>E-mail</td>
                    <td><input name="email" type="text" id="email" ></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="reg_submit" id="reg_submit" value="Signup">
                    </td>
                </tr>
            </table>
        </form>
       
    </div>

    <p style="float: right">Already Registered ? <a href="index.php">Login</a> Here</p>
    
</div>
</br>
<?php include 'inc/footer.php'; ?>