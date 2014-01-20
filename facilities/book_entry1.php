<body bgcolor='#4A6984'>
<?php
extract($_POST);
if(isset($cancel))
die("<h1>The Action Is Cancelled</h1></body>");

include_once("return/connect/connect.php");


if (isset($submit))
{	print"

	<html>

	<body bgcolor='#4A6984' text='white'>
	<h1 align='center'>The Book Is saved with following Data</h1>

	<table border='0' >
	<tr><th align='right' width='50%'>TITLE: </th><td> $title</td></tr>
	<tr><th align='right'>KEYWORD: </th><td> $keyword</td></tr>
	<tr><th align='right'>AUTHOR: </th><td> $author</td></tr>
	<tr><th align='right'>CALL_NO: </th><td> $call_no</td></tr>
	<tr><th align='right'>EDITION: </th><td> $edition</td></tr>
	<tr><th align='right'>PLACE AND PUBLISHER: </th><td> $place</td></tr>
	<tr><th align='right'>YEAR OF PUBLICATION: </th><td> $year</td></tr>
	<tr><th align='right'>PHYSICAL DESCRIPTION: </th><td> $physical</td></tr>
	<tr><th align='right'>ISBN: </th><td> $isbn</td></tr>
	<tr><th align='right'>PRICE: </th><td> $price</td></tr>
	<tr><th align='right'>SOURCE: </th><td> $source</td></tr>

	<tr></tr><tr></tr></table>
	<h1 align='center'>Is the Data Correct?
	<form method='post' action='book_entry1.php'>

	<input type='hidden' name='name' value='$title'>
	<input type='hidden' name='title' value='$keyword'>
	<input type='hidden' name='author' value='$author'>
	<input type='hidden' name='call_no' value='$call_no'>
	<input type='hidden' name='edition' value='$edition'>
	<input type='hidden' name='place' value='$place'>
	<input type='hidden' name='year' value='$year'>
	<input type='hidden' name='physical' value='$physical'>
	<input type='hidden' name='isbn' value='$isbn'>
	<input type='hidden' name='price' value='$price'>
	<input type='hidden' name='source' value='$source'>
	<INPUT  type='submit' value='Yes' name='ok'><br>

	<a href='Javascript:history.back(1)'>No</a></h1>

	</form>

	</body>
	</html>     

	";
}
else

if (isset($cmdsubmit))
{
for($i=0;$i<$book_no;$i++,$acc_no++)
{	$sql="insert into acc_no(acc_no,mfn,bool) values('$acc_no','$mfn','0')";

	$myquery=mysql_query($sql); 
	if(mysql_error())
	die("<h2>Record not Updated from Acc_no $acc_no</h2>");
}

print"<h1 align='center'>Books Recorded Successfully<br>for $book_no times from ";
printf(" Acc No <br>%d to %d<br><br>",$acc_no-$book_no,$acc_no-1);
print"<a href='book_entry.html'>Go Back</a></h1></body>";

mysql_close($mycon);
die();
}


if(isset($ok))
{
	

	$sql="insert into books(title,name,author,call_no,edition,place_n_publisher,year_of_publication,physical_description,isbn,price,source) values('$title','$name','$author','$call_no','$edition','$place','$year','$physical','$isbn','$price','$source')";

	//echo $sql;
	$myquery=mysql_query($sql);
	
	if(mysql_error())
	{
	print "<body bgcolor='silver'><h1>Error Occured<br><a href='Javascript:history.back(1)'>No</a></h1>
</h1></body>";
	die();
	}
	$enter="
";
		if($file=fopen("d:/library/books","a"))
	{	
	fputs($file,"$title\t$name\t$author\t$call_no\t$edition\t$place\t$year\t$physical\t$isbn\t$price\t$source$enter");
	}

	print"<h1 align='center'>Successful</h1>";
}	
if(isset($create)||isset($ok))
{
	$sql="select mfn from books order by mfn desc";
	$myquery=mysql_query($sql);
	$rows=mysql_fetch_array($myquery);
	$mfn=$rows['mfn'];
	$sql="select acc_no from acc_no order by acc_no desc";
	$myquery=mysql_query($sql);
	$rows=mysql_fetch_array($myquery);
	$acc_no=$rows['acc_no'] + 1;
	print"
	<br><br><form action='book_entry1.php' method='post'>
	<h3>Now Enter the number of books : 	
	<input type='text' name=book_no value='1'><br>
	The MFN of book : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type='text' name='mfn' value='$mfn'><br>
	The Acc No Starts From : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type='text' name='acc_no' value='$acc_no'></h3>
	<center><input type='submit' name='cmdsubmit' value='Submit'><br><br><a href='Javascript:history.back(1)'>Go Back</a></center>
	
	</form></body>
	";
}
mysql_close($mycon);
Die();
	

?>
