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
<script>
function valid()
{
	var a=document.forms["LOGIN"]["firstname"].value;

	var b=document.forms["LOGIN"]["lastname"].value;

	var c=document.forms["LOGIN"]["address"].value;

	var d=document.forms["LOGIN"]["contact"].value;

	var x=document.forms["LOGIN"]["memId"].value;

	var y=document.forms["LOGIN"]["memType"].value;

	x="c";

	if(x==null||x==""||y==null||y==""||a==null||a==""||b==null||b==""||c==null||c==""||d==null||d=="")
	{
		alert("Please fill the form correctly");
	}
}
</script>
<title>ADD MEMBER</title>
</head>
<body style="background-image:url(download(1).jpeg)">
<h1 style="text-align:center;color:white;">LIBRARY MANAGEMENT</h1>
<div >
<a  href="logout.php" style="width: 5%;">LOGOUT</a>
<a  href="addMember.php" style="background-color:#CC3300; width: 10%;">ADD MEMBER</a>
<a  href="searchBook.php" style="width: 10%;">BOOK SEARCH</a>
<a  href="memSearch.php" style="width: 10%;">MEMBER SEARCH</a>
<a  href="addPublisher.php" style="width: 10%;">ADD PUBLISHER</a>
<a  href="addBook.php" style="width: 10%;">ADD BOOK</a>
<a  href="searchPub.php" style="width: 10%;">SEARCH PUBLISHER</a>
<a  href="issue.php" style="width: 10%;">ISSUES</a>
<a  href="issuereturn.php" style="width: 9%;">ISSUE/RETURN</a>
</div>
<h1 style="text-align:center;color:white;"><?php  echo "Welcome User, ".$_SESSION['uname'] ?> </h1>
<form name="LOGIN" method="post" onsubmit="return valid()" action="autMember.php" >
<br><br><br>
<h2 align="center" style="color:white">NEW MEMBER</h2>
<table align="center" style="width:20%;height:30%" name="myform">
<tr>
<td>FIRST NAME</td>
<td><input type="text" name="firstname"/></td>
    <td>MIDDLE NAME</td>
<td><input type="text" name="middlename"/></td>
    <td>LAST NAME</td>
<td><input type="text" name="lastname"/></td>

</tr>
<tr>
<td>ADDRESS</td>
<td><input type="text" name="address"/></td>
</tr>
<tr>
<td>CONTACT</td>
<td><input type="text" name="contact"/></td>
</tr>
<tr>
<td>MEM_TYPE</td>
<td><input type="radio" name="memType" value="student" checked/>Student
<input type="radio" name="memType" value="faculty"/>Faculty
</td></tr>

<tr>
<td></td>
<td><input type="submit" class="btn" name="submit" value="SUBMIT"/>
</td></tr>
</table>
<?php
if($_SESSION['aut']!=0){
	echo "<table align=\"center\" name=\"myform\">
	
	<tr><td>";
	if($_SESSION["aut"]!=2 and $_SESSION["aut"]!=0 )
	{
		echo "Member ID: <b>".$_SESSION["aut"]."</b> added";
		$_SESSION["aut"]=0;
	}
	elseif($_SESSION["aut"]==2)
	{
		echo $_SESSION['err'];
		$_SESSION["aut"]=0;
	}
	echo "</td></tr><table>";
	}
?>

</form>
</body>
</html>