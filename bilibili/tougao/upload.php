<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
	<title>投稿</title>
	<style type="text/css">
	body {
	    	margin: 0;
	    	padding: 0;
	    }
	    #top {
	    	float: left;
	    	width: 100%;
	    	height: 200px;
	    	background-size: cover;
	    	background-image: url(2233333.jpg);
	    }
	#check{
		margin-top: 2px;
		margin-left: 2px;
	}
	#content {
		float: left;
		width: 1050px;
		height: 300px;
		margin-left: 110px;
		margin-top: 10px;
	}
	</style>
</head>
<body>
<div id="top"></div>	
<?php
	session_start();
	if (!isset($_SESSION['username'])) {
		$referer = "login.html";
		echo "<script>alert('请先登录！！');document.location.href='$referer'</script>";
	}
?>
	<form action="upload_file.php" method="post" enctype="multipart/form-data" id="content">
		给你的视频安个封面吧!<br>
		<input type="file" name="cover"></input><hr/>
		<input type="file" name="video"></input>
		<input type="text" name="Name" placeholder="视频名称"></input>
		选择视频分类
		<select name="type">
			<option>动漫</option>
			<option>二次元</option>
		</select>
		<input type="submit" name="submit" value="Submit" /><br>
	</form>
</body>
</html>