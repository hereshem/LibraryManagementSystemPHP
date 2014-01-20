<?php

extract($_POST);
include_once("return/connect/connect.php");	$sql="select * from students where st_id = '$batch/$dept/$roll'";
	//echo $sql;
	$myquery=mysql_query($sql);
	$rows=mysql_fetch_array($myquery);
	if($rows==NULL)

	die("<body bgcolor='silver'><h1>Student not found</h1></body>");
	



	$photo=$rows['upload'];
	$name=$rows['fname']." ". $rows['lname'];
	$id=$rows['st_id'];
	$dob=$rows['dob'];
	$add=$rows['address'];
	$sql="select * from issue where st_id = '$id'";
	//echo $sql;
	$myquery=mysql_query($sql);
	print"
<body bgcolor='silver'><h1 align='center'><u>Welcome $name</u><br>ID : $id
<br>Address : $add<br>Date of birth : $dob<br>
<img src='$photo' height='100' alt='Photo'></h1>
<table border='1' align='center'><tr><th>SN</th><th>Book Acc No</th><th>Issue Date</th><th>Return Date</th><th>Fine Paid</th></tr>";

$sn=1;
	while($rows=mysql_fetch_array($myquery))
{
printf("<tr><td>$sn</td><td align='center'>%d</td>",$rows['acc_no']);
printf("<td>%s</td><td>%s</td>",$rows['issue_date'],$rows['return_date']);
printf("<td>%d</td></tr>",$rows['fine']);
$sn++;
}
print"</table><h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1></body>";
	

mysql_close($mycon);


?>

