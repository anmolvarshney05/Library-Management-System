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
<title>BOOK SEARCH</title>
</head>
<body style="background-color:white;">
<h1 style="text-align:center;color:white;">LIBRARY MANAGEMENT </h1>
<div>
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
<?php
$conn=mysqli_connect("localhost","root","","library");
$name=$_POST["name"];
$topic=$_POST["topic"];
$aut=$_POST["author"];
if(isset($_POST['sname']))
{
	$sql="SELECT Books.BookID, Books.Name, Books.Author, Books.Price, Books.Category,
Books.ISBN, Topic.TopicID, Topic.TopicName FROM Books NATURAL JOIN Discipline NATURAL JOIN Topic WHERE Books.Name LIKE '$name%'";
	$res=$conn->query($sql);
	echo "
	<div class=\"res\">
	<table align=\"center\" style=\" background-color:lightblue;\" border=\" 4\">
	<tr>
	<th>BOOKID</th><th>NAME</th><th>AUTHOR</th><th>PRICE</th><th>CATEGORY</th><th>ISBN</th><th>TOPIC_ID</th><th>TOPIC_NAME</th>
	<th>ISSUE STATUS</th>
	</tr>";
	while($row = $res->fetch_assoc()) 
	{
		 $curBid=$row['BookID'];
		 $istatus="FREE";
		 $sql="SELECT BookId from returns WHERE BookId='$curBid'";
		 if($conn->query($sql)->num_rows!=0)
		 {
			 $istatus="ISSUED";
		 }
		 echo "<tr>";
			echo  "<td>".$row["BookID"]. "</td>" ."<td>". $row["Name"]. "</td>" ."<td> ". $row["Author"]. "</td>"
			."<td> ". $row["Price"]. "</td>"."<td> ". $row["Category"]. "</td>"."<td> ". $row["ISBN"]. "</td>"
			."<td> ". $row["TopicID"]. "</td>"."<td> ". $row["TopicName"]."</td>"."<td>".$istatus."</td>"
			;
			
			echo "</tr>";
	}
	echo "</table></div>";	
}
elseif(isset($_POST['stopic']))
{
		$sql="SELECT Books.BookID, Books.Name, Books.Author, Books.Price, Books.Category,
Books.ISBN, Topic.TopicID, Topic.TopicName FROM Books NATURAL JOIN Discipline NATURAL JOIN Topic WHERE Topic.TopicName LIKE '$topic%'";
	$res=$conn->query($sql);
	echo "
	<div class=\"res\">
	<table align=\"center\" style=\" background-color:lightblue;\" border=\" 4\">
	<tr>
	<th>BOOKID</th><th>NAME</th><th>AUTHOR</th><th>PRICE</th><th>CATEGORY</th><th>ISBN</th><th>TOPIC_ID</th><th>TOPIC_NAME</th>
	<th>ISSUE STATUS</th>
	</tr>";
	while($row = $res->fetch_assoc()) 
	{
		 $curBid=$row['BookID'];
		 $istatus="FREE";
		 $sql="SELECT BookId from returns WHERE BookId='$curBid'";
		 if($conn->query($sql)->num_rows!=0)
		 {
			 $istatus="ISSUED";
		 }
		 echo "<tr>";
			echo  "<td>".$row["BookID"]. "</td>" ."<td>". $row["Name"]. "</td>" ."<td> ". $row["Author"]. "</td>"
			."<td> ". $row["Price"]. "</td>"."<td> ". $row["Category"]. "</td>"."<td> ". $row["ISBN"]. "</td>"
			."<td> ". $row["TopicID"]. "</td>"."<td> ". $row["TopicName"]."</td>"."<td>".$istatus."</td>";
			;
			echo "</tr>";
	}
	echo "</table></div>";	
}
elseif(isset($_POST['sauthor']))
{	
	$sql="SELECT Books.BookID, Books.Name, Books.Author, Books.Price, Books.Category,
Books.ISBN, Topic.TopicID, Topic.TopicName FROM Books NATURAL JOIN Discipline NATURAL JOIN Topic WHERE Books.Author LIKE '$aut%'";
	$res=$conn->query($sql);
	echo "
	<div class=\"res\">
	<table align=\"center\" style=\" background-color:lightblue;\" border=\" 4\">
	<tr>
	<th>BOOKID</th><th>NAME</th><th>AUTHOR</th><th>PRICE</th><th>CATEGORY</th><th>ISBN</th><th>TOPIC_ID</th><th>TOPIC_NAME</th>
	<th>ISSUE STATUS</th>
	</tr>";
	while($row = $res->fetch_assoc()) 
	{
		 $curBid=$row['BookID'];
		 $istatus="FREE";
		 $sql="SELECT BookId from returns WHERE BookId='$curBid'";
		 if($conn->query($sql)->num_rows!=0)
		 {
			 $istatus="ISSUED";
		 }
		 echo "<tr>";
			echo  "<td>".$row["BookID"]. "</td>" ."<td>". $row["Name"]. "</td>" ."<td> ". $row["Author"]. "</td>"
			."<td> ". $row["Price"]. "</td>"."<td> ". $row["Category"]. "</td>"."<td> ". $row["ISBN"]. "</td>"
			."<td> ". $row["TopicID"]. "</td>"."<td> ". $row["TopicName"]."</td>"."<td>".$istatus."</td>"
			;
			echo "</tr>";
	}
	echo "</table></div>";
}
?>
</body>
</html>