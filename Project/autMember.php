<?php
include "session.php";
$conn=mysqli_connect("localhost","root","","library");
$fname=$_POST["firstname"];
$mname=$_POST["middlename"];
$lname=$_POST["lastname"];
$add=$_POST["address"];
$con=$_POST["contact"];
$memt=$_POST["memType"];
if($fname=="" or $lname=="" or $add=="" or $con=="" or $memt=="")
{
	$_SESSION['err'] = "Please Fill the form correctly";
		$_SESSION['aut']=2;
		header("location:addMember.php");	
		exit(0);
}
$sql="SELECT * from MEMBERS";
$res=$conn->query($sql);
$memid=$res->num_rows+100000;
$sql="SELECT * FROM MEMBERS WHERE memtype='$memt' and contactno='$con' 
and firstname='$fname' and middlename='$mname'and lastname='$lname' 
and address='$add' ";
$res2=$conn->query($sql);
$sql="INSERT INTO MEMBERS 
VALUES('$memt','$con','$fname','$mname','$lname','$add','$memid');";
if($res2->num_rows==0)
{
	$res=$conn->query($sql);
	if($res===TRUE)
	{
		$sid= $_SESSION['sid'];
		$sql="INSERT INTO KEEPSTRACK VALUES('$sid','$memid')";	
		$res=$conn->query($sql);
		$_SESSION['aut']=$memid;
		header("location:addMember.php");	
	}
	else
	{
		$_SESSION['err'] = $conn->error;
		$_SESSION['aut']=2;
		header("location:addMember.php");
	}
}
else
{
	$_SESSION['aut']=2;
	header("location:addMember.php");
}

?>