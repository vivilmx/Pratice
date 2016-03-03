<meta charset="utf-8">
<?php
include 'connect.php';
	session_start();
	$author=$_SESSION['username'];
	$videoName = $_GET['videoName'];
	$comment = $_POST['comment'];
	$path=basename($videoName,".mp4");
	
    $dbName = "video_".$path;
    echo $dbName;
    $sql="INSERT INTO ".$dbName." VALUES("."'".$comment."'".","."'".$author."'".")";
    $dbh->query($sql); 
    echo "<script>history.go(-1);</script>";    
?>