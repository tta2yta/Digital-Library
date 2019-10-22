<?php
//include_once 'dbconfig.php';
//if(isset($_POST['btnupload']))
//{
//$file=rand(1000,100000)."-".$_FILES['file']['name'];
//$file_loc=$_FILES['file']['tmp_name'];
//$file_size=$_FILES['file']['size'];
//$file_type=$_FILES['file']['type'];
//$folder="upload/";

//move_uploaded_file($file_loc,$folder.$file);
/*** mysql hostname ***/
 $hostname = 'localhost';
 /*** mysql username ***/
 $username = 'root'; 
 /*** mysql password ***/
 $password = 'root'; 
 /*** connect to the database ***/
 $link = @mysql_connect($hostname, $username, $password); 
 /*** check if the link is a valid resource ***/
 if(is_resource($link))
{
 /*** if we are successful ***/   
 echo 'Connected successfully<br />'; 
 /*** select the database we wish to use ***/ 
 if(mysql_select_db("dl_database", $link) === TRUE)
 { 
$var1=$_POST['isbn'];
$var2=$_POST['title'];
$var3=$_POST['pub_date'];
$sql="INSERT INTO books (Isbn,Title,Pub_date) VALUES ('$var1','$var2','$var3')";
if(mysql_query($sql))
 {           
 echo 'New record created successfully<br />'; 
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
  mysql_close($link); 
  } 
  else 
  {    /*** if we fail to connect ***/ 
  echo 'Unable to connect'; 
  } 
?>