<?php

class Users {

    private $table = "users";

    public function getAllUsers() {
        return Main::selectAll($this->table);
    }

    public function disableUser($user_id) {
        if (Main::chkExist($this->table, "user_id", $user_id)) {
            $data = array('status' => 0);
            $condition = array('user_id' => $user_id);
            Main::update($this->table, $data, $condition);
            return Variable::$userDisable;
        } else {
            return Variable::$failed;
        }
    }

    public function enableUser($user_id) {
        if (Main::chkExist($this->table, "user_id", $user_id)) {
            $data = array('status' => 1);
            $condition = array('user_id' => $user_id);
            Main::update($this->table, $data, $condition);
            return Variable::$userEnable;
        } else {
            return Variable::$failed;
        }
    }

    public function removeUser($user_id) {
        if (Main::chkExist($this->table, "user_id", $user_id)) {
            Main::deleteBy($this->table, "user_id", $user_id);
            return Variable::$userRemove;
        } else {
            return Variable::$failed;
        }
    }

    public function userRegister($name, $username, $password, $email) {
//        $name = Validation::validate($data['name']);
//        $username = Validation::validate($data['username']);
//        $password = Validation::validate($_POST['password']);
//        $email = Validation::validate($data['email']);
        if ($name == "" || $username == "" || $password == "" || $email == "") {
            echo Variable::$empty;
            exit();
        } elseif (strlen($username) < 3 || strlen($username) > 15) {
            echo Variable::$usernameError;
            exit();
        } elseif (strlen($password) < 8 || strlen($password) > 30) {
            echo Variable::$passwordError;
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo Variable::$emailError;
            exit();
        } elseif (Main::chkExist("users", "username", $username)) {
            echo Variable::$usernameExist;
            exit();
        } elseif (Main::chkExist("users", "email", $email)) {
            echo Variable::$emailExist;
            exit();
        } else {
            $password = md5($password);
            $data = array('name' => $name, 'username' => $username, 'password' => $password, 'email' => $email, 'status' => 0);
            Main::insert($this->table, $data);
            echo Variable::$success;
            exit();
        }
    }

}
?>

