<?php
include_once 'dbconfig.php';


$folder="upload/";



if(isset($_POST['btnupload']))
{    
 /*** if we are successful ***/   
 echo 'Connected successfully<br />'; 
 /*** select the database we wish to use ***/ 
 if(mysql_select_db("dl_database") === TRUE)
 { 
$var1=$_POST['isbn'];
$var3=$_POST['pub_date'];
$dat= strtotime('$var3');
//$newformat =new DateTime("m-d-y",$_POST['pub_date']);
//date_default_timezone_set("Kenya/Nairobi");
$newformat =strtotime($_POST['pub_date']);
//$date= $newformat->format("Y-m-d")
$date= date("Y-m-d",$newformat);

/* file to be uploaded information */
//$file=rand(1000,100000)."-".$_FILES['file']['name'];
$file=$var1."-".$_FILES['file']['name'];
$file_ext=explode('.',$_FILES['file']['name']);
$file_ext=end($file_ext);
$file_loc=$_FILES['file']['tmp_name'];
$file_size=$_FILES['file']['size'];
$file_type=$_FILES['file']['type'];
$folder="upload/";

/* image icon to be uploaded information */
//img_$file=rand(1000,100000)."-".$_FILES['img_file']['name'];
$img_file_loc=$_FILES['img_file']['tmp_name'];
$img_file_size=$_FILES['img_file']['size'];
$img_file_type=$_FILES['img_file']['type'];
$img_final_file=str_replace('.pdf','.jpeg',$file);
$images="images/";

$sql="INSERT INTO books (Isbn,Title,size,type,Pub_date) VALUES ('$var1','$file','$file_size','$file_ext','$date')";
if(mysql_query($sql))
 {           
 echo 'New record created successfully<br />'; 
 if(move_uploaded_file($file_loc,$folder.$file) and
 move_uploaded_file($img_file_loc,$images.$img_final_file))
 
 {
 echo 'successfully uploaded';
 echo $img_final_file;
 echo '<br>';
 //echo $newformat." ".$var3;
 }
 else
 {
 echo 'error while uploading file';
 }
 } 
 else  
 {  
 echo 'Unable to INSERT data: <br />' . $sql .'<br />' . mysql_error(); 
 } 
  } 
  /*** if we are unable to select the database show an error ***/
  else  
  {
  echo 'Unable to select database'; 
  }   
  /*** close the connection ***/
  mysql_close(); 
  } 
  else 
  {    /*** if we fail to connect ***/ 
  echo 'Unable to connect'; 
  } 
?>