<?php
include_once 'dbconfig.php';

print "<div id=body>";
print"<table width=80% border=1>";
    print"<tr>";
    print"<th colspan=4>your uploads...<label><a href=index.php>upload echo new files...</a></label></th>";
   print"</tr>";
    print"<tr>";
    print"<td>File Name</td>";
    print"<td>File Type</td>";
    print"<td>File Size(KB)</td>";
    print"<td>View</td>";
    print"</tr>";
    
	//mysql_select_db("dl_database");
 $sql="SELECT * FROM books";
 $result_set=mysql_query($sql);
 while($row=mysql_fetch_array($result_set))
 {
 
       print"<tr>";
       print"<td>";echo $row['Isbn']; print"</td>";
        print"<td>";echo $row['Title'];print"</td>";
        $file=$row['Title'];
		$file_show="upload/$file";
        echo"<td><a href ='$file_show' target=_blank>view file</a></td>";
       print"</tr>";
 }
    print"</table>";
    echo $file_show;
print"</div>";
?>

