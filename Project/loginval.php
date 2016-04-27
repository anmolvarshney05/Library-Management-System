<?php
include "session.php";
$conn=mysqli_connect("localhost","root","","library");
$uname=$_POST["username"];
$pass=$_POST["pass"];
$sql="SELECT * FROM authentication WHERE username='$uname' and pass='$pass'";
$res=$conn->query($sql);
if($res->num_rows==1)
{
	$_SESSION['login']=1;
	$_SESSION['uname']=$uname;
	//GET SID
	$sql="SELECT staffid FROM login WHERE username='$uname' ";
	$res2=$conn->query($sql);
	$sarr=mysqli_fetch_array($res2);
	$sid=$sarr[0];
	$_SESSION['sid']=$sid;
	//END 
	header("location:addMember.php");
}
else
{
	$_SESSION['login']=2;
	header("location:index.php");
}
?>