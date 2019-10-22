
<html>
<head>
<title>
</title>
<link rel="stylesheet" type="text/css" href="reset.css" />
<link rel="stylesheet" type="text/css" href="style_1.css" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript"> 
function inspect(form) 
{ 
 //form.catagory.disabled=true; 
if (form.ar1.checked)
 { 
  form.txtar1.disabled=false;
  //alert("The box is checked.");
 } else 
 {
 form.txtar1.disabled=true; 
 } 
 
 if (form.ar2.checked)
 { 
  form.txtar2.disabled=false;
  //alert("The box is checked.");
 } else 
 {
 form.txtar2.disabled=true; 
 }
 
 if (form.ar3.checked)
 { 
  form.catagory.disabled=false;
  //alert("The box is checked.");
 } else 
 {
 form.catagory.disabled=true; 
 }
 
 } 
 
 var i=0;
function init()
{
var deskImages = new Array("orth_1", "orth_2", "orth_3", "orth_4","orth_5"); 

  //var image1 = new Image();   
var image1=document.getElementById("img_anim");
   image1.width=250;
	image1.height=200;
	image1.src ="anim_images/" + deskImages[i] + ".jpg";
	i++;
	if(i==deskImages .length-1)
	{
	i=0;
	}
	 var timeoutID = setTimeout("init()",2000);
	 //alert(timeoutID);
	// return;
} 
 </script> 
</head>

<body onload="init()">
<table id="layout" border="1" >
<thead>
<tr>
<!-- <td colspan="2"><h1 align="center"><font face="Lucida Calligraphy" size="6px">ERITREAN ORTHODOX COLLEGE OF THEOLOGY DIGITAL LIBRARY</font></h1></td> -->
<td colspan="2">
<div id="imganim"><img id="img_anim" src="anim_images/orth_1.jpg"></div>
<div id="img_logo"><img id="logo" src="logo/logo_new.jpg"></div>
<div id="mesk"><img id="logo_mesk" src="web_images/meskel_new.jpg" ></div>
</td>
</tr>
</thead>

<tbody>
<tr>
<td id="mm" width=25% valign="top">
<!-- <img id="mar" src="web_images/mar1.jpg" width=100px height=100px> -->
<div id="leftcontent_1">
 <ul id="left_data">
 
<li><a href="https://lisantewahdo.org/">Eritrean Ortodox Tewahdo </a</li>
<li><a href="https://www.stmaryofegypt.org/">St. Mary of Egypt Orthodox Church</a</li>
<li><a href="www.standrewgonj.org/">Greece Ortodox Church</a</li>
<li><a href="www.eotc.faithweb.com/orth.html">Ethiopian Ortodox Tewahdo </a</li>
<li><a href="www.synod.com/synod/indexeng.htm">Russian Orthodox Church</a</li>
</ul>
</div>
<div id="leftcontent_2"></div>
</td>
<td id="maincontent">
<div id="main-content">
<h4 align="center"><font size="5px"> <u>Search Books by Arthur/Title/Catagory</u></font></h4><br/>
<form id="search" method="POST" action="">

<p><input type="checkbox" id="ar_1" name="ar1"  onclick="inspect(this.form)"><label>Arthur Name</label><input type="text" name="txtar1" disabled="true" value=""></p>
<p><input type="checkbox" id="ar_2" name="ar2" onclick="inspect(this.form)"><label>Book Title</label><input type="text" name="txtar2" disabled="true" value=""></p>
<p><input type="checkbox" id="ar_3" name="ar3" checked onclick="inspect(this.form)"><label>Catagory</label><select   name="catagory"  >
  <option selected="selected" value="">-- Select an option --</option>
  <?php
  include_once 'dbconfig.php';
      $sql = "SELECT ctg_id,ctg_name From catagory";
      $result=mysql_query($sql);
      while($row=mysql_fetch_array($result)){
          echo "<option value='$row[1]'>" . $row[1] . "</option>";}
   ?>
</select><br/></p>
<div><input type="submit" id="searchbtn" name="searchbtn" value="Search" ></div>
</form>
</div>

<div id="search-results">

<?php
//include_once 'dbconfig.php';
include_once 'view_3.php';
//echo "hi";
?>
</div>
</td>
</tr>
</tbody>

<tfoot>
<tr>
<td colspan="2">
<div id="footer_add">
<label>Tel No:182270&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
<label>Adress: Edagahamus 121&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
<label>P.O.Box: 728&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
<label>Fax: 182195</label>
</div>
<div id="footer_img">
<a href="http://google.com"><img src="web_images/google.png" width=70 height=18></a>&nbsp;&nbsp;&nbsp;
<a href="http://facebook.com"><img src="web_images/facebook.png" width=70 height=18></a>&nbsp;&nbsp;&nbsp;
<a href="http://gmail.com.com"><img src="web_images/gmail.jpeg" width=70 height=18></a>&nbsp;&nbsp;&nbsp;
<a href="http://yahoo.com"><img src="web_images/yahoo.png" width=70 height=18></a>
</div>
</td>
</tr>
</tfoot>
</table>

</body>
</html>