<?php
 	session_start();
 	include 'connect.php';
	$username = $_SESSION['username'];
	$videoName = $_SESSION['videoName'];
	$imageName = $_SESSION['imageName'];
	$name = $_SESSION['name'];
	$dbName="user_".$username;
	$sql = "INSERT INTO `$dbName` VALUES('{$name}','{$imageName}','{$videoName}')";
	$dbh->query($sql);
	echo "<script>alert('收藏成功！！');history.go(-1);</script>"
?>