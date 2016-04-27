<?php
include('session.php');
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
<title>Library Management System</title>
</head>
<body style="background-color:white;">
<h1 style="text-align:center;color:white;">LIBRARY MANAGEMENT </h1>
<a  href="logout.php" style="background-color:#CC3300;">LOGOUT</a>
<a  href="addMember.php" >ADD MEMBER</a>
<a  href="searchBook.php">BOOK SEARCH</a>
<a  href="memSearch.php">MEMBER SEARCH</a>
<a  href="addPublisher.php">ADD PUBLISHER</a>
<a  href="addBook.php">ADD BOOK</a>
<a  href="searchPub.php">SEARCH PUBLISHER</a>
<a  href="issue.php">ISSUES</a>
<a  href="issuereturn.php">ISSUE/RETURN</a>
<h1 style="text-align:center;color:white;"><?php  echo "Welcome User, ".$_SESSION['uname'] ?> </h1>
<form action="autsearchBook.php" method="post">
<form name="LOGIN" method="POST" onsubmit="return valid()" action="loginval.php">
<br><br><br>
<h2 align="center" style="color:white">LOGIN</h2>
<table align="center" name="myform">
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
<input style="align:right;" type="submit" name="sbt" label="SUBMIT"/></td>
</tr>
<tr>
<?php
if(isset($_SESSION["login"]))
{	
	if($_SESSION["login"]===2)
	{
	 echo "WRONG CREDENTIALS";
	}	 
}
?>
</tr>
</table>
</form>
</body>
</html>