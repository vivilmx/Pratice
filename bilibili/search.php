<?php
	include 'connect.php';
	$input=$_POST['search'];
	$sql="SELECT  * FROM image WHERE Name LIKE '%$input%'  OR type LIKE '%$input%' OR id = '$input'";
	$res=$dbh->query($sql);
	$res->setFetchMode(PDO::FETCH_ASSOC);
	while($row=$res->fetch()){
	$rows[]=$row;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>搜索结果</title>
		<style type="text/css">
		body {margin: 0;padding: 0;}
		.top {
			width: 100%;
			height: 200px;
			float: left;
			background:url(back.jpeg);
		}
		.content {
	        float: left;
	        width: 1050px;
	        height: 200px;
	        margin-top: 30px;
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
			float: left;
			width: 150px;
			height: 115px;
		}
	</style>
</head>
<body>
    <div class="top"></div>
    <div class="content">
	
		<?php foreach ($rows as $row) :?>
			<div class="Video">
				<a href="video/play.php?name=<?php echo $row['videoName'];?>" target="_blank"
				><img src="jpg/<?php echo $row['ImageName']; ?>" class="img">
				<h3><?php echo $row['Name']; ?></h3>
				</a>
			</div>
		<?php endforeach ?>
	


	</div>
</body>
</html>