<?PHP
include "session.php";
$conn=mysqli_connect("localhost","root","","library");

if(isset($_POST['issue']))
{
	//"memid1""bookid1""bookname1""staffid1""issuedate""returndate1"
	$memid=$_POST["memid1"];
	$bid=$_POST["bookid1"];
	$bname=$_POST["bookname1"];
	$sid=$_POST["staffid1"];
	$idate=$_POST["issuedate"];
	$rdate=$_POST["returndate1"];
	$sql="SELECT MemID from members WHERE MemID='$memid'";
	
	$res=$conn->query($sql);
	$sql="SELECT BookID,Name from books WHERE BookID='$bid'";
	
	$res2=$conn->query($sql);
	
	if($res->num_rows>0 and $res2->num_rows>0)
	{
		$arr=mysqli_fetch_array($res2);
		$bname=$arr[1];
		$sql="INSERT INTO Issue(MemID, BookID) VALUES('$memid','$bid')";
		$res=$conn->query($sql);
		$sql="INSERT INTO Returns(ReturnDate,MemID,BookID) VALUES('$rdate','$memid','$bid')";
		$res2=$conn->query($sql);
		if($res===TRUE and $res2===TRUE)
		{
			$_SESSION['bname']=$bname;
			$_SESSION['aut']=1;
		}
		else
		{
			$_SESSION['aut']=2;
			$_SESSION['err']="Invalid Data Entry";
		}
	}
	else
	{
		$_SESSION['aut']=2;
		$_SESSION['err']="Invalid Data Entry";
	}
	header("location:issuereturn.php");
}
elseif(isset($_POST['return']))
{
	$memid=$_POST["memid2"];
	$bid=$_POST["bookid2"];
	$sid=$_POST["staffid2"];
	$rdate=$_POST["returndate2"];

	$sql="SELECT BookID,MemID from issue WHERE BookID='$bid' and MemID='$memid'";
	$res=$conn->query($sql);
	if($res->num_rows)
	{
		$sql="SELECT (datediff('$rdate' , Returns.ReturnDate) * 1.00),Returns.ReturnDate AS Fine FROM Returns WHERE Returns.BookID = '$bid'";
		$res=$conn->query($sql);
		$arr=mysqli_fetch_array($res);
		$fine=$arr[0];
		$r2=$arr[1];
		$sql="DELETE FROM Returns WHERE Returns.BookID ='$bid' ";
		$res=$conn->query($sql);
		$sql="DELETE FROM Issue WHERE Issue.BookID = '$bid' ";
		$res2=$conn->query($sql);
		if($res===TRUE and $res2===TRUE)
		{
			$_SESSION['bname']=$fine;
			$_SESSION['aut']=3;
		}
		else
		{
			$_SESSION['aut']=2;
			$_SESSION['err']="Invalid Data Entry";
		}
	}
	else
	{
	$_SESSION['aut']=2;
	$_SESSION['err']="Invalid Data Entry";
	}
	header("location:issuereturn.php");
}
?>