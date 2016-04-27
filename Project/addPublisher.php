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
function yes(p1)
{
	if(p1.length<11)
	{
		return false;
	}
	for(i=0;i<p1.length;i++)
	{
	
		if(p1[i]>'9'||p1[i]<'0')
			return false;
	}	
	return true;
}
function valid()
{

var a=document.forms["LOGIN"]["name"].value;

var c=document.forms["LOGIN"]["address"].value;

var d=document.forms["LOGIN"]["contact"].value;

var x=document.forms["LOGIN"]["pubId"].value;


	if(x==null||x==""||a==null||a==""||c==null||c=="")
	{
		alert("Please fill the form correctly");
	}
	else if(!yes(d))
	{
		alert("Make sure Contact is correct");
	}
}
</script>
<title>ADD PUBLISHER</title>
</head>
<body style="background-color:white;">
<h1 style="text-align:center;color:white;">LIBRARY MANAGEMENT </h1>
<div >
<a  href="logout.php" style=" width: 5%;">LOGOUT</a>
<a  href="addMember.php" style="width: 10%;">ADD MEMBER</a>
<a  href="searchBook.php" style="width: 10%;">BOOK SEARCH</a>
<a  href="memSearch.php" style=" width: 10%;">MEMBER SEARCH</a>
<a  href="addPublisher.php" style="background-color:#CC3300; width: 10%;">ADD PUBLISHER</a>
<a  href="addBook.php" style="width: 10%;">ADD BOOK</a>
<a  href="searchPub.php" style="width: 10%;">SEARCH PUBLISHER</a>
<a  href="issue.php" style="width: 10%;">ISSUES</a>
<a  href="issuereturn.php" style="width: 9%;">ISSUE/RETURN</a>
</div>
<h1 align="center" style="text-align:center;color:white;"><?php  echo "Welcome User, ".$_SESSION['uname'] ?> </h1>
<form name="LOGIN" method="post" onsubmit="return valid()" action="autPublisher.php">
<br><br><br>
<h2 align="center" style="color:white">ADD PUBLISHER FORM</h2>
<table align="center" style="width:20%;height:30%" name="myform">
<tr>
<td>NAME</td>
<td><input type="text" name="name"/></td>
</tr>
<tr>
<td>ADDRESS</td>
<td><input type="text" name="address"/></td>
</tr>
<tr>
<td>CONTACT NO</td>
<td><input type="text" name="contact"/></td>
</tr>
<tr><td></td><td><input type="submit" name="submit" style="float:right;" /></td></tr>
</table>
</form>
<?php
if($_SESSION['aut']!=0){
	echo "<table align=\"center\" name=\"myform\">
<tr>
<td>
";
if($_SESSION["aut"]!=2 and $_SESSION["aut"]!=0 )
{
	echo $_SESSION['msg'];
	$_SESSION["aut"]=0;
}
elseif($_SESSION["aut"]==2)
{
	echo $_SESSION['err'];
	$_SESSION["aut"]=0;
}
echo "</table>";
}
?>
</body>
</html>