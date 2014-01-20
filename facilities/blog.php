<body bgcolor="#4A6984" text="white">
<script language="javascript" type="text/javascript" src="return/connect/function.js"></script>
<br><h1 align='center'><u>Welcome to the Blog</u></h1>



<?php
	include_once("return/connect/connect.php");
	if(!$mydb)
	die("<body bgcolor='#4A6984'><h1>Database Not Created</h1>");

	$as=$_GET['as'];
	if($sn=$_GET['sn'])
	mysql_query("delete from message where sn='$sn'");
	
	$sql = "select * from message where m_to = 'blog' order by sn desc";
	
	//echo $sql;
	$myquery=mysql_query($sql);
	$count=mysql_num_rows($myquery);
	
	print"
	<h3 align='center'>Total Posts On Blog : $count</h3>
	
	";
	while($rows=mysql_fetch_array($myquery))
	{	printf("<hr color='red'>&nbsp;&nbsp;&nbsp;<font color='red'>%s %s</font>",$rows['date'],$rows['time']);
		if ($as==1)
		printf("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"blog.php?sn=%d&amp;as=$as\" onclick=\"return confirmlink('Delete this Post ?')\">Delete</a>",$rows['sn']);

		printf("<hr color='red'><h2>By : %s &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Title : %s</u></h2>",$rows['m_from'],$rows['subject']);
		printf("<h3>%s</h3>",$rows['msg']);
	}




mysql_close($mycon);

?>

</body>