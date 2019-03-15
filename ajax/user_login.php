<?php

include '../userClasses/Users.php';
include_once '../commonClasses/Validation.php';
$users = new Users();

$password = Validation::validate($_POST['password']);
$password = md5($password);
$email = Validation::validate($_POST['email']);
if ($password == "" || $email == "") {
    echo Variable::$empty;
    exit();
}else{
   $msg = $users->userLogin($password, $email);
   echo $msg;
   exit();
}

?>

