<?php

extract($_POST);
$mycon=mysql_connect("localhost","root","");
$mydb=mysql_select_db("library");
	if(!$mydb)
	die("<body bgcolor='#4A6984'><h1>Database Not Created</h1></body>");
	

	$sql="select * from issue where acc_no = '$acc_no' order by issue_date desc";
	//echo $sql;
	$myquery=mysql_query($sql);
	if(mysql_num_rows($myquery)==0)
	die("<body bgcolor='silver'><h1 align='center'><u>Book History</u><br>  Acc No :  $acc_no</h1><br><h2 align='center'>Book Not taken by anyone</h2><h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1></body>");
	
	
	print"
<body bgcolor='silver'><h1 align='center'><u>Books History</u><br><br>  Acc No :  $acc_no</h1>
<table border='1' align='center'><tr><th>SN</th><th>Student ID</th><th>Issue Date</th><th>Return Date</th><th>Fine Paid</th></tr>";

$sn=1;
	while($rows=mysql_fetch_array($myquery))
{
printf("<tr><td>$sn</td><td>%s</td>",$rows['st_id']);
printf("<td>%s</td><td>%s</td>",$rows['issue_date'],$rows['return_date']);
printf("<td>%d</td></tr>",$rows['fine']);
$sn++;
}
print"</table><br><h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1></body>";
	
	
	



mysql_close($mycon);


?>

