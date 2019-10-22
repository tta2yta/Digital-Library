
<?php
include_once 'dbconfig.php';

/* Page Load Results */


if(isset($_POST['txtar1'])&& !(trim($_POST['txtar1'])=='')){
$auth_value=trim($_POST['txtar1']);
}
if(isset($_POST['txtar2'])&& !(trim($_POST['txtar2'])=='')){
$title_value=trim($_POST['txtar2']);
}
 if(isset($_POST['catagory'])&& !($_POST['catagory']=='')){
$ctg_value=$_POST['catagory'];
}
//print "<div id=bod>";
print"<table id=tbl_search width=80% border='0'>";
    print"<tr>";
    print"<th colspan=2 ><h4 align=center><font size=5px><u>Search Results<u></font></h4></b></th>";
   print"</tr>";
   
   
if(isset($auth_value) && !isset($title_value) && !isset($ctg_value) )/* Search by author name */
{
$name=explode(' ',$auth_value);
if (count($name)==1){
$sql="select author_id from authors
 where fname like '%$name[0]%'";
$result=mysql_query($sql);
}
else if (count($name)>1){
$sql="select author_id from authors
 where fname like '%$name[0]%' or lname like '$name[1]%'";
$result=mysql_query($sql);
}
while($row=mysql_fetch_array($result))
{
display_result(1,$row[0],"","");
}
}
else if(isset($auth_value) && isset($title_value) && !isset($ctg_value) )/* Search by author name and Title */
{
$name=explode(' ',$auth_value);
$sql="SELECT
    authors.author_id
    , books.Isbn
FROM
    dl_database.book_auth_ctg
    INNER JOIN dl_database.books
        ON (book_auth_ctg.isbn = books.Isbn)
    INNER JOIN dl_database.authors
        ON (book_auth_ctg.author_id = authors.author_id)
WHERE";
if (count($name)==1){
$sql .= " authors.fname like '%$name[0]%'
   OR books.Title like '%$title_value%'";
$result=mysql_query($sql);
}
else if (count($name)>1){
$sql .= " authors.fname like '%$name[0]%'
   OR authors.lname like '%$name[1]%' or books.Title like '%$title_value%'";
   $result=mysql_query($sql);
}
if(!is_resource($result)) 
echo "bad query";
while($row=mysql_fetch_array($result))
{
display_result(3,$row[0],$row[1],"");
//echo $row[0]." ".$row[1];
}
}
else if(isset($auth_value) && !isset($title_value) && isset($ctg_value) )/* Search by author name and Catagory */
{
$name=explode(' ',$auth_value);
$sql="SELECT
    authors.author_id
    , catagory.ctg_id
FROM
    dl_database.book_auth_ctg
    INNER JOIN dl_database.authors
        ON (book_auth_ctg.author_id = authors.author_id)
    INNER JOIN dl_database.catagory
        ON (book_auth_ctg.ctg_id = catagory.ctg_id)
WHERE";
if (count($name)==1){
$sql .= " authors.fname like '%$name[0]%'
   OR catagory.ctg_name like '%$ctg_value%'";
$result=mysql_query($sql);
}
else if (count($name)>1){
$sql .= " authors.fname ='$name[0]'
   OR authors.lname like '%$name[1]%' or catagory.ctg_name like '%$ctg_value%'";
   $result=mysql_query($sql);
}
if(!is_resource($result)) 
echo "bad query";
while($row=mysql_fetch_array($result))
{
display_result(5,$row[0],"",$row[1]);
//echo $row[0]." ".$row[1];
//echo "<br>";
}
}
else if(!isset($auth_value) && isset($title_value) && !isset($ctg_value) )/* Search by Title */
{
$sql="select Isbn from books
 where Title like '%$title_value%'";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
display_result(2,"",$row[0],"");
//echo $row[0];
}
}
else if(!isset($auth_value) && isset($title_value) && isset($ctg_value) )/* Search by Title and Catagory */
{
$sql="SELECT
    books.Isbn
    , catagory.ctg_id
FROM
    dl_database.book_auth_ctg
    INNER JOIN dl_database.catagory
        ON (book_auth_ctg.ctg_id = catagory.ctg_id)
    INNER JOIN dl_database.books 
        ON (book_auth_ctg.isbn = books.Isbn)
		WHERE books.Title like '%$title_value%'
   or catagory.ctg_name like '%$ctg_value%'";
   $result=mysql_query($sql);
   if(!is_resource($result)) 
echo "bad query";
while($row=mysql_fetch_array($result))
{
display_result(6,"",$row[0],$row[1]);
//echo $row[0]." ".$row[1];
}		
}
else if(!isset($auth_value) && !isset($title_value) && isset($ctg_value) )/* Search by Catagory */
{
$sql="select ctg_id from catagory
 where ctg_name like '%$ctg_value%'";
$result=mysql_query($sql);
if(!is_resource($result)) 
echo "bad query";
//if (count($result)<=0)
//echo "No Records Found". " ".count($result);
while($row=mysql_fetch_array($result))
{
display_result(4,"","",$row[0]);
}
}
else if(isset($auth_value) && isset($title_value) && isset($ctg_value) )/* Search by author name, Title and Catagory */
{
$name=explode(' ',$auth_value);
$sql="SELECT
    authors.author_id
    , books.Isbn
    , catagory.ctg_id
FROM
    dl_database.book_auth_ctg
    INNER JOIN dl_database.catagory
        ON (book_auth_ctg.ctg_id = catagory.ctg_id)
    INNER JOIN dl_database.books 
        ON (book_auth_ctg.isbn = books.Isbn)
    INNER JOIN dl_database.authors
        ON (book_auth_ctg.author_id = authors.author_id) WHERE";

		if (count($name)==1){
$sql .= " authors.fname like '%$name[0]%' OR books.Title like '%$title_value%'
   OR catagory.ctg_name like '%$ctg_value%'";
}
else if (count($name)>1){
$sql .= " authors.fname like '%$name[0]%'
   OR authors.lname like '%$name[1]%' or books.Title like '%$title_value%' or catagory.ctg_name like'%$ctg_value%'";
}
		$result=mysql_query($sql);
if(!is_resource($result)) 
echo "bad query";
while($row=mysql_fetch_array($result))
{
//echo $row[0]." ".$row[1]." ".$row[2];
//echo"<br>";
display_result(7,$row[0],$row[1],$row[2]);
}
}
else if(!isset($_POST['searchbtn']))
display_result(8,"","","");
else
echo "Please Select Search methode";

/*Function for displaying search results  */

function display_result($ind,$auth,$tit,$ctg)
{
$search_query ="SELECT distinct
     authors.fname 
    ,  authors.lname 
    ,  books.Title 
    ,  books.size 
    ,  books.Pub_date 
    ,  catagory.ctg_name 
    ,  books.Isbn 
FROM
     dl_database.book_auth_ctg 
    INNER JOIN  dl_database.books  
        ON (book_auth_ctg.isbn  =  books.Isbn)
    INNER JOIN  dl_database.authors  
        ON (book_auth_ctg.author_id  =  authors.author_id)
    INNER JOIN  dl_database.catagory  
        ON (book_auth_ctg.ctg_id  =  catagory.ctg_id)";

if($ind==1)
$search_query .= " WHERE authors.author_id='$auth'";
else if($ind==2)
$search_query .= " WHERE books.Isbn='$tit'";
else if($ind==3){
$search_query .= " WHERE authors.author_id='$auth' and books.Isbn='$tit'";}
else if($ind==4)
$search_query .= " WHERE catagory.ctg_id='$ctg'";
else if($ind==5)
$search_query .= " WHERE authors.author_id='$auth' and catagory.ctg_id='$ctg'";
else if($ind==6)
$search_query .= " WHERE books.Isbn='$tit' and catagory.ctg_id='$ctg'";
else if($ind==7)
$search_query .= " WHERE authors.author_id='$auth' and books.Isbn='$tit' and catagory.ctg_id='$ctg'";
else if($ind==8)
$search_query .= " ORDER BY books.Pub_date DESC LIMIT 5";
else
{
echo "No Search Methode is Selected";
return 0;
}
$result_set=mysql_query($search_query);
//if (count($result_set)==false)
//echo "No Records Found"." ".count($result_set);
if(is_resource($result_set))            {
while($row_query=mysql_fetch_assoc($result_set))
{
 $img=$row_query['Title'];
	   $img_path="images/$img";
	   $file_name=$row_query['Title'];
	   $author_name=$row_query['fname']." ".$row_query['lname'];
		$file_show="upload/$file_name";
		$img_final_file=str_replace('.pdf','.jpeg',$img_path);
		$file_name_final=explode('-',$file_name);
			$size=change_by_MB($row_query['size']);
       print"<tr>"; 
	   print"<td id=img_stl rowspan=4> <a id=img_stl href ='$file_show' target=_blank><img src='$img_final_file' width=150 height=150></a></td> ";
		print"<tr>";
		print "<div id=info>";
        print"<td>";
		echo "<div id=div_inside>";
		echo "<ul id=info_dv>";
		echo "<li><a href ='$file_show' target=_blank>$file_name_final[1]</a><br/></li>";
	   echo"<li>$author_name</li>";
	    echo"<li>$size</li>";
	   echo "</ul>";
	   echo "</div>";
		echo "</td>";
		print "</div>";
		print"</tr>";
		print"<tr>";
	   echo"<td>";
	   
	   print"</td>";
	   print"</tr>";
		print"<tr>";
	   echo"<td></td>";
	   print"</tr>";
       print"</tr>";
	   
	   print"<tr>";
       print"<td colspan=2>&nbsp;</td>";
       print"</tr>";
}
}
else
{
echo "Bad Query Result";
}
}
print"</table>";
/* function to change bytes to MB or KB */
function change_by_MB($value)
{
if($value>=1024000){
$res=round(($value/1024000),2);
return $res."MB";
}
else{
$res=round(($value/1024),2);
return $res."KB";
}
}

?>
