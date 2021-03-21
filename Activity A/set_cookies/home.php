<?php
	session_start();
	if($_SESSION['logged']) {
		echo "<h1>Welcome ".$_SESSION['username']."</h1>";
		echo "<a href='logout.php'>logout</a>";
	} 
	else {
		header("location: protected.php");
	}
	
?>