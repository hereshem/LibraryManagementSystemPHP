<body bgcolor="#4A6984" text="white">
<?php
extract($_POST);
include_once("return/connect/connect.php");
if(isset($change))
{
	print"
	<form method='post action='account1.php' name='myform'>
	<br><br><br><h2 align ='center'>Enter New Password : 
	<input type='password' name='pass'>
	<br>Confirm Password : &nbsp;&nbsp;&nbsp;
	<input type='password' name='conpass'><br><br>
	<input type ='submit' name='submit' value='Submit'>
	</h2>
	<input type='hidden' name='id' value='$id'>
	</form>
 <h1 align='center'><a href='Javascript:history.back(1)'>Back</a></h1>

	";
}

else 
{
	if($pass!=$conpass)
	die("<h1><br>Password Not Matched<br><a href='Javascript:history.back(1)'>Go Back</a></h1>
");
	include("return/connect/change");

	if($id[0] == '0')
	$sql = "update students set pass='$pass' where st_id = '$id'";
	else
	$sql="update users set pass='$pass' where id = '$id'";
	
	//echo $sql;
	$myquery=mysql_query($sql);
	
	if(mysql_error())
	die("<h1 align='center'>Error Occured<br><a href='Javascript:history.back(1)'>No</a></h1>
");

	print"
	<h1 align='center'>Password changed Successfully</h1>
";

}


?>

	