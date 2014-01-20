<?php

extract($_POST);
include_once("return/connect/connect.php");
if(!$mydb)
die("<body bgcolor='#4A6984'><h1>Database Not Created</h1>");
if (isset($submit))
{	if($cmbsearch!='acc_no')

	{	$sql="select * from books where $cmbsearch LIKE '%$txtsearch%' order by $cmbsearch";
		//echo "$cmbsearch,$txtsearch";
		$myquery=mysql_query($sql);
		print"
		<body bgcolor='silver'>
		<table border='1' align='center'>
		<tr><th>SN</th><th>Keyword</th><th>Title</th><th>Author</th><th>MFN</th></tr>
		";
		$sn=1;
		while($rows=mysql_fetch_array($myquery))
		{
		print "<tr><td>$sn</td><td>";
		printf("<a href=\"search_book1.php?mfn=%d\">%s</a></td><td>%s</td><td>%s</td><td>%s</td></tr>",$rows['mfn'],$rows['title'],$rows['name'],$rows['author'],$rows['mfn']);
		$sn=$sn+1;
		}
		echo"</table><h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1></body>";
		die();
	}
	
	{	$sql="select * from acc_no where acc_no = '$txtsearch'";
		//echo "$cmbsearch,$txtsearch";
		$myquery=mysql_query($sql);
		$rows=mysql_fetch_array($myquery);
		if($rows==NULL)
		die("<body bgcolor='silver'><h1>Book not Found</h1></body>");
		echo"<body bgcolor='silver'><h2 align='center'>Acc No : $txtsearch</h2>";
		$mfn=$rows['mfn'];
}	}
else
{
$mfn=$_GET['mfn'];
$sql="select * from acc_no where mfn = $mfn";
$myquery=mysql_query($sql);
echo "<body bgcolor='silver'><h2 align='center'>Acc No : ";
while($rows=mysql_fetch_array($myquery))
{	if ($rows['bool']==1)
	echo "<b style='color:red'>";
	else
	echo "<b style='color:blue'>";
	echo $rows['acc_no']."</b> , ";
}
echo " </h2>";
}
		$sql="select * from books where mfn = $mfn";
		//echo $mfn;
		$myquery=mysql_query($sql);
		$rows=mysql_fetch_array($myquery);
		print"
		<h1 align='center'><u>Book Detail</u></h1><table border='0' align='center'>";
	printf("<tr><th align='right'>MFN : </th><td>%s</td></tr>",$rows['mfn']);	
	printf("<tr><th align='right'>Keyword : </th><td>%s</td></tr>",$rows['title']);
	printf("<tr><th align='right'>Title : </th><td>%s</td></tr>",$rows['name']);
	printf("<tr><th align='right'>Author : </th><td>%s</td></tr>",$rows['author']);
	printf("<tr><th align='right'>Edition : </th><td>%s</td></tr>",$rows['edition']);
	printf("<tr><th align='right'>Call No : </th><td>%s</td></tr>",$rows['call_no']);
	printf("<tr><th align='right'>Place And Publisher : </th><td>%s</td></tr>",$rows[6]);
	printf("<tr><th align='right'>Year of Publication : </th><td>%s</td></tr>",$rows[7]);
	printf("<tr><th align='right'>Physical Description : </th><td>%s</td></tr>",$rows[8]);
	printf("<tr><th align='right'>ISBN : </th><td>%s</td></tr>",$rows['isbn']);
	printf("<tr><th align='right'>Price : </th><td>%s</td></tr>",$rows['price']);
	printf("<tr><th align='right'>Source : </th><td>%s</td></tr>",$rows['source']);
	print"	</table><h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1></body>";
	

mysql_close($mycon);


?>


