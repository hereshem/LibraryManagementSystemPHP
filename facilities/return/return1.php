<body bgcolor='#4A6984'>
<?php

extract($_POST);

	
	include_once("connect/connect.php");
		$sql="select * from acc_no where acc_no = '$acc_no'";
		//echo $sql."<br>";
		$myquery=mysql_query($sql);
		$rows=mysql_fetch_array($myquery);
		if($rows==NULL)
		die("<h1 align='center'>No book of Such Acc No</h1></body>");
		$mfn=$rows['mfn'];
		$acc_no=$rows['acc_no'];
		$sql="select * from issue where acc_no ='$acc_no' AND return_date='Not Returned'";
		//echo $sql."<br>";
		$myquery=mysql_query($sql);
		$rows=mysql_fetch_array($myquery);
		if($rows==NULL)
		die("<body bgcolor='silver'><h1 align='center'>The Book is on the library<br><a href='javascript:history.back(1)'>Go Back</a></h1></body>");
		$st_id=$rows['st_id'];
		$sn=$rows['sn'];
//echo "<br>student id: ".$st_id;
		
		$sql="select * from books where mfn =$mfn";
		//echo $sql;
		$myquery=mysql_query($sql);
		$rows=mysql_fetch_array($myquery);
		$book_name=$rows['name'];
//echo "<br>book name: ".$book_name;
		
		
		$sql="select * from students where st_id = '$st_id'";
		//echo $sql."<br>";
		$myquery=mysql_query($sql);
		$rows=mysql_fetch_array($myquery);
		$student_name=$rows['fname']." ".$rows['lname'];
//echo "<br>student name: ".$student_name;		


mysql_close($mycon);

print"
	
	<h1 align ='center'>Acc No : $acc_no<br>The Book is : $book_name<br>Taken By $student_name<br>ID : $st_id</h1>
	<h1 align='center'>Do You Really Want to Submit Book?</h1>
	<form name='myform' method='POST' action='return2.php'>
	<h1 align='center'><input type='submit' name='yes' value='Yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type='submit' name='no' value='No'></h1>
	<input type='hidden' name='sn' value='$sn'>	
	<input type='hidden' name='acc_no' value='$acc_no'>	
	<input type='hidden' name='id' value='$st_id'>	
	</form>
	<h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1></body>
	";

$str="The Book Is ";
?>


<script language="javascript">
if(!confirm("<?php echo $str.$book_name ?>"))
history.back();
</script>
