<?php
include_once 'dbconfig.php';
// Retrieve data from Query String 
$ctg_id = $_GET['ctg_id']; 
$ctg_name = $_GET['ctg_name']; 
$desc = $_GET['desc']; 
 // Escape User Input to help prevent SQL Injection 
$ctg_id = mysql_real_escape_string($ctg_id); 
$ctg_name = mysql_real_escape_string($ctg_name); 
$desc = mysql_real_escape_string($desc); 
$sql="INSERT INTO catagory (ctg_id,ctg_name,description) VALUES ('$ctg_id','$ctg_name','$desc')";
if(mysql_query($sql))
 { 
echo 'New record created successfully'; 
}
else
{
 echo 'Unable to INSERT data: <br />' . $sql .'<br />' . mysql_error(); 
}
?>