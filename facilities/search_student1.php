<?php

if($id=$_GET['id'])
{
	include_once("return/connect/connect.php");
	$sql="select * from students where st_id ='$id'";
	//echo $sql;
	$myquery=mysql_query($sql);
	if($myquery==NULL)

	die("<body bgcolor='silver'><h1>Student not found</h1></body>");
	

	$rows=mysql_fetch_array($myquery);
	$photo=$rows['upload'];
	$fname=$rows['fname'];
	$lname=$rows['lname'];
	$id=$rows['st_id'];
	$dob=$rows['dob'];
	$add=$rows['address'];
	
print"<body bgcolor='silver'><h1 align='center'><u>Student Details</u></h1><h2>";
print"<table align='center'>
	<tr><th align ='right'>NAME : </td><td>$fname $lname</td></tr>
	<tr><th align ='right'>STUDENT ID : </td><td>$id</td></tr>
	<tr><th align ='right'>DATE OF BIRTH : </td><td>$dob</td></tr>
	<tr><th align ='right'>ADDRESS : </td><td>$add</td></tr>
	
</table><br><center><img src='$photo' height='150'></center>";

	if ($as==1)
print"<br><form method='POST' action='search_student1.php'>
<input type='hidden' name='id' value='$id'>
<input type='hidden' name='dob' value='$dob'>
<input type='hidden' name='add' value='$add'>
<input type='hidden' name='photo' value='$photo'>
<input type='hidden' name='fname' value='$fname'>
<input type='hidden' name='lname' value='$lname'>
<center><input type='submit' name='change' value='Change Details'></center></form><br>";
print"</h2><h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1></body>";
	

mysql_close($mycon);

}
else
extract($_POST);
if(isset($change))
{
print"<body bgcolor='silver'><h1 align='center'><u>Change Details of</u><br>ID : $id</h1><h2>";
print"<form method='POST' action='search_student1.php' enctype='multipart/form-data'><table align='center'>
	<tr><th align ='right'>FIRST NAME : </td><td><input name='fname' value='$fname'></td></tr>
	<tr><th align ='right'>LAST NAME : </td><td><input name='lname' value='$lname'></td></tr>
	<tr><th align ='right'>DATE OF BIRTH : </td><td><input name='dob' value='$dob'></td></tr>
	<tr><th align ='right'>ADDRESS : </td><td><input name='add' value='$add'></td></tr>
	</table>
<input type='hidden' name='id' value='$id'>
<input type='hidden' name='photo' value='$photo'>
<br><center><img src='$photo' height='150'><br><br>Change Photo : <br>
<input type='file' name='upload'><br>
<input type='submit' name='submit' value='Submit'><br><br><input type='submit' name='reset' value='Reset Password'></center></form>";


print"</h2><h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1></body>";

}
else
if(isset($submit))
{

$file_name=$_FILES[upload][name];
if($file_name)
{
$temp=$_FILES[upload][tmp_name];

move_uploaded_file($_FILES['upload']['tmp_name'],'upload/' . $_FILES['upload']['name']);
$photo="upload/$file_name";
}
include_once("return/connect/connect.php");
$sql="update `students` set `dob`='$dob',`address`='$add',`upload`='$photo',`fname`='$fname',`lname`='$lname' where `st_id`='$id'";
echo $sql;
$myquery=mysql_query($sql);
	
	if(mysql_error())
	die("<body bgcolor='silver'><h1 align='center'>Updation Failed</h1><h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1></body>");
	else
print"<body bgcolor='silver'><h1 align='center'>Successfully Changed<br><br><a href='javascript:history.back(1)'>Go Back</a></h1></body>";

mysql_close($mycon);
}
else
if(isset($reset))
{
include_once("return/connect/connect.php");
mysql_query("update `students` set pass='' where st_id='$id'");
mysql_close($mycon);
print"<body bgcolor='silver'><h1 align='center'>Password Reseted<br><br><a href='javascript:history.back(1)'>Go Back</a></h1></body>";
}
?>

