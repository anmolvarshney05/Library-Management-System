<?php
include "session.php";
if($_SESSION['login']!=1)
{
		$_SESSION['red']=1;
	header("location:index.php");
	exit(0);
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
<title>BOOK SEARCH</title>
</head>
<body style="background-color:white;">
<h1 style="text-align:center;color:white;">LIBRARY MANAGEMENT </h1>
<div >
<a  href="logout.php" style=" width: 5%;">LOGOUT</a>
<a  href="addMember.php" style="width: 10%;">ADD MEMBER</a>
<a  href="searchBook.php" style="background-color:#CC3300; width: 10%;">BOOK SEARCH</a>
<a  href="memSearch.php" style="width: 10%;">MEMBER SEARCH</a>
<a  href="addPublisher.php" style="width: 10%;">ADD PUBLISHER</a>
<a  href="addBook.php" style="width: 10%;">ADD BOOK</a>
<a  href="searchPub.php" style="width: 10%;">SEARCH PUBLISHER</a>
<a  href="issue.php" style="width: 10%;">ISSUES</a>
<a  href="issuereturn.php" style="width: 9%;">ISSUE/RETURN</a>
</div>
<h1 style="text-align:center;color:white;"><?php  echo "Welcome User, ".$_SESSION['uname'] ?> </h1>
<form action="autsearchBook.php" method="post">
<br><br><br>
<h2 align="center" style="color:white">SEARCH BOOK</h2>
<table align="center" style="width:50%;height:30%" name="myform">
<tr>
    <th>SEARCH BY NAME</th>
    <th>SEARCH BY TOPIC</th> 
    <th>SEARCH BY AUTHOR</th>
  </tr>
<tr>
<td>NAME</td>
<td>TOPIC</td>
<td>AUTHOR</td>
</tr>

<tr>
<td><input type="text" name="name"/></td>
<td><input type="text" name="topic"/></td>
<td><input type="text" name="author"/></td>
</tr>

<tr>
<td><input type="submit" name="sname" value="SEARCH"/></td>
<td><input type="submit" name="stopic" value="SEARCH"/></td>
<td><input type="submit" name="sauthor" value="SEARCH"/></td>
</tr>


</table>
</form>
</body>
</html>