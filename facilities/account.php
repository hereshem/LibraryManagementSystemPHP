<body bgcolor="#4A6984" text="white">
<?php

$id = $_GET['id'];

include_once("return/connect/connect.php");
	if($id[0] == '0')
	$sql = "select * from students where st_id = '$id'";
	else
	$sql="select * from users where id = '$id'";
	
	//echo $sql;
	$myquery=mysql_query($sql);
	$rows=mysql_fetch_array($myquery);
	if($rows==NULL)

	die("<h1>Student not found</h1></body>");
	



	$photo=$rows['upload'];
	if ($id[0]==0)
	$name=$rows['fname']." ". $rows['lname'];
	else
	$name=$rows['name'];
	
	$dob=$rows['dob'];
	$add=$rows['address'];

	
	print"
<body bgcolor='silver'><h1 align='center'><u>Welcome $name</u><br>ID : $id
<br>Address : $add<br>DOB : $dob<br>
<img src='$photo' height='100' alt='Photo'></h1>
";

if($id[0] == '0')
{
	$sql="select * from issue where st_id = '$id'";
	//echo $sql;
	$myquery=mysql_query($sql);
print"<hr color='black' width='80%'><u><h1 align='center' style=\"color:blue\">The Book Transaction </h1></u>
<table border='1' align='center'><tr><th>SN</th><th>Book Acc No</th><th>Issue Date</th><th>Return Date</th><th>Fine Paid</th></tr>";

$sn=1;
	while($rows=mysql_fetch_array($myquery))
{
printf("<tr><td>$sn</td><td align='center'>%d</td>",$rows['acc_no']);
printf("<td>%s</td><td>%s</td>",$rows['issue_date'],$rows['return_date']);
printf("<td>%d</td></tr>",$rows['fine']);
$sn++;
}
print"</table>";

}


print"<br>
<hr color='black' width='80%'><h1 align='center'>Wanna Change Password<br>Its Easy</h1>
<form method='post' action='account1.php' name='myform'>
<center>
<input type='submit' value='Change Password' name='change'>
</center>
<input type='hidden' value='$id' name='id'>
</form></body>

";
	

mysql_close($mycon);


?>

