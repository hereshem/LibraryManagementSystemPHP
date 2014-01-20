<body bgcolor='#4A6984'>
<?php

extract($_POST);

if(isset($no))
die("<body bgcolor='silver'><h1>Action Cancelled<br><a href='javascript:history.back(1)'>Go Back</a></h1></body>");


$date = date("Y-m-d H:i:s");
//$time = date("g:i a");

		include_once("connect/connect.php");
		$sql="select * from issue where sn = '$sn'";
		//echo $sql."<br>";
		$myquery=mysql_query($sql);
		$rows=mysql_fetch_array($myquery);
		$issue=$rows['issue_date'];
		$acc_no=$rows['acc_no'];
		$sql="update issue set return_date='$date' where sn = '$sn'";
		$myquery=mysql_query($sql);
		$sql="update acc_no set bool='0' where acc_no='$acc_no'";
		$myquery=mysql_query($sql);
		$enter="
";
		if($file=fopen("d:/library/return","a"))
	{	
	fputs($file,"$id\t$acc_no\t$issue\t$date$enter");
	}
print"<h1 align='center'>Successful</h1>
<h2 align='center'>The book of Acc No : $acc_no<br>was returned by ID : $id
<br><br><a href='return.html'>Go Back</a></h2>
</body>";
?>


