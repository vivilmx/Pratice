<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>您的个人空间</title>
		<style type="text/css">
		body {
			padding: 0;
			margin: 0;
		}
		.top {
			float: left;
			width: 100%;
			height:700px;
			background:url(2333.jpg); 
			background-size: cover;
		}
		#hrA {
			float: left;
			width: 1050px;
			height: 30px;
			margin-left: 110px;
			line-height: 30px;
			color:#F25D8E;
			font-size: 20px;
			border-bottom: solid #000 2px; 
		}
		.content {
	        float: left;
	        width: 1050px;
	        height: 200px;
	        margin-top: 10px;
	        margin-left: 110px;
        }
        .Video {
			float: left;
			width: 150px;
			height: 115px;
			margin-right: 30px;
		}
		.Video > a >h3 {
			float: left;
			width: 150px;
			height: 30px;
			margin-top: 0;
			line-height: 30px;
			text-align: center;
			font-size: 20px;
		}
		.img {
			position: relative;
			float: left;
			width: 150px;
			height: 115px;
		}
		.box {
			float: left;
			width: 1050px;
			height: 400px;
			margin-top: 150px;
		}

	</style>
</head>
<body>
    <div class="top">
    <div class="box">
	<div id="hrA">您的投稿</div>
	<div class="content">
<?php 
	session_start(); 	
	include 'connect.php';
	$username = $_SESSION['username'];
	$sql = "SELECT * FROM image WHERE Author = '{$username}'";

	$res = $dbh->query($sql);
	$res->setFetchMode(PDO::FETCH_ASSOC);
	while($row=$res->fetch()){
	$rows[]=$row;
	?>
	<div class="Video">
			<a href="video/play.php?videoName=<?php echo $row['videoName'];?>&imageName=<?php echo $row['ImageName']?>&name=<?php echo $row['Name'];?>" target="_blank"
			><img src="jpg/<?php echo $row['ImageName']; ?>" class="img">
			<h3><?php echo $row['Name']; ?></h3>
			</a>
	</div>
	<?php
	}
?></div>
</div>
<div id="hrA">您的收藏</div>
	<div class="content">
<?php 
	 	
	include 'connect.php';
	$username = $_SESSION['username'];
	$dbName="user_".$username;
	$sql = "SELECT * FROM `$dbName`";

	$res = $dbh->query($sql);
	$res->setFetchMode(PDO::FETCH_ASSOC);
	while($row=$res->fetch()){
	$rows[]=$row;
	?>
	<div class="Video">
			<a href="video/play.php?videoName=<?php echo $row['videoName'];?>&imageName=<?php echo $row['imageName']?>&name=<?php echo $row['Collection'];?>" target="_blank"
			><img src="jpg/<?php echo $row['imageName']; ?>" class="img">
			<h3><?php echo $row['Collection']; ?></h3>
			</a>
	</div>
	<?php
	}
?>
</div>
</div>
</div>
</body>
</html>