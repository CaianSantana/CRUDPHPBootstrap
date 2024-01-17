<?php
class DBConn{

    private static $instance;
    private $connection;

    private function __construct(){
        try {
            $dbhost = 'localhost';
            $dbname = 'dbteste';
            $dbuser = 'root';
            $dbpass = '';
            $this->connection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection error: ".$e->getMessage());
        }
    }

    public static function getInstance(): DBConn{
        try {
            if(!isset(self::$instance)){
                self::$instance = new self();
            }
            return self::$instance;
        } catch (Exception $e) {
            die("Error getting class instance:" .$e->getMessage());
        }
    }
    
    public function select($tableName, $condition) {
        try {
            $sql = "SELECT * FROM $tableName WHERE role = :role AND password = :password";
            $statement = $this->connection->prepare($sql);
            $statement->execute([
                'role' => $condition['role'],
                'password' => $condition['password']
            ]);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
        } catch (PDOException $e) {
            die("Error executing select: " . $e->getMessage());
        }
    }

    public function selectAll($tableName) {
        try {
            $sql = "SELECT * FROM $tableName";
            $statement = $this->connection->query($sql);
    
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error executing select: " . $e->getMessage());
        }
    }

    public function insert($tableName, $data){
        $columns = implode(", ", array_keys($data));
        $values = ":". implode(", :", array_keys($data));
        try {
            $sql = "INSERT INTO $tableName ($columns) VALUES ($values)";
            $statement = $this->connection->prepare($sql);
            $statement->execute($data);
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            die("Error executing insert: " . $e->getMessage());
        }
    }

    public function delete($tableName, $condition){
        try{
            $sql = "DELETE FROM $tableName WHERE $condition";
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            return $statement->rowCount();
        }catch (PDOException $e) {
            die("Error executing delete: " . $e->getMessage());
        }
    }

    public function update($tableName, $data, $condition) {
        $setClause = '';
        foreach ($data as $key => $value) {
            $setClause .= "$key = :$key, ";
        }
        $setClause = rtrim($setClause, ', ');
        try{
            $sql = "UPDATE $tableName SET $setClause WHERE $condition";
            $statement = $this->connection->prepare($sql);
            $statement->execute($data);
            return $statement->rowCount();
        }catch (PDOException $e) {
            die("Error executing update: " . $e->getMessage());
        }
        
    }

}