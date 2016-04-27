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
<?php
$conn=mysqli_connect("localhost","root","","library");
$name=$_POST["name"];
$type=$_POST["type"];
echo "<div class=\"res\">";
if(isset($_POST['sname']))
{
	$sql="SELECT MemID, CONCAT_WS(' ',FirstName,MiddleName,LastName) AS Name, MemType, ContactNo, Address FROM Members 
WHERE CONCAT_WS(' ',FirstName,MiddleName,LastName) LIKE '$name%';";
	$res=$conn->query($sql);
	echo "<table align=\"center\" style=\" background-color:lightblue;\" border=\" 4\">
	<tr>
	<th>MEM_ID</th><th>NAME</th><th>MEMBER TYPE</th>
	<th>CONTACT</th><th>ADDRESS</th></tr>";
	echo $res->num_rows;
	while($row = $res->fetch_assoc()) 
	{
		echo "<tr>";
		echo  "<td>".$row["MemID"]. "</td>" ."<td>". $row["Name"]. "</td>" ."<td> ". $row["MemType"]. "</td>"
		."<td> ". $row["ContactNo"]. "</td>"."<td> ". $row["Address"]. "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
elseif(isset($_POST['stype']))
{	
	$sql="SELECT MemID, CONCAT_WS(' ',FirstName,MiddleName,LastName) AS Name, MemType, ContactNo, Address FROM Members 
WHERE MemType='$type';";
	$res=$conn->query($sql);
	echo "<table align=\"center\" style=\" background-color:lightblue;\" border=\" 4\">
	<tr>
	<th>MEM_ID</th><th>NAME</th><th>MEMBER TYPE</th>
	<th>CONTACT</th><th>ADDRESS</th></tr>";
	echo $res->num_rows;
	while($row = $res->fetch_assoc()) 
	{
		echo "<tr>";
		echo  "<td>".$row["MemID"]. "</td>" ."<td>". $row["Name"]. "</td>" ."<td> ". $row["MemType"]. "</td>"
		."<td> ". $row["ContactNo"]. "</td>"."<td> ". $row["Address"]. "</td>";
		echo "</tr>";
	}
	echo "</table>";	
}
echo "<div>"
?>
</body>
</html>