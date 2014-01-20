<?php

extract($_POST);
$mycon=mysql_connect("localhost","root","");
$mydb=mysql_select_db("library");
	if(!$mydb)
	die("<body bgcolor='#4A6984'><h1>Database Not Created</h1></body>");
	

if(isset($day))
{$date = $year."-".$month."-".$days;
}
else
$date = date("Y-m-d");

//print $date;

	$sql="select * from issue where issue_date like '%$date%' or return_date like '%$date%' order by issue_date desc";
	//echo $sql;
	$myquery=mysql_query($sql);
	if(mysql_num_rows($myquery)=='0')
	die("<body bgcolor='silver'><h1 align='center'><u>$date History</u></h1><br><h2 align='center'>Blank</h2><h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1></body>");

	
	print"
<body bgcolor='silver'><h1 align='center'><u>$date History</u></h1>
<table border='1' align='center'><tr><th>SN</th><th>Student ID</th><th>Book Acc No</th><th>Issue Date</th><th>Return Date</th><th>Fine Paid</th></tr>";

$sn=1;
	while($rows=mysql_fetch_array($myquery))
{
printf("<tr><td>$sn</td>
<td>%s</td><td align='center'>%d</td>",$rows['st_id'],$rows['acc_no']);
printf("<td>%s</td><td>%s</td>",$rows['issue_date'],$rows['return_date']);
printf("<td>%d</td></tr>",$rows['fine']);
$sn++;
}
print"</table>";
print"<h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1></body>";
	
	
	



mysql_close($mycon);


?>

