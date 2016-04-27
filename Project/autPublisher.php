<?php
include "session.php";
$conn=mysqli_connect("localhost","root","","library");
$name=$_POST["name"];
$add=$_POST["address"];
if($name=="" or $add=="")
{
	$_SESSION['aut']=2;
	$_SESSION['err']="Please Fill the form correctly";
	header("location:addPublisher.php");
	exit(0);
}
$sql="SELECT * from PUBLISHER";
$res=$conn->query($sql);
$pid=$res->num_rows+100000;
$sql="SELECT * FROM PUBLISHER WHERE name='$name' ";
$res2=$conn->query($sql);
$sql="INSERT INTO PUBLISHER VALUES('$add','$name','$pid');";
if($res2->num_rows==0)
{
	$res=$conn->query($sql);
	if($res===TRUE){
	
		$contact=explode(" ",$_POST["contact"]);
		if($contact[0]=="")
		{
		$_SESSION['aut']=2;
		$_SESSION['err']="Please Fill the form correctly";
		header("location:addPublisher.php");
		exit(0);
		}
		foreach($contact as $row)
		{
			$sql="INSERT INTO PUBCONTACTNO VALUES('$pid','$row')";
			$res=$conn->query($sql);
			if($res===FALSE)
			{
				$_SESSION['err'] = $conn->error;
				$_SESSION['aut']=2;
				$sql="DELETE FROM PUBLISHER WHERE PUBID = '$pid'";
				$res=$conn->query($sql);
				header("location:addPublisher.php");
				exit(0);
			}
		}
		$_SESSION['aut']=$pid;
		$_SESSION['msg']="Publisher <b>".$name."</b> is assigned Publisher Id:<b> ".$pid."</b>"; 
	}
	header("location:addPublisher.php");	
}
else
{
	$_SESSION['aut']=2;
	$_SESSION['err']="Publisher <b>".$name."</b>Already Exists";
	header("location:addPublisher.php");
}
?>