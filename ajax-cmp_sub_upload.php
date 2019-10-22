<?php
include_once 'dbconfig.php';
// Retrieve data from Query String 
function get_ctgid($name)
{
$sql="select ctg_id from catagory
 where ctg_name='$name'";
$result=mysql_query($sql);
if(!is_resource($result)) 
echo "bad query";
//if (count($result)<=0)
//echo "No Records Found". " ".count($result);
$row=mysql_fetch_array($result);
return $row[0];
}

$auth_id = $_GET['auth_id']; 
$isbn = $_GET['isbn']; 
$ctg_name = $_GET['ctg_name']; 

 // Escape User Input to help prevent SQL Injection 
$auth_id = mysql_real_escape_string($auth_id); 
$isbn = mysql_real_escape_string($isbn); 
$ctg_name = mysql_real_escape_string($ctg_name); 
$ctg_id=get_ctgid($ctg_name);
$sql="INSERT INTO book_auth_ctg (isbn,author_id,ctg_id) VALUES ('$isbn','$auth_id','$ctg_id')";
if(mysql_query($sql))
 { 
echo 'New record created successfully'; 
}
else
{
 echo 'Unable to INSERT data: <br />' . $sql .'<br />' . mysql_error(); 
}

?>