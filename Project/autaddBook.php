<?php

include "session.php";
$conn=mysqli_connect("localhost","root","","library");
$bid=$_POST["bookId"];
$isbn=$_POST["isbn"];
$name=$_POST["name"];
$auth=$_POST["author"];
$cat=$_POST["category"];
$price=$_POST["price"];
$pubn=$_POST["pubName"];
$top=$_POST["topic"];
if($bid=="" or $isbn=="" or $name=="" or $auth=="" or $cat=="" or $price=="" or $pubn=="" or $top=="")
{
	$_SESSION['err'] = "Please Fill the form correctly";
		$_SESSION['aut']=2;
		header("location:addBook.php");
		exit(0);
}
//GET PUBID
$sql="SELECT pubid from publisher WHERE name='$pubn'";
$res2=$conn->query($sql);

if($res2->num_rows==0)
{
	$_SESSION['aut']=2;
	$_SESSION['err']="Add Given Publisher <b>".$pubn."<b>";
	header("location:addPublisher.php");
	exit(0);	
}
else
{
	$parr=mysqli_fetch_array($res2);
	$pid=$parr[0];
}

//INSERT INTO PUBLISHED BY
$sql="INSERT INTO BOOKS VALUES('$auth','$name','$price','$cat','$isbn','$bid')";
$res=$conn->query($sql);

if($res===TRUE)
{
	$sql="INSERT INTO publishedby VALUES('$bid','$pid')";
	$res2=$conn->query($sql);
	/*INSERT TOPIC*/
	$sql="SELECT topicid FROM topic WHERE topicname='$top'";
	$res2=$conn->query($sql);
	if($res2->num_rows==0)
	{
		$sql="SELECT * FROM topic";
		$res2=$conn->query($sql);
		$tid=$res2->num_rows+100000;	
		//INSERT TOPIC
		$sql="INSERT INTO topic VALUES('$tid','$top')";
		$res2=$conn->query($sql);
	}
	else
	{
		$tarr=mysqli_fetch_array($res2);
		$tid=$tarr[0];
	}
	$sql="INSERT INTO DISCIPLINE VALUES('$bid','$tid')";
	$res2=$conn->query($sql);
	$_SESSION['aut']=$bid;
	$_SESSION['msg']="Book Name: <b>".$name."</b> is assigned Book Id:<b> "." $bid "."</b>";
	/*END*/
	
	//INSERT INTO MAINTAINS
	$sid=$_SESSION['sid'];
	$sql="INSERT INTO MAINTAINS VALUES('$sid','$bid')";
	$res2=$conn->query($sql);
	header("location:addBook.php");
	exit(0);
}
else
{
	$_SESSION['aut']=2;
	$_SESSION['err']=$conn->error;
	header("location:addBook.php");
}
?>