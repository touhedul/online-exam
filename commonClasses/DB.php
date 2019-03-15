<?php

class DB{
    public static function connect(){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=online_exam;charset=utf8','root','10109914');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    
    public static function query($query,$params=array()){
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        //Case insensative compare
        if(!strcasecmp(explode(' ',$query)[0], 'SELECT')){
            $data = $statement->fetchAll();
            return $data;
        }
    }
}
?>
