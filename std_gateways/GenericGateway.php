<?php
namespace std_portal\std_gateways;

class GenericGateway{
    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function genericFind($tableName, $data)
    {
        $statement = $data['all'] === true ? "SELECT * FROM $tableName $data[limit]" : "SELECT * FROM $tableName WHERE $data[id_name] = :id_value";

        try {
            $statement = $this->db->prepare($statement);
            if($data['all'] !== true){
                $statement->bindParam('id_value', $data['id_value'], \PDO::PARAM_STR);
            }
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            if($statement->rowCount() > 0){
                $response = array('message'=>'success', 'result'=>$result);
            }else{
                $response = array('message'=>'success', 'result'=>array('message'=>'No data found'));
            }
            return $response;
        } catch (\PDOException $e) {
            $response = array('message'=>'failed', 'result'=>$e->getMessage());
            return $response;
        }    
    }

    public function genericInsert($tablename, Array $columns){
        $statement = "INSERT INTO $tablename (";

        $key = ""; $value = "";

        foreach($columns as $k => $v){
            $key .= "$k, ";
            $value .= ":$k, "; 
        }

        $key = rtrim($key, ", ");
        $value = rtrim($value, ", ");

        $statement .= "$key) VALUES($value)";
        
        try{
            $statement = $this->db->prepare($statement);
            $statement->execute($columns);
            if($statement->rowCount() > 0){
                $response = array('message'=>'success', 'result'=>array('message'=>'Data inserted successfully'));
            }else{
                $response = array('message'=>'success', 'result'=>array('message'=>'Failed to insert data'));
            }
            return $response;
        }catch(\PDOException $e){
            return $response = array('message'=>'failed', 'result'=>array('result'=>$e->getMessage()));
        }
    }
    public function genericDelete($tableName, $data)
    {
        $statement = $data['id_value'] === 'all' ? "DELETE FROM $tableName" : "DELETE FROM $tableName WHERE $data[id_name] = :id";

        try {
            $statement = $this->db->prepare($statement);
            if($data['id_value'] !== 'all'){
                $statement->bindParam(":id", $data['id_value']);
            }
            $statement->execute();
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }
    public function genericUpdate($tableName, $data){
        // Build the SET part of the query dynamically based on the $data array
        $setPart = "";
        foreach ($data as $column => $value) {
            if($column !== 'id_name' && $column !== 'id_value'){
                $setPart .= "$column = :$column, ";
            }
        }
        
        // Trim the trailing comma and space
        $setPart = rtrim($setPart, ", ");

        // Prepare the SQL statement
        $statement = "UPDATE $tableName SET $setPart WHERE $data[id_name] = :id_value";
        
        try {
            $statement = $this->db->prepare($statement);
            foreach($data as $column => $value){
                if($column !== 'id_name'){
                    $statement->bindValue("$column", $value);
                }
            }
            
            // Execute the statement with the combined data
            $statement->execute();
            
            return $statement->rowCount(); // Returns the number of rows affected
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}