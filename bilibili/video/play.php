<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>播放</title>
	<style type="text/css">
	    body {
	    	margin: 0;
	    	padding: 0;
	    }
	    .top {
	    	float: left;
	    	width: 100%;
	    	height: 600px;
	    	background-size: cover;
	    	background-image: url(2233333.jpg);
	    }
		.img{
			width: 300px;
			height: 200px;
			}
		#example_video_1 {
			float: left;
			margin-top: 100px;
			margin-left: 210px;
		}
		#box {
			float: left;
			width: 174px;
			height: 364px;
			margin-top: 100px;
			border-radius: 5px;
			background-color: #fff;
			opacity: 0.8;
		}
		#textB {
			float: left;
			width: 170px;
			height: 30px;
			border-radius: 5px;
			border:solid 2px pink;
		}
		#Coll {
			float: left;
			width: 100px;
			height: 20px;
			border-radius: 6px;
			background-color: pink;
		}
		
    	
	</style>
	<link href="video-js.css" rel="stylesheet" type="text/css">
	<script src="video.js"></script>
</head>
<body>
   <div class="top">
   <script>
    videojs.options.flash.swf = "video-js.swf";
   </script>
   <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="364" 
      poster="http://video-js.zencoder.com/oceans-clip.png"
      data-setup="{}">

    <source src="<?php echo $_GET['videoName'] ?>" type='video/mp4' />
    <track kind="captions" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
    <track kind="subtitles" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
   </video>
   <div id="box">
<?php	
	session_start();
	if (!isset($_SESSION['username'])) {
		?>
			<h3>登入后才能写评论</h3>
			<a href="../denglu/login.html">登入</a>
		<?php
	}	
	else{
		?>
			<form action="../comment.php?videoName=<?php echo $_GET['videoName'];?>" method="post">
				<input type="text" name="comment" placeholder="输入评论" id="textB"></input>
				<input type="submit" id="button1"></input>
			</form>
		<?php
		}
?>



<?php 
 
	include '../connect.php';
	$path=basename($_GET['videoName'],".mp4");
    $dbName = "video_".$path;
    
    $sql="SELECT * FROM `$dbName`";
	$res = $dbh->query($sql);
	$res->setFetchMode(PDO::FETCH_ASSOC);	
	while($row=$res->fetch()){
		$rows[]=$row;
		?>
		<div class="div">
		<?php echo $row['Author'].":".$row['Comment']."<br>"; ?>
		</div>
	<?php
	}
?>	
<?php
	if (isset($_SESSION['username'])) {
		?>
		<form action="../collect.php" method="post" >
		<input type="submit" value="收藏"id="Coll"></input>
		</form>
		<?php
			$_SESSION['imageName'] = $_GET['imageName']; 
			$_SESSION['videoName'] = $_GET['videoName'];
			$_SESSION['name'] = $_GET['name'];
		?>
		<?php
	}	
	else{
		echo "登入后才能收藏";	
	}
?>
</div>
</div>

</body>
</html>