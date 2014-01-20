<body bgcolor='silver'>
<?php

extract($_POST);

if(isset($cancel))
die("<h1>Action Cancelled</h1><h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1></body>");

	
 if(isset($ok)) 
{
if($pass!=$conpass)
die("<h1>Password Not Matched</h1>");

$file_name=$_FILES[upload][name];
$temp=$_FILES[upload][tmp_name];

move_uploaded_file($_FILES['upload']['tmp_name'],'upload/' . $_FILES['upload']['name']);
}
include_once("return/connect/connect.php");
include("return/connect/change");
	$sql="insert into students values('$batch/$dept/$roll','$fname','$lname','$address','$date-$month-$year','$sex','upload/$file_name','$pass')";

	//echo $sql;
	$myquery=mysql_query($sql);
	
	if(mysql_error())
	{
	print "<body bgcolor='silver'><h1 align='center'>The ID Already Exists:</h1><h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1></body>";
	die();
	}$enter="
";
	if($file=fopen("d:/library/students","a"))
	{	
	fputs($file,"$batch/$dept/$roll\t$fname\t$lname\t$address\t$date-$month-$year\t$sex\tupload/$file_name\t$pass$enter");
	}

print"<body bgcolor='silver'><h1 align='center'><u>Successful</u><br>The student Is saved with following data</h1>
<h2 align='center'>Name : $fname $lname<br>ID : $batch/$dept/$roll<br>Address : $address<br>Date of Birth : $date-$month-$year<br>Sex : $sex<br>
<img src='upload/$file_name' height='150'>
<h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1>
</body>";
	
mysql_close($mycon);




?>

