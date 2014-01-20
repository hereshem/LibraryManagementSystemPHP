
		print"


<html>
<head><title>Compose Form</title>

</head>
<body text=white bgColor=black>
<P><h1>Welcome $id,</h1><h2>Now You Can Send The Message</h2>
<P></P>
<form name='myform' action ='send_msg.php' method='post'>
<P><FONT size=5><STRONG>To:</STRONG></FONT>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp; 
<select name=to>
			";

	$mycon=mysql_connect("localhost","root","");
	$mydb=mysql_select_db("email");
	
	$sql="select * from password";

	$myquery=mysql_query($sql);
	while($rows=mysql_fetch_array($myquery))
	{
		printf("<option value='%s'>%s(%s %s)</option>",$rows['id'],$rows['id'],$rows['fname'],$rows['lname']);
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

<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:history.back(1)'>Back</a></h1>
</form></body>
</html>



";