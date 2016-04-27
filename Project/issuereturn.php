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
<title>ISSUE/RETURN</title>
</head>
<body style="background-image:url(download(2).jpeg);">
<h1 style="text-align:center;color:white;">LIBRARY MANAGEMENT </h1>
<div >
<a  href="logout.php" style=" width: 5%;">LOGOUT</a>
<a  href="addMember.php" style="width: 10%;">ADD MEMBER</a>
<a  href="searchBook.php" style="width: 10%;">BOOK SEARCH</a>
<a  href="memSearch.php" style="width: 10%;">MEMBER SEARCH</a>
<a  href="addPublisher.php" style="width: 10%;">ADD PUBLISHER</a>
<a  href="addBook.php" style="width: 10%;">ADD BOOK</a>
<a  href="searchPub.php" style="width: 10%;">SEARCH PUBLISHER</a>
<a  href="issue.php" style="width: 10%;">ISSUES</a>
<a  href="issuereturn.php" style="background-color:#CC3300; width: 9%;">ISSUE/RETURN</a>
</div>
<h1 style="text-align:center;color:white;"><?php  echo "Welcome User, ".$_SESSION['uname'] ?> </h1>
<form action="autissuereturn.php" method="post">
<br><br><br>
<h2 align="center" style="color:white">ISSUE/RETURN</h2>
<table align="center" style="width:50%;height:50%" name="myform">
<tr>
    <th></th>
    <th>ISSUE BOOK</th> 
	
    <th></th>
    <th>RETURN BOOK</th> 
  </tr>
<tr>

<td>MEM_ID</td><td>     <input type="text" name="memid1"/></td>
<td>STAFF_ID </td><td>  <input type="text" name="staffid2" value="
<?php
echo $_SESSION['sid'];
?>"
/></td>
</tr>

<tr>
<td>BOOK_ID</td><td>   <input type="text" name="bookid1"/></td>
<td>BOOK_ID  </td><td> <input type="text" name="bookid2"/></td>
</tr>

<tr>
<td>BOOK NAME</td><td><input type="text" name="bookname1"/></td>
<td>MEM_ID</td><td><input type="text" name="memid2"/></td>
</tr>

<tr>
<td>STAFF_ID</td><td><input type="text" name="staffid1" value="
<?php
echo $_SESSION['sid'];
?>"
/></td>
<td>RETURN_DATE</td><td><input type="text" name="returndate2" value="<?php  
echo date('Y-m-d', strtotime("+7 days"));
?>
" /></td>
</tr>

<tr>
<td>ISSUE DATE</td><td><input type="text" name="issuedate" value="<?php  
echo date('Y-m-d', strtotime("+0 days"));
?>"/></td>
<td><input type="submit" name="return" value="RETURN" /></td>
</tr>

<tr>
<td>RETURN DATE</td><td><input type="text" name="returndate1" value="<?php  
echo date('Y-m-d', strtotime("+7 days"));
?>
"/></td>
<td></td>
</tr>



<tr>
<td><input type="submit" name="issue" value="ISSUE"/></td>
<td></td>
</tr>
<tr>
<td>

</td>
<td></td>
</tr>
</table>
<?php
if($_SESSION['aut']!=0){
echo "<table align=\"center\" name=\"myform\">
<tr>
<td>
";
if($_SESSION["aut"]!=2 and isset($_SESSION["bname"]) and $_SESSION["aut"]!=3 )
{
	echo "Book Name: ".$_SESSION["bname"]." has been issued";
	$_SESSION["aut"]=0;
	unset($_SESSION["bname"]);
}
elseif($_SESSION["aut"]==2)
{
	echo $_SESSION['err'];
	$_SESSION["aut"]=0;
}
else if($_SESSION["aut"]==3)
{
	
	echo "Book Returned, Fine: ".max($_SESSION["bname"],0);
	$_SESSION["aut"]=0;
	unset($_SESSION["bname"]);
}
echo "<td></tr>";
}
?>

</form>
</body>
</html>