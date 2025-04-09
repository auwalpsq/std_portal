<?php
namespace std_portal\std_gateways;

class GenericGateway{
    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function validateUser($userName, $password){
        $statement = $this->db->prepare("SELECT * FROM users WHERE (user_id = :user_id OR email = :user_id) AND password = :password");
        $statement->bindParam(':user_id', $userName, \PDO::PARAM_STR);
        $statement->bindParam(':password', $password, \PDO::PARAM_STR);
        $statement->execute();
        $rowCount = $statement->rowCount();
        return $rowCount > 0;
    }
    public function checkUser($id){
        if(filter_var($id, FILTER_VALIDATE_EMAIL)){
            $statement = $this->db->prepare("SELECT * FROM users WHERE email = :id");
        }else{
            $statement = $this->db->prepare("SELECT * FROM users WHERE user_id = :id");
        }
        $statement->bindParam(':id', $id, \PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
    public function findOne($tableName, $data){
        $statement = "SELECT * FROM $tableName WHERE $data[field_name] = :id";

        try {
            $statement = $this->db->prepare($statement);
            $statement->bindParam('id', $data['id'], \PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            return array('message'=>'success', 'result'=>$result);
        } catch (\PDOException $e) {
            return array('message'=>'error', 'result'=>$e->getMessage());
        }
    }
    public function find($data){
        $statement = "SELECT * FROM $data[table_name] WHERE $data[field_name] = :id";

        try {
            $statement = $this->db->prepare($statement);
            $statement->bindParam('id', $data['id'], \PDO::PARAM_STR);
            $statement->execute();
            return $statement->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }
    public function update($data){
        if(filter_var($data['id'], FILTER_VALIDATE_EMAIL)){
            $data['field_name'] = 'email';
        }
        $setPart = "";
        foreach ($data as $column => $value) {
            if($column!== 'field_name' && $column !== 'id' && $column!== 'table_name'){
                $setPart.= "$column = :$column, ";
            }
        }
        // Trim the trailing comma and space
        $setPart = rtrim($setPart, ", ");
        $statement = "UPDATE $data[table_name] SET $setPart WHERE $data[field_name] = :id";
        try{
            $statement = $this->db->prepare($statement);
            foreach($data as $column => $value){
                if($column!== 'field_name' && $column!== 'id' && $column!== 'table_name'){
                    $statement->bindValue("$column", $value);
                }
            }
            $statement->bindParam('id', $data['id']);
            $statement->execute();
            return $statement->rowCount() > 0;
        }catch(\PDOException $e){
            return false;
        }

    }
    public function rowCount($tableName, $data)
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
                $response = array('message'=>'success', 'result'=>$statement->rowCount());
            }else{
                $response = array('message'=>'failed', 'result'=>0);
            }
            return $response;
        } catch (\PDOException $e) {
            $response = array('message'=>'error', 'result'=>$e->getMessage());
            return $response;
        }    
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
                $response = array('message'=>'failed', 'result'=>array('message'=>'No Record Available'));
            }
            return $response;
        } catch (\PDOException $e) {
            $response = array('message'=>'error', 'result'=>$e->getMessage());
            return $response;
        }    
    }

    public function genericInsert($tablename, $columns){
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
        $statement = $data['all'] === 'yes' ? "DELETE FROM $tableName" : "DELETE FROM $tableName WHERE";

        try {
            if($data['all'] !== 'yes'){
                $where = "";
                foreach($data as $key=>$value){
                    if($key !== 'condition' && $key !== 'all'){
                        $where .= " $key = :$key $data[condition]";
                    }
                }
                $where = rtrim($where, "$data[condition]");
                $statement .= $where;
            }
            // echo $statement;
            // exit();
            $statement = $this->db->prepare($statement);
            if($data['all'] !== 'yes'){
                foreach($data as $key=>$value){
                    if($key !== 'condition' && $key !== 'all'){
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
            return array('message'=>'error', 'result'=>array('message'=>'Contact Administrator'));
        }
    }
}