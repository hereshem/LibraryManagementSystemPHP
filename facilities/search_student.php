<?php

if(!$as=$_GET['as'])
extract($_POST);
if(isset($submit))
{
include_once("return/connect/connect.php");
	if(!$mydb)
	die("<body bgcolor='#4A6984'><h1>Database Not Created</h1></body>");
	$sql="select * from students where st_id like '$batch/$dept/$roll' and $search like '$txtname%'";
	//echo $sql;
	$myquery=mysql_query($sql);
	if($myquery==NULL)

	die("<body bgcolor='silver'><h1>Student not found</h1></body>");
	
print"<body bgcolor='silver'><h1 align='center'><u>Search Results</u></h1><table border='1' align='center'><tr><th>SN</th><th>ID</th><th>First Name</th><th>Last Name</th><th>Address</th></tr>";
$sn=1;
while($rows=mysql_fetch_array($myquery))
{
	printf("<tr><td>$sn</td><td><a href=\"search_student1.php?id=%s&amp;as=$as\">%s</a></td>",$rows['st_id'],$rows['st_id']);
	printf("<td>%s</td><td>%s</td><td>%s</td></tr>",$rows['fname'],$rows['lname'],$rows['address']);

	$sn++;
}

print"</table><h1 align='center'><a href='javascript:history.back(1)'>Go Back</a></h1></body>";
	

mysql_close($mycon);
die();
}


?>

<html>
<head><title>Issue Books</title></head>

<body bgcolor='#4A6984' text="white">
<form name='myform' action='search_student.php' method='post'>
<H2 align='center'><u>CHOOSE STUDENT DETAIL:</u>
</h2>
<table border='0' align='center'>
<tr><th align = 'right'>Batch : </th>
<td>

<select name='batch' class='memorize'><br />
	<OPTION value="%">Not Known</OPTION>
	<OPTION value="058" >2058</OPTION>
  	<OPTION value="059" >2959</OPTION>
	<OPTION value="060" >2060</OPTION>
	<OPTION value="061" >2061</OPTION>
	<OPTION value="062" >2062</OPTION>
	<OPTION value="063" >2063</OPTION>
	<OPTION value="064" >2064</OPTION>
	<OPTION value="065" >2065</OPTION>
	<OPTION value="066" >2066</OPTION>
  	<OPTION value="067" >2967</OPTION>
	<OPTION value="068" >2068</OPTION>
	<OPTION value="069" >2069</OPTION>
	<OPTION value="070" >2070</OPTION>
	<OPTION value="071" >2071</OPTION>
	<OPTION value="072" >2072</OPTION>
	<OPTION value="073" >2073</OPTION>
	<OPTION value="074" >2074</OPTION>
	<OPTION value="075" >2075</OPTION>
</SELECT></td></tr>
<tr>

<th align=right>Department :
</th><td> 
<select name='dept' class='memorize'><br />
	<OPTION value="%">Not Known</OPTION>
	<OPTION value="DCT">Computer</OPTION>
  	<OPTION value="DEX" >Electronics</OPTION>
	<OPTION value="DEL" >Electrical</OPTION>
	<OPTION value="DCE">Civil</OPTION>
	<OPTION value="DME" >Mechanical</OPTION>
	<OPTION value="DRAE" >Ref & AC</OPTION>
	<OPTION value="BCE">Bechlor in Civil Engineering</OPTION>
	<OPTION value="BAgri" >Bechlor in Agriculture</OPTION>
</SELECT></td>
</tr>
<tr>
<th align='right'>Roll No :
</th><td> 
<select name='roll' class='memorize'><br />
	<OPTION value="%">Not Known</OPTION>
	<OPTION value="01" >01</OPTION>
  	<OPTION value="02" >02 </OPTION>
	<OPTION value="03" >03</OPTION>
	<OPTION value="04" >04</OPTION>
	<OPTION value="05" >05</OPTION>
	<OPTION value="06" >06</OPTION>
	<OPTION value="07" >07</OPTION>
	<OPTION value="08" >08</OPTION>
	<OPTION value="09" >09</OPTION>
  	<OPTION value="10" >10</OPTION>
	<OPTION value="11" >11</OPTION>
	<OPTION value="12" >12</OPTION>
	<OPTION value="13" >13</OPTION>
	<OPTION value="14" >14</OPTION>
	<OPTION value="15" >15</OPTION>
	<OPTION value="16" >16</OPTION>
	<OPTION value="17" >17</OPTION>
  	<OPTION value="18" >18</OPTION>
	<OPTION value="19" >19</OPTION>
	<OPTION value="20" >20</OPTION>
	<OPTION value="21" >21</OPTION>
	<OPTION value="22" >22</OPTION>
	<OPTION value="23" >23</OPTION>
	<OPTION value="24" >24</OPTION>
	<OPTION value="25" >25</OPTION>
  	<OPTION value="26" >26</OPTION>
	<OPTION value="27" >27</OPTION>
	<OPTION value="28" >28</OPTION>
	<OPTION value="29" >29</OPTION>
	<OPTION value="30" >30</OPTION>
	<OPTION value="31" >31</OPTION>
	<OPTION value="32" >32</OPTION>
	<OPTION value="33" >33</OPTION>
  	<OPTION value="34" >34</OPTION>
	<OPTION value="35" >35</OPTION>
	<OPTION value="36" >36</OPTION>
	<OPTION value="37" >37</OPTION>
	<OPTION value="38" >38</OPTION>
	<OPTION value="39" >39</OPTION>
	<OPTION value="40" >40</OPTION>
	<OPTION value="41" >41</OPTION>
  	<OPTION value="42" >42</OPTION>
	<OPTION value="43" >43</OPTION>
	<OPTION value="44" >44</OPTION>
	<OPTION value="45" >45</OPTION>
	<OPTION value="46" >46</OPTION>
	<OPTION value="47" >47</OPTION>
	<OPTION value="48" >48</OPTION>
</SELECT>
</td></tr>
<tr>
<th align='right'>Search By:
</th><td>
<select name='search'>
<option value="fname">First Name</option>
<option value="lname">Last Name</option>
<option value="address">Address</option>
</select>
</td>
</tr>
<tr><th align='right'>Type a word: </th>
</th><td>
<input name='txtname'></td></tr>
<tr>
<td align='center' colspan='2'> 
<INPUT  type=submit value=Search name=submit>
</td></tr>
</table>
<input type='hidden' name='as' value='<?php echo $as ?>'>
</form>
</body>
</html>     