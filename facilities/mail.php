<body bgcolor="#4A6984" text="white">

<?php


extract($_POST);
if(isset($send))
{
	include_once("return/connect/connect.php");
		
	$date = date("F j, Y");
	$time = date("g:i a");



	$sql="INSERT INTO message(m_to,m_from,subject,msg,time,date) VALUES('$to','$from','$subject','$message','$time','$date')";
	
	$myquery=mysql_query($sql);	
	if(mysql_error())
	die("<h1>Message Not Sent</h1>");
	
	print"<h1 align='center'>Message Sent Sussesfully To $to<br><br><a href='javascript:history.back(1)'>Back</a></h1>";
	
	die();
	mysql_close($mycon);

}

else

if($sn = $_GET['sn'])
{	if($_GET['read']=="no")
	{	include_once("return/connect/connect.php");
		$sql="select m_to from message where sn='$sn'";
		$myquery=mysql_query($sql);
		$rows=mysql_fetch_array($myquery);
		$id=$rows['m_to'];
		$sql="delete from message where sn='$sn'";
		mysql_query($sql);
		if(mysql_error())
		die("error");
	}
	else
	{	include_once("return/connect/connect.php");
		
	$sql="select * from message where sn = '$sn'";

	$myquery=mysql_query($sql);
	$rows=mysql_fetch_array($myquery);
	$frm=$rows['m_from'];
	$sub=$rows['subject'];
	$ms=$rows['msg'];
	$id=$rows['m_to'];

	print"
	<P><h1>Welcome $id,</h1>
	<P></P>

	<FONT size=5><STRONG>From:</STRONG></FONT>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<INPUT  name='txt' value='$frm' size=35>
	<P><FONT size=5><STRONG>Subject:</STRONG></FONT>
	<INPUT value='$sub'  size=35></P>
	<P><FONT size=5><STRONG>Message:</STRONG></FONT></P>
	<P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <TEXTAREA style='WIDTH: 317px; HEIGHT: 129px' name=message rows=6 cols=33>$ms</TEXTAREA></P>
	<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href='javascript:history.back(1)'>Back</a></h1>
	</body>

	";
	die();
	}
}

if (!$id)
$id = $_GET['id'];
if($id)
{
$mail=$_GET['mail'];
if ($mail=="compose")
	{	print"

	<P><h1>Welcome $id,</h1><h2>Now You Can Send The Message</h2>
	<P></P>
	<form name='myform' action ='mail.php' method='post'>
	<P><FONT size=5><STRONG>To:</STRONG></FONT>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	&nbsp;&nbsp; 
	<select name=to><option value='blog'>Post On Blog</option><option value='all'>All Students</option>

			";
	include_once("return/connect/connect.php");

	$sql="select * from students";

	$myquery=mysql_query($sql);
	while($rows=mysql_fetch_array($myquery))
		{
		printf("<option value='%s'>%s (%s %s)</option>",$rows['st_id'],$rows['st_id'],$rows['fname'],$rows['lname']);
		}

	$sql="select * from users";

	$myquery=mysql_query($sql);
	while($rows=mysql_fetch_array($myquery))
		{
		printf("<option value='%s'>%s</option>",$rows['id'],$rows['id']);
		}

	print"
	</select></P>
	<P><FONT size=5><STRONG>Subject:</STRONG></FONT>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <INPUT name=subject style='WIDTH: 225px; HEIGHT: 22px' maxlength='40'></P>
	<P><FONT size=5><STRONG>Message:</STRONG></FONT></P>
	<P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <TEXTAREA style='WIDTH: 317px; HEIGHT: 129px' name=message rows=6 cols=33></TEXTAREA></P>
	<P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	<INPUT style='WIDTH: 71px; HEIGHT: 24px' type=submit size=22 value=Send name=send>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	<INPUT id=reset1 style='WIDTH: 76px; HEIGHT: 24px' type=reset size=29 value=Reset name=reset1></P>
	<input type='hidden' value='$id' name='from'>
	</form></body>
	</html>

	";
	}
else
	{
	include_once("return/connect/connect.php");
	
	$sql = "select * from message where m_to = '$id'";
	
	//echo $sql;
	$myquery=mysql_query($sql);
	$count=mysql_num_rows($myquery);
	
	
	print"

	<u><h1 align='center'> Welcome $id,<br>You Have got $count Messages</h1></h1></u>
	<script language=\"javascript\" type=\"text/javascript\" src=\"return/connect/function.js\"></script>
	<table border='1' align='center'>
	<tr><th><h2 align='center'>S.N</h2></th><th><h2 align='center'>From</h2></th><th>
	<h2 align='center'> Subject</h2></th><th><h2 align='center'>Time</h2></th><th><h2 align='center'>Date</h2></th><th><h2>Delete</h2></th></tr>


	";
	$sn=1;
	while($rows=mysql_fetch_array($myquery))
		{	
	print "<tr><td><h4 align='center'>$sn</h4></td><td><h4 align='center'>";
	printf("%s",$rows["m_from"]);
	print("</h4></td><td><h4 align='center'>");
	printf("<a href=\"mail.php?sn=%d&amp;read=yes\">%s</a>",$rows['sn'],$rows['subject']);
	print("</h4></td><td><h4 align='center'>");
	printf("%s</h4></td><td><h4 align='center'>",$rows['time']);
	printf("%s",$rows['date']);
	print("</h4></td><td><h4 align='center'>");
	printf("<a href=\"mail.php?sn=%d&amp;read=no\" onclick=\"return confirmlink('Delete this Message ?')\">Delete</a>",$rows['sn']);

	print"</h4></td></tr>";


	$sn=$sn+1;

		}

	

	mysql_close($mycon);

	}

	
	
}


?>