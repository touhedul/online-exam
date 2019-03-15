<?php
class Validation{
    public static function validate($data){
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        $data = trim($data);
        return $data;
    }
}
?>

