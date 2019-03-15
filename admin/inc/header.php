<?php
include '../commonClasses/DB.php';
include '../commonClasses/Main.php';
include '../commonClasses/Validation.php';
include '../commonClasses/Session.php';
include '../commonClasses/Variable.php';
?>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<?php
Session::chkSession();
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    session_unset();
    header('location: login.php');
}
?>
<!doctype html>
<html>
    <head>
        <title>Admin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="no-cache">
        <meta http-equiv="Expires" content="-1">
        <meta http-equiv="Cache-Control" content="no-cache">
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <div class="phpcoding">
            <section class="headeroption"></section>
            <section class="maincontent">
                <div class="menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="manage_user.php">Manage user</a></li>
                        <li><a href="category.php">Category</a></li>
                        <li><a href="addquestion.php">Add Ques</a></li>
                        <li><a href="question_list.php">Ques List</a></li>
                        <li><a href="?action=logout">Logout</a></li>
                    </ul>
                </div>
