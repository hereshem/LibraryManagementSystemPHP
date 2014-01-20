<?php

extract($_POST);


	include_once("return/connect/connect.php");

	$sql="select * from students where st_id = '$batch/$dept/$roll'";
	//echo $sql;
	$myquery=mysql_query($sql);
	$rows=mysql_fetch_array($myquery);
	if($rows==NULL)

	die("<body bgcolor='silver'><h1 align='center'>Student not found<br><a href='javascript:history.back(1)'>Go Back</a></h1></body>");
	



	$photo=$rows['upload'];
	$name=$rows['fname']." ". $rows['lname'];
	$id=$rows['st_id'];

	$sql="select * from issue where st_id = '$batch/$dept/$roll' AND return_date = 'Not Returned'";
	//echo $sql;
	$myquery=mysql_query($sql);
	$num=mysql_num_rows($myquery);
	//echo $num;


	if($num>=5)
	print"<body bgcolor='silver'><h1 align='center'>Your Name Is $name<br><img src='$photo' height='150' ><br>You have no Cards left</h1></body>";
	else
	{
	print"<body bgcolor='silver'>
	<h1 align='center'>Welcome $name <br>Your id : $id <br><img src='$photo' height='150' ></h1>
	<form name='myform' method='POST' action='issue2.php'>
	";
	printf("<h1 align='center'>You Have %d cards left</h1>",5-$num);
		print"<br> 
	<h2 align='center'>Enter the books Acc No:<br>
	<input name='acc_no'>
	<input type='submit' name='submit' value='Submit'></h2>
	<input type='hidden' name='id' value='$id'>
	<input type='hidden' name='student' value='$name'>
	</form>
	<h1 align='center'><a href=\"javascript:history.back(1)\" onclick=\"return confirmLink(this, 'DROP DATABASE d')\">Go Back</a></h1>
	</body>
	";
	}
	



mysql_close($mycon);


?>

