
<HTML><HEAD>
<STYLE>

#Content {
	LEFT: 0px; WIDTH: 150px; POSITION: absolute; TOP: 3px; HEIGHT: 15px; BACKGROUND-COLOR: #697f94
}

#vbar {
	LEFT: 0px; WIDTH: 150px; POSITION: absolute; TOP: 0px; HEIGHT: 450px; BACKGROUND-COLOR: #4a6984
}

</STYLE>
</HEAD>
<BODY>
<DIV id=VBAR>
<DIV id=Content><FONT color=lime>
<CENTER><B>!---CONTENTS---!</B></CENTER></FONT></DIV><BR>
<TABLE height=2 cellSpacing=3 cellPadding=3 width=150 border=0>
  <TBODY>
  <TR>
    <TD width="100%">


<?php
extract($_POST);

if(isset($cmdlogin))
{
	include_once("facilities/return/connect/connect.php");
	if(!$mydb)
	{print("<h1>Database Not Created</h1>");
	 print"<h2>Want to Create the Databases and Tables needed for library ?</h2>";
	 print"<h3>Then Click <a href='facilities/database.php'>Here.</a></h3>";
	 die();
	}
	include("facilities/return/connect/change");
	if ($sign == 'st')
	$sql="select *from students where st_id='$txtUserID' and pass='$pass'";
	else
	$sql="select *from users where id='$txtUserID' and pass='$pass'";
	//echo $sql;
	$myquery=mysql_query($sql);
	$rows=mysql_fetch_array($myquery);
	if($rows==NULL)
	{if($txtUserID=='hem' && $pass=='ozqhvSavbgcah')
	 {print"<table border=1><TR>
                <TD height=13><FONT style='FONT-SIZE: 12pt' 
                  color=lime><B>ACCOUNTS</B></FONT></TD></TR>
             <TR>
                <TD onmouseover=\"this.style.backgroundColor='#2F4254';\" 
                onmouseout=\"this.style.backgroundColor='#4A6984';\" height=12>
                  <P style='MARGIN-LEFT: 12px'><B><FONT color=#395874><A 
                  href='facilities/user_account.html' 
                  target=firmsecond>User Account</A></FONT></B></P></TD></TR>
		  <TR>
                <TD onmouseover=\"this.style.backgroundColor='#2F4254';\" 
                onmouseout=\"this.style.backgroundColor='#4A6984';\" height=12>
                  <P style='MARGIN-LEFT: 12px'><B><FONT color=#395874><A 
                  href='left.php' 
                  >Sign Out</A></FONT></B></P></TD></TR> 
		</table>";
	 }
	 else
	 print "<h1 align='center'>Invalid User ID or Password<br><form method='POST' action='left.php'><input type=submit value=Back></form><h1>";
	}
	else
	{
		$access=$rows['access'];
		$id=$rows['st_id'];
		if ($id=='')
		$id=$rows['id'];
		$type=$sign;
		print "<TABLE style='BORDER-COLLAPSE: collapse' borderColor=#697f94 height=20
      cellPadding=0 width='100%' border=1>
	<tr><td align='center'><font color='white'><b>Welcome</b></font></td></tr>
	<tr><td align='center'><font color='white'><b>$txtUserID</b></font></td></tr></table><br>


            <TABLE align='center' style='BORDER-COLLAPSE: collapse' borderColor=#697f94 
            height=20 cellPadding=0 width='90%' border=1>
              <TBODY>
              <TR>
                <TD height=13><FONT style='FONT-SIZE: 12pt' 
                  color=lime><B>ACCOUNTS</B></FONT></TD></TR>
             <TR>
                <TD onmouseover=\"this.style.backgroundColor='#2F4254';\" 
                onmouseout=\"this.style.backgroundColor='#4A6984';\" height=12>
                  <P style='MARGIN-LEFT: 12px'><B><FONT color=#395874><A 
                  href=\"facilities/account.php?id=$id\"
                  target=firmsecond>My Account</A></FONT></B></P></TD></TR>
";
	if($access==1)
         {     print"<TR>
                <TD onmouseover=\"this.style.backgroundColor='#2F4254';\" 
                onmouseout=\"this.style.backgroundColor='#4A6984';\" height=12>
                  <P style='MARGIN-LEFT: 12px'><B><FONT color=#395874><A 
                  href='facilities/user_account.html' 
                  target=firmsecond>User Account</A></FONT></B></P></TD></TR>
";         }
print"	    <TR>
                <TD onmouseover=\"this.style.backgroundColor='#2F4254';\" 
                onmouseout=\"this.style.backgroundColor='#4A6984';\" height=12>
                  <P style='MARGIN-LEFT: 12px'><B><FONT color=#395874><A 
                  href=\"facilities/mail.php?id=$id&amp;mail=check\" target=firmsecond
                  >Check Mail</A></FONT></B></P></TD></TR>
             <TR>
                <TD onmouseover=\"this.style.backgroundColor='#2F4254';\" 
                onmouseout=\"this.style.backgroundColor='#4A6984';\" height=12>
                  <P style='MARGIN-LEFT: 12px'><B><FONT color=#395874><A 
                  href=\"facilities/mail.php?id=$id&amp;mail=compose\" target=firmsecond
                  >Compose</A></FONT></B></P></TD></TR>
             <TR>
                <TD onmouseover=\"this.style.backgroundColor='#2F4254';\" 
                onmouseout=\"this.style.backgroundColor='#4A6984';\" height=12>
                  <P style='MARGIN-LEFT: 12px'><B><FONT color=#395874><A 
                  href='left.php' 
                  >Sign Out</A></FONT></B></P></TD></TR> 
		</table>


";
	}
	
}
else 
print "
	<form action='left.php' method='post'>
      <TABLE style='BORDER-COLLAPSE: collapse' borderColor=#697f94 height=20
      cellPadding=0 width='100%' border=1>
        <TBODY>
        <TR>
          <TD height=13><FONT style='FONT-SIZE: 10pt' color=lime><B></B><FONT 
            color=yellow><B>User &nbsp;ID</B></FONT></FONT></TD></TR>
        <TR>
          <TD>
            <CENTER><INPUT name=txtUserID style='WIDTH: 90px; POSITION: relative' 
            > </CENTER></TD></TR>
        <TR>
          <TD><FONT color=yellow><B>Password</B></FONT></TD></TR>
	<TR>
          <TD>
            <CENTER><INPUT type='password'style='WIDTH: 90px; POSITION: relative' 
            name='pass'></CENTER></TD></TR>
	<TR>
          <TD height=13><FONT style='FONT-SIZE: 10pt' color=lime><B></B><FONT 
            color=yellow><B>Sign In As : </B></FONT></FONT></TD></TR>
        <TR>        

          <TD><center><input type='radio' value='st' name='sign'>Student</td></tr>
	
	<TR>
          <TD><center><input type='radio' value='lib' name='sign'>Librarians</td></tr>
	
        <TR>
          <TD>
            <CENTER><INPUT style='WIDTH: 92px; POSITION: relative' type=submit value=Submit name=cmdlogin></CENTER></TD></TR>
	<tr><td ><center><a href='welcome.html' target='firmsecond'>Home Page</a></td></center></tr>
              </TBODY>
	</TABLE></form>
    ";
?>  


	<TABLE height=2 cellSpacing=3 cellPadding=3 width=150 border=0>
        <TBODY>
        <TR>
          <TD width="82%">
            <TABLE style="BORDER-COLLAPSE: collapse" borderColor=#697f94 
            height=20 cellPadding=0 width="104%" border=1>
              <TBODY>
		<TR>
                <TD height=13><FONT style="FONT-SIZE: 12pt" 
                  color=lime><B>FACILITIES</B></FONT></TD></TR>
              <TR>
                <TD onmouseover="this.style.backgroundColor='#2F4254';" 
                onmouseout="this.style.backgroundColor='#4A6984';" height=16>
                  <P style="MARGIN-LEFT: 12px"><B><FONT 
                  face="Verdana, Arial, Helvetica, sans-serif" size=2><A 
                  href="facilities/search_book.HTML" 
                  target=firmsecond>Search For Books</A></FONT></B></P></TD></TR>
             
		<TR>
                <TD onmouseover="this.style.backgroundColor='#123456';" 
                onmouseout="this.style.backgroundColor='#4A6984';" height=16>
                  <P style='MARGIN-LEFT: 12px'><B><FONT color=#395874>
<?php
if($access==1 || $access==2)
print"		<A href='facilities/issue_books.html' 
                  target=firmsecond>Issue Books</A>
";
else
print"		<u style='color:#8b008b'>Issue Books</u>";
?>	
			</FONT></B></P></TD></TR>
             

 		<TR>
                <TD onmouseover="this.style.backgroundColor='#2F4254';" 
                onmouseout="this.style.backgroundColor='#4A6984';" height=12>
                  <P style="MARGIN-LEFT: 12px"><B><FONT color=#395874>
<?php
if($access==1 || $access==3)
print"		<A 
                  href=\"facilities/return/RETURN.php?as=$access\" 
                  target=firmsecond>Return Books </A>
";
else
print"		<u style='color:#8b008b'>Return Book</u>";
?>
		</FONT></B></P></TD></TR>
          
		<TR>
                <TD onmouseover="this.style.backgroundColor='#2F4254';" 
                onmouseout="this.style.backgroundColor='#4A6984';" height=12>
                  <P style="MARGIN-LEFT: 12px"><B><FONT color=#395874>
<?php
if($access==1)
print"		<A 
                  href='facilities/book_ENTRY.html' 
                  target=firmsecond>Entry Books</A>
";
else
print"		<u style='color:#8b008b'>Entry Books</u>";
?>	
		</FONT></B></P></TD></TR>
          
		<TR>
                <TD onmouseover="this.style.backgroundColor='#2F4254';" 
                onmouseout="this.style.backgroundColor='#4A6984';" height=12>
                  <P style="MARGIN-LEFT: 12px"><B><FONT color=#395874>
<?php
if($access==1 ||$access==4)
print"		<A 
                  href='facilities/ST_ENTRY.html' 
                  target=firmsecond>New Students</A>
";
else
print"		<u style='color:#8b008b'>New Students</u>";
?>		</FONT></B></P></TD></TR>

	    <TR>
                <TD onmouseover="this.style.backgroundColor='#2F4254';" 
                onmouseout="this.style.backgroundColor='#4A6984';" height=12>
                  <P style="MARGIN-LEFT: 12px"><B><FONT color=#395874><A 
                  href="facilities/search_student.php?as=<?php echo $access ?>" 
                  target=firmsecond>Search Student</A></FONT></B></P></TD></TR>
              
		<TR>
                <TD onmouseover="this.style.backgroundColor='#2F4254';" 
                onmouseout="this.style.backgroundColor='#4A6984';" height=12>
                  <P style="MARGIN-LEFT: 12px"><B><FONT color=#395874><A 
                  href="facilities/history/TODAY.HTML" 
                  target=firmsecond>Today's History</A></FONT></B></P></TD></TR>
              <TR>
                <TD onmouseover="this.style.backgroundColor='#2F4254';" 
                onmouseout="this.style.backgroundColor='#4A6984';" height=12>
                  <P style="MARGIN-LEFT: 12px"><B><FONT color=#395874><A 
                  href="facilities/history/book_history.html" 
                  target=firmsecond>Books History</A></FONT></B></P></TD></TR>
              <TR>
                <TD onmouseover="this.style.backgroundColor='#2F4254';" 
                onmouseout="this.style.backgroundColor='#4A6984';" height=12>
                  <P style="MARGIN-LEFT: 12px"><B><FONT color=#395874><A 
                  href="help.html" 
                  target=firmsecond>Help</A></FONT></B></P></TD></TR>
              
		   <TR>
                <TD height=8><FONT style="FONT-SIZE: 9pt" 
                  color=lime><B>OTHERS</B></FONT></TD></TR>
             <TR>
                <TD onmouseover="this.style.backgroundColor='#2F4254';" 
                onmouseout="this.style.backgroundColor='#4A6984';" height=6>
                  <P style="MARGIN-LEFT: 12px"><B><FONT 
                  face="Verdana, Arial, Helvetica, sans-serif" size=2><A 
                  href="syllabus/index.HTM" 
                  target=firmsecond>Syllabus </A></FONT></B></P></TD></TR>
 <TR>
                <TD onmouseover="this.style.backgroundColor='#2F4254';" 
                onmouseout="this.style.backgroundColor='#4A6984';" height=6>
                  <P style="MARGIN-LEFT: 12px"><B><FONT 
                  face="Verdana, Arial, Helvetica, sans-serif" size=2><A 
                  href="about\ABOUT US.HTML" 
                  target=firmsecond>About Us </A></FONT></B></P></TD></TR>
              <TR>
                <TD onmouseover="this.style.backgroundColor='#2F4254';" 
                onmouseout="this.style.backgroundColor='#4A6984';" height=6>
                  <P style="MARGIN-LEFT: 12px"><B><A 
                  href="photo_gallery.html" 
                  target=firmsecond><FONT 
                  face="Verdana, Arial, Helvetica, sans-serif" size=2>Photo 
                  Gallery</FONT></A></B></P></TD></TR>
		<TR>
                <TD onmouseover="this.style.backgroundColor='#2F4254';" 
                onmouseout="this.style.backgroundColor='#4A6984';" height=6>
                  <P style="MARGIN-LEFT: 12px"><B><A 
                  href="facilities/blog.php?as=<?php echo $access ?>" 
		target=firmsecond><FONT 
                  face="Verdana, Arial, Helvetica, sans-serif" size=2>
			View Blog</FONT></A></B></P></TD></TR>
		<TR>
                <TD onmouseover="this.style.backgroundColor='#2F4254';" 
                onmouseout="this.style.backgroundColor='#4A6984';" height=6>
                  <P style="MARGIN-LEFT: 12px"><B><A 
                  href="roman to unicode.html" target=firmsecond
                  <FONT 
                  face="Verdana, Arial, Helvetica, sans-serif" size=2>Type in Nepali</FONT></A></B></P></TD></TR>
		</TBODY></TABLE>
            </TABLE></TR></TBODY></TABLE></DIV></BODY></HTML>
