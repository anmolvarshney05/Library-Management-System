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
<title>SEARCH PUBLISHER</title>
</head>
<body style="background-color:white;">
<h1 style="text-align:center;color:white;">LIBRARY MANAGEMENT </h1>
<div >
<a  href="logout.php" style="width: 5%;">LOGOUT</a>
<a  href="addMember.php" style="width: 10%;">ADD MEMBER</a>
<a  href="searchBook.php" style="width: 10%;">BOOK SEARCH</a>
<a  href="memSearch.php" style="width: 10%;">MEMBER SEARCH</a>
<a  href="addPublisher.php" style="width: 10%;">ADD PUBLISHER</a>
<a  href="addBook.php" style="width: 10%;">ADD BOOK</a>
<a  href="searchPub.php" style="background-color:#CC3300; width: 10%;">SEARCH PUBLISHER</a>
<a  href="issue.php" style="width: 10%;">ISSUES</a>
<a  href="issuereturn.php" style="width: 9%;">ISSUE/RETURN</a>
</div>
<h1 style="text-align:center;color:white;"><?php  echo "Welcome User, ".$_SESSION['uname'] ?> </h1>
<form action="autsearchPub.php" method="post">
<br><br><br>
<h2 align="center" style="color:white">SEARCH PUBLISHER</h2>
<table align="center" style="width:40%;height:30%" name="myform">
<tr>
    <th>PUBLISHER NAME</th>
  </tr>
<tr>
<td><input type="text" name="name" style="width: 100%;height:50px;border-radius: 10px;font-size:14pt;";/></td>
</tr>

<tr>
<td><input type="submit" name="sname" value="SEARCH" style="float:right;width:30%;height:50px;border:solid;border-radius:10px;"/></td>
</tr>


</table>
</form>
<?php
$conn=mysqli_connect("localhost","root","","library");
$name=$_POST["name"];
$sql="SELECT name,address,contactno from 
PUBLISHER natural join pubcontactno WHERE name LIKE '$name%'";
$res=$conn->query($sql);
echo "
<div class=\"res\">
<table align=\"center\" style=\" background-color:lightblue;\" border=\" 4\">
<tr>
<th>NAME</th><th>ADDRESS</th><th>CONTACT NO</th>
</tr>";
while($row = $res->fetch_assoc()) 
{
	echo "<tr>";
	echo  "<td>".$row["name"]. "</td>" ."<td>". $row["address"]. "</td>" ."<td> ". $row["contactno"]. "</td>";
	echo "</tr>";
}
echo "</table></div>"
?>
</body>
</html>