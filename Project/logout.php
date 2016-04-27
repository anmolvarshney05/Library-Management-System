<?php
	include "session.php";
	unset($_SESSION);
	session_destroy();
	header("location:index.php");
?>