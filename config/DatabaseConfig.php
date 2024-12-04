<?php
class DatabaseConfig{
    public static function dbConnect()
    {
        
        $host =CONFIGS['db']['prod']['host']; //Ip of database, in this case my host machine
        $user = CONFIGS['db']['prod']['username']; //Username to use
        $pass = CONFIGS['db']['prod']['password']; //Password for that user
        $dbname = CONFIGS['db']['prod']['dbname']; //Name of the database
        try {
            $tcon = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $tcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo_attr = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY);

             //echo "Connection success";
			//exit;
            return $tcon; 
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
$configs = array(
    "db" => array(
        "dev" => array(
            "dbname" => "database1",
            "username" => "dbUser",
            "password" => "pa$$",
            "host" => "localhost",
        ),
        "prod" => array(
            "dbname" => "st&d_db",
            "username" => "root",
            "password" => "",
            "host" => "localhost",
        ),
    ),
);

define("CONFIGS", $configs);

















