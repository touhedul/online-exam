<?php

class Admin{
    private $table = "admin";
    
    public function adminLogin($data) {
        $admin_username = Validation::validate($data['admin_username']);
        $admin_password = md5(Validation::validate($data['admin_password']));
        $query = "SELECT * FROM $this->table where admin_username=:au AND admin_password=:ap";
        $params = array(':au' => $admin_username, ':ap' => $admin_password);
        $loginResult = DB::query($query,$params);
        if($loginResult){
            Session::init();
            Session::set("login", true);
            Session::set("admin_id", $loginResult->admin_id);
            Session::set("admin_username", $loginResult->admin_username);
            header('location: index.php');
        }else{
            return Variable::$iup;
        }
        
    }
}
?>

