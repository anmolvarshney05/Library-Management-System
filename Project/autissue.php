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
<title>ISSUES</title>
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
<a  href="searchPub.php" style="width: 10%;">SEARCH PUBLISHER</a>
<a  href="issue.php" style="background-color:#CC3300; width: 10%;">ISSUES</a>
<a  href="issuereturn.php" style="width: 9%;">ISSUE/RETURN</a>
</div>
<h1 style="text-align:center;color:white;"><?php  echo "Welcome User, ".$_SESSION['uname'] ?> </h1>
<form action="autissue.php" method="post">
<br><br><br>
<h2 align="center" style="color:white">SEARCH BY ISSUE DATE</h2>
<table align="center" style="width:40%;height:30%" name="myform">
    <tr>
<td>DATE:-
<input type="radio" name="type" value="issue" checked/>ISSUE
<input type="radio" name="type" value="return"/>RETURN
</td></tr>
<td><input type="text" name="date" style="width: 100%;height:50px;border-radius: 10px;font-size:14pt;";/></td>
</tr>
<tr>
<td><input type="submit" name="sname" value="SEARCH" style="float:right;width:30%;height:50px;border:solid;border-radius:10px;"/></td>
</tr>


</table>
</form>
<?php
$conn=mysqli_connect("localhost","root","","library");
$idate=$_POST["date"];
if($_POST["type"]=="issue"){

	$sql="SELECT Issue.IssueDate, Members.MemID, CONCAT_WS(' ',FirstName,MiddleName,LastName) AS Name, MemType, ContactNo, Address, 
Books.BookID, Books.Name, Books.Author, Books.Category, Topic.TopicName FROM Members NATURAL JOIN Issue NATURAL JOIN Books 
NATURAL JOIN Discipline NATURAL JOIN Topic WHERE IssueDate = '$idate';
	";
	$res=$conn->query($sql);
	
	echo "
	<div class=\"res \" >
	<table align=\"center\" style=\" background-color:lightblue;\" border=\" 4\">
	<tr>
	<th>ISSUE DATE</th>
	<th>MEM_ID</th><th>MEMBER NAME</th><th>MEM_TYPE</th><th>CONTACT NO</th><th>ADDRESS</th><th>BOOK_ID</th>
	<th>BOOK NAME</th><th>AUTHOR</th><th>CATEGORY</th><th>TOPIC NAME</th>
	</tr>";
	/*echo "
	<table><tr><th>DATE</th>
	</tr>
	";*/
	 while($row = $res->fetch_assoc()) {
		 echo "<tr>";
			//echo  "<td>".$row["IssueDate"]. "</td>" ;
			echo  "<td>".$row["IssueDate"]."</td>"."<td>".$row["MemID"]. "</td>" ."<td>". $row["Name"]. "</td>" ."<td> ". $row["MemType"]. "</td>"
			."<td>". $row["ContactNo"]. "</td>"."<td>". $row["Address"]. "</td>"."<td>". $row["BookID"]. "</td>"."<td>". $row["Name"]. "</td>"
			."<td>". $row["Author"]. "</td>"."<td>". $row["Category"]. "</td>"."<td>". $row["TopicName"]. "</td>"
			;
			echo "</tr>";
		}
		echo "</table> </div>";
}
else
{
	$sql="SELECT Returns.ReturnDate,MemID, CONCAT(FirstName,' ', COALESCE(MiddleName,''), ' ',
	COALESCE(LastName,'')) AS Name2, MemType, ContactNo, Address, 
	Books.BookID, Books.Name, Books.Author, Books.Price, Books.Category,
	Books.ISBN, Topic.TopicID, Topic.TopicName FROM Members NATURAL JOIN Returns NATURAL JOIN Books 
	NATURAL JOIN Discipline NATURAL JOIN Topic WHERE ReturnDate = '$idate';
	";
	$res=$conn->query($sql);
	echo "
	<div class=\"res\">
	<table align=\"center\" style=\" background-color:lightblue;\" border=\" 4\">
	<tr>
	<th>RETURN DATE</th>
	<th>MEM_ID</th><th>MEMBER NAME</th><th>MEM_TYPE</th><th>CONTACT NO</th><th>ADDRESS</th><th>BOOK_ID</th>
	<th>BOOK NAME</th><th>AUTHOR</th><th>CATEGORY</th><th>TOPIC NAME</th>
	</tr>";
	/*echo "
	<table><tr><th>DATE</th>
	</tr>
	";*/
	 while($row = $res->fetch_assoc()) {
		 echo "<tr>";
			//echo  "<td>".$row["IssueDate"]. "</td>" ;
			echo  "<td>".$row["ReturnDate"]. "</td>" ."<td>".$row["MemID"]. "</td>" ."<td>". $row["Name2"]. "</td>" ."<td> ". $row["MemType"]. "</td>"
			."<td>". $row["ContactNo"]. "</td>"."<td>". $row["Address"]. "</td>"."<td>". $row["BookID"]. "</td>"."<td>". $row["Name"]. "</td>"
			."<td>". $row["Author"]. "</td>"."<td>". $row["Category"]. "</td>"."<td>". $row["TopicName"]. "</td>"
			;
			echo "</tr>";
		}
		echo "</table>
		</div>
		";
}
?>
</body>
</html>