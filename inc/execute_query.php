<?php
function return_row($sql){
  include 'pdo_connectdb.php';
  $qstm =$conn->prepare($sql,$pdo_attr);
  $qstm->execute();
  return $qstm;
}

 ?>
