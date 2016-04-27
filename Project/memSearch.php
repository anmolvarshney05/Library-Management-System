<?php
include "session.php";
if($_SESSION['login']!=1)
{
		$_SESSION['red']=1;
	header("location:index.php");
	
}
else if(!isset($_SESSION["aut"]))
{
	$_SESSION["aut"]=0;
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="CSS/mystyle.css">
<style>
</style>
<title>MEMBER SEARCH</title>
</head>
<body style="background-color:white;">
<h1 style="text-align:center;color:white;">LIBRARY MANAGEMENT </h1>
<div >
<a  href="logout.php" style=" width: 5%;">LOGOUT</a>
<a  href="addMember.php" style="width: 10%;">ADD MEMBER</a>
<a  href="searchBook.php" style="width: 10%;">BOOK SEARCH</a>
<a  href="memSearch.php" style="background-color:#CC3300; width: 10%;">MEMBER SEARCH</a>
<a  href="addPublisher.php" style="width: 10%;">ADD PUBLISHER</a>
<a  href="addBook.php" style="width: 10%;">ADD BOOK</a>
<a  href="searchPub.php" style="width: 10%;">SEARCH PUBLISHER</a>
<a  href="issue.php" style="width: 10%;">ISSUES</a>
<a  href="issuereturn.php" style="width: 9%;">ISSUE/RETURN</a>
</div>
<h1 style="text-align:center;color:white;"><?php  echo "Welcome User, ".$_SESSION['uname'] ?> </h1>
<form method="post" action="autmemSearch.php">
<br><br><br>
<h2 align="center" style="color:white">SEARCH MEMBER</h2>
<table align="center" style="width:30%;height:20%" name="myform">
<tr>
    <th>SEARCH BY MEMBER TYPE</th>
    <th>SEARCH BY NAME</th> 
  </tr>
<tr>
<td>TYPE</td>
<td>NAME</td>
</tr>
<tr>
<td>
<input type="radio" name="type" value="Student" checked> Student<br>
<input type="radio" name="type" value="Faculty"> Faculty<br></td> 
<td>
<input type="text" name="name" ;/>
</td>
</tr>

<tr>
<td><input type="submit" name="stype" value="SEARCH"/></td>
<td><input type="submit" name="sname" value="SEARCH"/></td>
</tr>


</table>
</form>
</body>
</html>