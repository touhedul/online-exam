<?php

include '../userClasses/Users.php';
include_once '../commonClasses/Validation.php';
$users = new Users();

$name = Validation::validate($_POST['name']);
$username = Validation::validate($_POST['username']);
$password = Validation::validate($_POST['password']);
$email = Validation::validate($_POST['email']);

$users->userRegister($name, $username, $password, $email);
?>

