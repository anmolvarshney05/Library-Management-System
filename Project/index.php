<?php
include 'session.php' ;
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="CSS/mystyle.css">
<script>
function valid()
{
var x=document.forms["LOGIN"]["FirstName"].value;
var y=document.forms["LOGIN"]["pass"].value;
	if(x==null|| x=="")
	{
		alert("Username is empty");
	}
	else if(y==null|| y=="")
	{
		alert("Please Enter a Password");
	}
}
</script>
<title>LIBRARY MANAGEMENT SYSTEM</title>
</head>
<body style="background-color:black;">
<h1 style="text-align:center;color:white;">LIBRARY MANAGEMENT </h1>
<div >
<a  href="logout.php" style="background-color:#CC3300; width: 5%;">LOGIN</a>
<a  href="addMember.php" style="width: 10%;">ADD MEMBER</a>
<a  href="searchBook.php" style="width: 10%;">BOOK SEARCH</a>
<a  href="memSearch.php" style="width: 10%;">MEMBER SEARCH</a>
<a  href="addPublisher.php" style="width: 10%;">ADD PUBLISHER</a>
<a  href="addBook.php" style="width: 10%;">ADD BOOK</a>
<a  href="searchPub.php" style="width: 10%;">SEARCH PUBLISHER</a>
<a  href="issue.php" style="width: 10%;">ISSUES</a>
<a  href="issuereturn.php" style="width: 9%;">ISSUE/RETURN</a>
</div>
<h1 style="text-align:center;color:rgb(41,127,184);"><?php 
if(isset($_SESSION['login'])){
	if($_SESSION['login']==1)
{ echo "Welcome User, ".$_SESSION['uname'];} }
?> </h1>
<form name="LOGIN" method="POST" onsubmit="return valid()" action="loginval.php">
<br><br><br>
<h2 align="center">LOGIN </h2>
<table align="center" id="rounded-corner">
<tr>
<td>Username</td>
<td>
<input type="text" name="username"/></td>
</tr>
<tr>
<td>Password</td>
<td>
<input type="password" name="pass"/></td>
</tr>
<tr>
<td>
<input type="submit" name="sbt" class="btn" label="SUBMIT"/>
</td>
</tr>
<tr>
<td></td>
<td>
<?php

if(isset($_SESSION['login']))
{	
 if($_SESSION['login']==2)
 {
	 echo "WRONG CREDENTIALS";
	 $_SESSION['login']=0;
 }	 
}
?>

</td>
<td></td>

</tr>
</table>
</form>
<?php
if(isset($_SESSION['red'])){
	echo "<table align=\"center\" name=\"myform\">
<tr>
<td>
";
echo "You Are Logged Out";
unset($_SESSION['red']);
echo "</table>";
}
?>

</body>
</html>