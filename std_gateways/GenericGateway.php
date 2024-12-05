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
        $statement = $data['id'] === 'all' ? "SELECT * FROM $tableName $data[limit]" : "SELECT * FROM $tableName WHERE $data[field_name] = :id";

        try {
            $statement = $this->db->prepare($statement);
            if($data['id'] !== 'all'){
                $statement->bindParam('id', $data['id'], \PDO::PARAM_STR);
            }
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            if($statement->rowCount() > 0){
                $response = array('message'=>'success', 'result'=>$result);
            }else{
                $response = array('message'=>'failed', 'result'=>array('message'=>'Invalid ID'));
            }
            return $response;
        } catch (\PDOException $e) {
            $response = array('message'=>'error', 'result'=>$e->getMessage());
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
                $response = array('message'=>'failed', 'result'=>array('message'=>'Failed to insert data'));
            }
            return $response;
        }catch(\PDOException $e){
            return array('message'=>'error', 'result'=>array('message'=>$e->getMessage()));
        }
    }
    public function genericDelete($tableName, $data)
    {
        $statement = $data['id'] === 'all' ? "DELETE FROM $tableName" : "DELETE FROM $tableName WHERE";

        try {
            if($data['id'] !== 'all'){
                $where = "";
                foreach($data as $key=>$value){
                    if($key !== 'condition' && $key !== 'id'){
                        $where .= " $key = :$key $data[condition]";
                    }
                }
                $where = rtrim($where, "$data[condition]");
                $statement .= $where;
            }
            // echo $statement;
            // exit();
            $statement = $this->db->prepare($statement);
            if($data['id'] !== 'all'){
                foreach($data as $key=>$value){
                    if($key !== 'condition' && $key !== 'id'){
                        $statement->bindValue($key, $value);
                    }
                }
            }
            $statement->execute();
            if($statement->rowCount() > 0){
                $response = array('message'=>'success', 'result'=>array('message'=>'Data deleted successfully'));
            }else{
                $response = array('message'=>'failed', 'result'=>array('message'=>'No data found to delete'));
            }
            return $response;
        } catch (\PDOException $e) {
            return array('message'=>'error', 'result'=>$e->getMessage());
        }    
    }
    public function genericUpdate($tableName, $data){
        // Build the SET part of the query dynamically based on the $data array
        $setPart = "";
        foreach ($data as $column => $value) {
            if($column !== 'field_name' && $column !== 'id'){
                $setPart .= "$column = :$column, ";
            }
        }
        
        // Trim the trailing comma and space
        $setPart = rtrim($setPart, ", ");

        // Prepare the SQL statement
        $statement = $data['id'] === 'all' ? "UPDATE $tableName SET $setPart" : "UPDATE $tableName SET $setPart WHERE $data[field_name] = :id";
        
        try {
            $statement = $this->db->prepare($statement);
            foreach($data as $column => $value){
                if($column !== 'field_name' && $column !== 'id'){
                    $statement->bindValue("$column", $value);
                }
            }
            if($data['id'] !== 'all'){
                $statement->bindParam('id', $data['id']);
            }
            // Execute the statement with the combined data
            $statement->execute();
            if($statement->rowCount() > 0){
                $response = array('message'=>'success', 'result'=>array('message'=>'Data updated successfully'));
            }else{
                $response = array('message'=>'failed', 'result'=>array('message'=>'Failed to update data'));
            }
            return $response;
        } catch (\PDOException $e) {
            return array('message'=>'error', 'result'=>array('result'=>$e->getMessage()));
        }
    }
}