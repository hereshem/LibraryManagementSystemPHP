<html>

<body bgcolor="#4A6984" text="white">

<?php
include_once("return/connect/connect.php");
if($id=$_GET['id'])
{
$sql="delete from users where id='$id'";
mysql_query($sql);
if(mysql_error())
die("<h1>Error</h1> Cant Delete User");
else 
die("<h1 align='center'>User $id Deleted</h1>");
}
else
extract($_POST);

if(isset($view))
{	
	$sql="select * from users";
	//echo $sql;
	$myquery=mysql_query($sql);
	$count=mysql_num_rows($myquery);
	print "
	<h1 align='center'><u>Total Users in Library : $count</u></h1><script language=\"Javascript\" src=\"return/connect/function.js\" type=\"text/javascript\"></script>
	<Table border='1' align='center'>
	<tr><th>SN</th><th>User ID</th><th>Name</th><th>Rights</th><th>Delete</th></tr>
	";
	$sn=1;
	while($rows=mysql_fetch_array($myquery))
	{	$access=$rows['access'];
		if ($access==1) $right="Administrator"; else if ($access==2) $right="Issue Rights"; else if ($access==3) $right="Book Returning Rights"; else  $right="Student Entry Rights";
		printf("<tr><td>$sn</td><td>%s</td><td>%s</td><td>%s</td>",$rows['id'],$rows['name'],$right);
		printf("<td><a href=\"user_account1.php?id=%s\" onclick=\"return confirmlink('Delete The User %s?')\">Delete</a></td></tr>",$rows['id'],$rows['id']);
		$sn++;
	}
	die("</table></body></html>");





}


	if($pass!=$repass)
	die("<h1>Password Not Matched</h1>");
	include("return/connect/change");

	$file_name=$_FILES[upload][name];
	$temp=$_FILES[upload][tmp_name];

	move_uploaded_file($_FILES['upload']['tmp_name'],'upload/' . $_FILES['upload']['name']);


	$sql="insert into users values('$id','$pass','$name','$address','$phone','$access','upload/$file_name')";

	//echo $sql;
	$myquery=mysql_query($sql);
	if (mysql_error())
	Die("Error");


mysql_close($mycon);
?>

<h1 align='center'>Record Saved With Following Data</h1>
<TABLE 	BORDER='0' align ='center'>

<tr><th align='right'>FIRST NAME : </th><td><?php print $name ?></td></tr>

<tr><tH align='right'>DATE OF BIRTH : </th><td><?php print $year." ".$month." ".$date ?></td></tr>
<tr><th align='right'>ADDRESS : </th><td><?php print $address ?></td></tr>
<tr><th align='right'>SEX : </th><td><?php print $sex ?></td></tr>
<tr><th align='right'>PHONE : </th><td><?php print $phone ?></td></tr>
<tr><th align='right'>ACCESS RIGHTS : </th><td><?php if ($access==1) echo "Administrator"; else if ($access==2) echo "Issue Rights"; else if ($access==3) echo "Book Returning Rights"; else  echo "Student Entry Rights"; ?></td></tr>


<tr></tr><tr></tr>
</table>
</form>

<h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1>

</body>
</html>     