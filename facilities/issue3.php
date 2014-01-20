<body bgcolor='#4A6984'>
<?php

extract($_POST);

if(isset($no))
die("<h1>Cancelled<br><a href='javascript:history.back(1)'>Go Back</a></h1></body>");
else
{
include_once("return/connect/connect.php");
include("return/connect/change");

$myquery=mysql_query("select *from students where st_id='$id' and pass='$pass'");
if(mysql_num_rows($myquery)=='0')
die("<h1 align='center'>Invalid Password</h1>");
$date = date("Y-m-d H:i:s");
//$time = date("g:i a");

	
	$sql="insert into issue(st_id,acc_no,issue_date,return_date) values('$id',$acc_no,'$date','Not Returned')";
	//echo $sql;
	$myquery=mysql_query($sql);
	$sql="update acc_no set bool='1' where acc_no='$acc_no'";
	$myquery=mysql_query($sql);
	$enter="
";
	if($file=fopen("d:/library/issue","a"))
	{	
	fputs($file,"$id\t$acc_no\t$date\tNot Returned$enter");
	}
	print "
<body bgcolor='silver'><h1 align='center'><u>Successful</u><br>The account is Saved <br>with folowing data</h1>

<h2 align='center'>Student Name : $student<br>Student ID : $id<br>Book Title : $book<br>Book Acc No : $acc_no</h2>
<h1 align='center'><a href='issue_books.html'>Go Back</a></h1>
</body>

";



mysql_close($mycon);
}


?>

