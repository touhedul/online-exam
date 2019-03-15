<?php
include '../commonClasses/DB.php';
include '../commonClasses/Main.php';
include '../commonClasses/Validation.php';
include '../commonClasses/Session.php';
include '../commonClasses/Variable.php';
include 'adminClasses/Admin.php';
session_start();
if (Session::get("login") == TRUE) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
    <?php
    $msg = "";
    if (isset($_POST['login'])) {
        $admin = new Admin();
        $msg = $admin->adminLogin($_POST);
    }
    ?>

    <div class="container">
        <section id="content">
            <h2><?php echo $msg; ?></h2>
            <form action="" method="post">
                <h1>Admin Login</h1>
                <div>
                    <input type="text" placeholder="Username" required="" name="admin_username"/>
                </div>
                <div>
                    <input type="password" placeholder="Password" required="" name="admin_password"/>
                </div>
                <div>
                    <input type="submit" name="login" value="Log in" />
                </div>
            </form><!-- form -->
            <a href="#">Forget Password !</a>
            <div class="button">
                <a href="#">Online Exam</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>
</html>