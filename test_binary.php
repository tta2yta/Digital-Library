<?php
include_once 'dbconfig.php';

$file=rand(1000,100000)."-".$_FILES['file']['name'];
$file_loc=$_FILES['file']['tmp_name'];
$file_size=$_FILES['file']['size'];
$file_type=$_FILES['file']['type'];
$folder="upload/";
$var1=$_POST['isbn'];
//$fp=fopen($file_loc,"r");
//$content=fread($fp,filesize($file_loc));
//$content=addslashes($content);
//fclose($fp);
$file_content=base64_encode(('$file'));
$sql="INSERT INTO books (Isbn,Title,File) VALUES ('$var1','$file','$file_content')";
(mysql_query($sql));
?>