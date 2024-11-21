<?php
 //Import the PhpJasperLibrary
include_once('../PhpJasperLibrary/tcpdf/tcpdf.php');
include_once("../PhpJasperLibrary/PHPJasperXML.inc.php");
require_once('../inc/pdo_class.php');
// include_once("../PhpJasperLibrary/PHPJasperXMLSubReport.inc.php");

//database connection details

$server="localhost";
$db="everify";
$user="root";
$pass="";
$version="0.8b";
$pgport=5432;
$pchartfolder="./class/pchart2";

$value = '2002000006';
$name= "ONUH Sule Simeon";
$centreno ="1234567890";
$centrename ="GSS Garki, Abuja";
$gender ="Male";
$soo="Benue State";
$sbj_arry = array();
$grade_arry =array();
$sbj_arry[]="English";
$sbj_arry[]="Maths";
$sbj_arry[]="Physic";

$grade_arry[]="A";
$grade_arry[]="B";
$grade_arry[]="C";

//display errors should be off in the php.ini file
 ini_set('display_errors', 0);

//setting the path to the created jrxml file
$xml =  simplexml_load_file("../xml/report.jrxml");

$PHPJasperXML = new PHPJasperXML();
//$PHPJasperXML->debugsql=true;
// $PHPJasperXML->arrayParameter=array("class_id"=>"'" .$p1. "'","student_name"=>"'" .$p2."'");
$PHPJasperXML->arrayParameter=array("Pexamno"=>$value,"candidatename"=>$name,"centreno" =>$centreno,"centrename"=>$centrename,"gender"=>$gender,"soo"=>$soo,"subject_arry"=>$sbj_arry,"grade_arry"=>$grade_arry);
$PHPJasperXML->xml_dismantle($xml);
$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
ob_end_clean(); //
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file

// $customer = $_GET['ID'];
// $xml =  simplexml_load_file("reports/customers.jrxml");
//
// $PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->xml_dismantle($xml);
// $PHPJasperXML->sql ="SELECT * FROM vwresult WHERE  examno = '2020003478'";
// $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
// $PHPJasperXML->outpage("I");
?>
