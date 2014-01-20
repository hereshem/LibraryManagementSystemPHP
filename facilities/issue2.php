

<body bgcolor='#4A6984'>
<?php

extract($_POST);
include_once("return/connect/connect.php");
$sql="select * from acc_no where acc_no = '$acc_no' and bool = '0'";
	//echo $sql;
	$myquery=mysql_query($sql);
	$rows=mysql_fetch_array($myquery);
	if($rows==NULL)
	die("<h1 align='center'>Book not Found <br>or<br> taken by Somebody else<br><br><a href='javascript:history.back(1)'>Go Back</a></h1></body>");
	$mfn=$rows['mfn'];
	$sql="select * from books where mfn = '$mfn'";
	//echo $sql;
	$myquery=mysql_query($sql);
	$rows=mysql_fetch_array($myquery);
	$book=$rows['name'];
	print"
	<form name='myform' method='POST' action='issue3.php'>
	<h1 align='center'>The Book title is $book</h1><br>	
	<h2 align='center'>Are You Sure?<br><br>
	Enter Your Password : 
	<input type='password' name='pass'><br><br><br>
	<input type=submit name=yes value='Submit'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type='submit' name='no' value='Cancel'></h2>
	<input type='hidden' name='id' value='$id'>
	<input type='hidden' name='acc_no' value='$acc_no'>
	<input type='hidden' name='book' value='$book'>
	<input type='hidden' name='student' value='$student'>
	
	</form>
	<h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1>
	</body>
	";




mysql_close($mycon);

$str="The Book Title Is ";
?>


<script language="javascript">
if(!confirm("<?php echo $str.$book ?>"))
history.back();
</script>