<?php
include 'pdo_class.php';
// require_once('settings.config.php');
Class Crude {

    public $refid;
    public $cnt;//$userName;
    protected $passCode;
    protected $dbName;

    function __construct($refid) {
      $this->refid = $refid;
      $query ="SELECT *
      FROM tickets
      ";
      $obj=new DBConnection($localhost);
      $stmt=$obj->getQuery($query);
      $this->cnt= $stmt->rowCount();
    }
 function __destruct() {
   // echo "The fruit is {$this->name}.";
 }

 function get_cnt(){
   // return $this->cnt;

   return $this->cnt;
 }
}
?>
