<?php
date_default_timezone_set('Africa/Lagos');
// $host = "samjedu.com";
// $databasename= "samjedu_nounexam";
// $username = "samjedu_sysadmin";
// $password = "password2016";

// /* $db = mysql_connect("$host", "$username", "$password") or die(mysql_error());
// $abj_cnn = mysql_select_db("$databasename", $db);
//  */
// /* Connect to a MySQL database using driver invocation */
// $dsn = 'mysql:dbname=dbnou_xam;host=localhost';
// $user = 'root';
// $password = '';

// try {
//     $rec_conn = new PDO($dsn, $user, $password);
// } catch (PDOException $e) {
//     echo 'Connection failed: ' . $e->getMessage();
// }
// //$_SESSION['BatchNo'] =$glbRef;
// $pdo_attr = array(PDO::ATTR_CURSOR =>PDO::CURSOR_FWDONLY);



$host     = "directorateofexaminationsa15.sg-host.com";//Ip of database, in this case my host machine
$user     = "ugavgscekiiyl";	//Username to use
$pass     = "yzi5vge5cqzu";//Password for that user
$dbname   = "dbvwyqowhbpef1";//Name of the database


try {
    $rec_conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $rec_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo_attr = array(PDO::ATTR_CURSOR =>PDO::CURSOR_FWDONLY);
}catch(PDOException $e)
{
  echo $e->getMessage();
}
?>
