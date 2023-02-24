<?php

//preHandleData
    function handleData($result){
        $res = [];
        while($row = mysqli_fetch_assoc($result)) {
            $res[] = $row;
        } 
        return $res;
    }


    function showData($result) {
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }


class Database {
    public $conn = null;
    public $sname = "localhost";
    public $uname = "root";
    public $upass = "admin";
    public $dbname = "btth01_cse485";
    public $sport = 3306;


    public function __construct(){
        $this->getConnection();
    }

    public function getConnection(){
        try {
            $this->conn = new mysqli($this->sname, $this->uname, $this->upass, $this->dbname, $this->sport);
        } catch (Exception $e) {
            echo "Connect database fail";
        }
    }
    

    //delete with condition
    public function deleteWithCondition ($table, $condition =  array()) {
        $sql = " DELETE FROM $table";
        if ($condition) {
            $sql .= " WHERE";
            foreach($condition as $key => $val) {
                $sql .= " $key = '$val'  AND";
            }
            $sql = trim($sql, "AND");
            return $this->conn->query($sql);
        } else {
            return $this->conn->query($sql);
        }
    }

    //query with condition
    public function getWithCondition($table, $condition = array()) {
        $sql = "SELECT * FROM $table";
        if ($condition) {
            $sql .= " WHERE";
            foreach($condition as $key => $val){
                $sql .= " $key = '$val'  AND";
            }
            $sql = trim($sql, "AND");
            return handleData($this->conn->query($sql));
        } else {
            return handleData($this->conn->query($sql));
        }
    }


    //update with condition 
    public function updateWithCondition($table, $values = array(), $condition = array()) {
        $sql = "UPDATE $table SET";
        if ($values){
            foreach($values as $key => $val){
                $sql .= " $key = '$val' ,";
            }
            $sql = trim($sql, ",");
        }
        if ($condition) {
            $sql .= " WHERE";
            foreach($condition as $key => $val){
                $sql .= " $key = '$val' AND ";
            }
            $sql = trim($sql, " AND");
        }
        echo $sql . "<br/>";
        return $this->conn->query($sql);

    }

    //insert record

    public function insertRecord($table, $values = array()){
        $sql = "INSERT INTO $table ";
        
        if ($values) {
            $sql .= "(";
            foreach($values as $key => $val){
                $sql .= " $key,";
            }
            $sql = trim($sql, ",");
            $sql .= ") VALUES (";
            foreach($values as $key => $val){
                $sql .= " '$val',";
            }
            $sql =  trim($sql, ",");
            $sql .= ")";
            return $this->conn->query($sql);
        }
    }
    
    

    // get all record in table 

    public function getAllRecordTable($table_name) {
        $string_query = "SELECT * FROM $table_name";
        
        $result = $this->conn->query($string_query);
        return handleData($result);
    }



    //close connection database
    public function __destruct(){
        try {
            $this->conn->close();
        } catch (Exception $e) {
            echo $e;
        }
    }


}

    $db = new Database();
    
?>