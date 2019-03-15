
<?php

class Main {

    public static function insert($table, $data) {
        $key = '';
        $value = '';
        $key = implode(',', array_keys($data));
        $value = ":" . implode(', :', array_keys($data));
        $sql = "INSERT INTO " . $table . " (" . $key . ") VALUES(" . $value . ")";
        //echo $sql;
        $stmt = DB::connect()->prepare($sql);
        foreach ($data as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        $stmt->execute();
    }

    public static function update($table, $data, $condition) {
        if (!empty($data) && is_array($data) && !empty($data) && is_array($data)) {
            $keyvalue = '';
            $whereCond = '';
            $i = 0;
            foreach ($data as $key => $value) {
                $add = ($i > 0) ? ' , ' : '';
                $keyvalue .= "$add" . "$key=:$key";
                $i++;
            }

            $whereCond .= " WHERE ";
            $i = 0;
            foreach ($condition as $key => $value) {
                $add2 = ($i > 0) ? ' AND ' : '';
                $whereCond .= "$add2" . "$key=:$key";
                $i++;
            }

            $sql = "UPDATE " . $table . " SET " . $keyvalue . $whereCond;
            $stmt = DB::connect()->prepare($sql);
            foreach ($data as $key => $val) {
                $stmt->bindValue(":$key", $val);
            }
            foreach ($condition as $key => $val) {
                $stmt->bindValue(":$key", $val);
            }
            $stmt->execute();
        } else {
            echo 'Something wrong';
        }
    }

    public static function selectAll($table) {
        $query = "SELECT * from $table";
        $params = array();
        return DB::query($query, $params);
    }

    public static function selectBy($getValue, $table, $key, $value) {
        $query = "SELECT $getValue from $table where $key = :key";
        $params = array(':key' => $value);
        return DB::query($query, $params);
    }

    public static function deleteBy($table, $key, $value) {
        $query = "DELETE  from $table where $key = :key";
        $params = array(':key' => $value);
        DB::query($query, $params);
    }
    
    public static function chkExist($t_name,$key,$value) {
        $sql = "SELECT $key FROM $t_name where $key = :value";
        $params = array(':value'=>$value);
        $data = DB::query($sql,$params);
        if($data){
            return TRUE;
        }else{
            return FALSE;
        }
    }

}

?>
