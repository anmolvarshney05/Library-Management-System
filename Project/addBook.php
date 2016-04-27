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
<title>ADD BOOK</title>
</head>
<body style="background-color:white;">
<h1 style="text-align:center;color:white;">LIBRARY MANAGEMENT</h1>
<div >
<a  href="logout.php" style="width: 5%;">LOGOUT</a>
<a  href="addMember.php" style="width: 10%;">ADD MEMBER</a>
<a  href="searchBook.php" style="width: 10%;">BOOK SEARCH</a>
<a  href="memSearch.php" style="width: 10%;">MEMBER SEARCH</a>
<a  href="addPublisher.php" style="width: 10%;">ADD PUBLISHER</a>
<a  href="addBook.php" style="background-color:#CC3300; width: 10%;">ADD BOOK</a>
<a  href="searchPub.php" style="width: 10%;">SEARCH PUBLISHER</a>
<a  href="issue.php" style="width: 10%;">ISSUES</a>
<a  href="issuereturn.php" style="width: 9%;">ISSUE/RETURN</a>
</div>
<h1 align="center" style="text-align:center;color:white;"><?php  echo "Welcome User, ".$_SESSION['uname'] ?> </h1>
<form name="LOGIN" method="post"  action="autaddBook.php">
<br><br><br>
<h2 align="center" style="color:white">ENTER BOOK DETAILS</h2>
<table align="center" style="width:90%;" id="rounded-corner">
<tr>
<td>
BOOK_ID
<td>
ISBN
<td>
NAME
<td>
AUTHOR
</tr>
<tr>
<td>
<input type="text" name="bookId" 
value="<?php 
$conn=mysqli_connect("localhost","root","","library");
$sql="SELECT * FROM BOOKS";
echo ($conn->query($sql))->num_rows+100000;
?>" readonly/></td>
<td>
<input type="text" name="isbn"/></td>
<td>
<input type="text" name="name"/></td>
<td>
<input type="text" name="author"/></td>
</tr>
<tr>
<td>
CATEGORY</td>
<td>
PUBLISHER_NAME
</td>
<td>
PRICE
</td>
<td>
TOPIC</td>
</tr>
<tr>
<td>
<input type="radio" name="category" value="library" checked>LIBRARY
<input type="radio" name="category" value="bookbank">BOOK BANK<br></td>
</td>
<td>
<input type="text" name="pubName"/></td>
<td>
<input type="text" name="price"/></td>
<td>
<input type="text" name="topic"/></td>
</tr>
<tr>
<td><td><td>
<td><input type="submit" class="btn" name="section"/></td>
</tr>
</table>
</form>
<?php
if($_SESSION['aut']!=0){
echo "<table align=\"center\" id =\"rounded-corner\">
<tr>
<td>
";
if($_SESSION["aut"]!=2 and $_SESSION["aut"]!=0 )
{
	echo $_SESSION["msg"];
	$_SESSION["aut"]=0;
}
elseif($_SESSION["aut"]==2)
{
	echo $_SESSION['err'];
	$_SESSION["aut"]=0;
}
echo  "</td></tr></table>";
}
?>
</body>
</html>