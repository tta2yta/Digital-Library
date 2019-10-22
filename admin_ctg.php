
<html>
<head>
<title>
</title>
<link rel="stylesheet" type="text/css" href="reset.css" />
<link rel="stylesheet" type="text/css" href="style_2.css" />
<link rel="stylesheet" type="text/css" href="style_3.css" />
<link rel="stylesheet" type="text/css" href="style_4.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<script language="javascript" type="text/javascript"> 
<!--  
//Browser Support Code 

function ajaxFunction(chk_value){ 
 var ajaxRequest;
var ajax_Request; // The variable that makes Ajax possible! 
 try{ 
   // Opera 8.0+, Firefox, Safari 
   ajaxRequest = new XMLHttpRequest(); 
    ajax_Request = new XMLHttpRequest(); 
 }catch (e){ 
   // Internet Explorer Browsers 
   try{ 
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP"); 
   }catch (e) { 
      try{ 
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP"); 
      }catch (e){ 
         // Something went wrong 
         alert("Your browser broke!"); 
         return false; 
      } 
   } 
 } 
 // Create a function that will receive data  
 // sent from the server and will update 
 // div section in the same page. 
 if (chk_value=="add_ctg"){
 ajaxRequest.onreadystatechange = function(){ 
   if(ajaxRequest.readyState == 4){ 
      var ajaxDisplay = document.getElementById('chk'); 
      ajaxDisplay.innerHTML = ajaxRequest.responseText; 
   } 
 } 
 // Now get the value from user and pass it to 
 // server script. 
 var ctg_id = document.getElementById('ctg_id').value; 
 var ctg_name = document.getElementById('ctg_name').value; 
 var desc = document.getElementById('desc').value; 
 var queryString = "?ctg_id=" + ctg_id ; 
 queryString +=  "&ctg_name=" + ctg_name + "&desc=" + desc; 
 ajaxRequest.open("GET", "ajax-catagory_upload.php" +  
                              queryString, true); 
 ajaxRequest.send(null);  
 }
 else if(chk_value=="add_sub"){
 ajaxRequest.onreadystatechange = function(){ 
   if(ajaxRequest.readyState == 4){ 
      var ajaxDisplay = document.getElementById('chk_1'); 
      ajaxDisplay.innerHTML = ajaxRequest.responseText; 
   } 
 } 
 // Now get the value from user and pass it to 
 // server script. 
 //alert("Your browser broke!"); 
 var auth_id = document.getElementById('arth_id').value; 
 var isbn = document.getElementById('isbn').value; 
 var list = document.forms[1].catagory; 
var ctg_name = list.options[list.selectedIndex].value;
 var queryString = "?auth_id=" + auth_id ; 
 queryString +=  "&isbn=" + isbn + "&ctg_name=" + ctg_name; 
 ajaxRequest.open("GET", "ajax-cmp_sub_upload.php" +  
                              queryString, true); 
							  
 ajaxRequest.send(null);
//alert("Your browser broke!"+ctg_name);  
 }
} 
//--> 
</script> 
</head>

<body>
<div id="header">
</div>
<div id="main-body">

<div id="add-catagory">
<!-- Add Author -->
<h3 align="center"> Add Catagory </h3><br/>
<form id="add_catagory" method="post" action="">
<div><label>Catagory Id</label><input type="text" name="ctg_id" id="ctg_id" value=""></div>
<div><label>Catagory Name</label><input type="text" name="ctg_name" id="ctg_name" value=""></div>
<div><label>Catagory Description</label><input type="text" name="desc" id="desc" value=""></div>
<div><input type="button" id="ctgbtn" value="ADD" onclick="ajaxFunction('add_ctg')"></div>
<div id="chk"></div>
</form>
</div>

<!-- Book Information -->
<div id="add-complete">

<h3 align="center"> Complete Submision </h3><br/>
<form id="cmpl_sub" method="post" action="">
<div><label>Author Id</label><input type="text" name="arth_id" id="arth_id" value=""></div>
<div><label>Isbn</label><input type="text" name="isbn" id="isbn" value=""></div>
<div><label>Catagory Id</label>
<select name= "catagory" id= "catagory" class="ctagory-control" >
  <option selected="selected" value="">-- Select an option --</option>
  <?php
  include_once 'dbconfig.php';
      $sql = "SELECT ctg_id,ctg_name From catagory";
      $result=mysql_query($sql);
      while($row=mysql_fetch_array($result)){
          echo "<option value='$row[0]'>" . $row[1] . "</option>";}
   ?>
</select></div>
<div><input type="button" name="btncomplete" value="ADD" onclick="ajaxFunction('add_sub')"></div>
<div id="chk_1"></div>
</div>

</form>
</div>

</div>
<div id="footer">
</div>


</body>
</html>