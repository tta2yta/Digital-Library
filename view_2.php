<?php
include_once 'dbconfig.php';

print "<div id=bod>";
print"<table width=80% border='3'>";
    print"<tr>";
    print"<th colspan=2 >your uploads...<label><a href=index.php>upload echo new files...</a></label></th>";
   print"</tr>";
   
    
	//mysql_select_db("dl_database");
 $sql="SELECT * FROM books";
 $result_set=mysql_query($sql);
 while($row=mysql_fetch_array($result_set))
 {
       $img=$row['Title'];
	   $img_path="images/$img";
	   $file=$row['Title'];
		$file_show="upload/$file";
		$img_final_file=str_replace('.pdf','.jpeg',$img_path);
			$size=$row['size'];
       print"<tr>"; 
	   print"<td rowspan=3> <a href ='$file_show' target=_blank><img src='$img_final_file' width=150 height=150></a></td> ";
		print"<tr>";
        print"<td><a href ='$file_show' target=_blank>$file</a><br/></td>";
		print"</tr>";
		print"<tr>";
	   echo"<td>$size</td>";
	   print"</tr>";
       print"</tr>";
	   
	   print"<tr>";
       print"<td colspan=2>//////////////////////////////////////////////</td>";
       print"</tr>";
 }
    print"</table>";
    echo $file_show;
	echo $img_path;
print"</div>";
?>