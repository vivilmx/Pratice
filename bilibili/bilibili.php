<?php 
	session_start(); 	
	include 'connect.php';

	$res = $dbh->query('SELECT * FROM image');
	$res->setFetchMode(PDO::FETCH_ASSOC);
	while($row=$res->fetch()){
	$rows[]=$row;
	}
?>

<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml/DTD/xhtml-transitional.dtd">
<html xmins="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type"contenr="text/html";charset="utf-8">
<link rel="stylesheet" type="text/css" href="bilibili.css">
</head>
<body>
 <div class="top">
 	<div class="register">
 		<div class="reg">
 			<span>
 				<i class="iconfont">&#xe60c</i>主站
 			</span>
 			<span>画友</span>
 			<span>游戏中心</span>
 			<span>直播</span>
 			<span>周边</span>
 			<span>日本游</span>
 		</div>
	<?php
		if (!isset($_SESSION['username'])) {
			?>
	 	<div class="deng">
 			<span><a href="denglu/denglu.html" 
 			>登录</span>
 			<span><a href="tougao/tougao.html">投稿</a> </span>
 			<span><a href="zhuce/zhuce.html">注册</a> </span>
 		</div>
			<?php
		}	
		else{
			?>
			<form action="logout.php" method="post" id="formA">
				<input type="submit" value="注销">
				<a href="member.php" target="_blank" >个人空间</a>
			</form>
			<div class="deng1">
 				<span><a href="tougao/upload.php">投稿</a> </span>
 		    </div>
			<?php
		}
	?>


 	</div>
 	<div class="search">
 		<div id="list">
 			<i class="iconfont">&#xe634</i>排行榜
 		</div>
 		<form id="search_one" action="search.php" method="post">
 			<input type="text" placeholder="拜年祭"
 			id="sea" name="search">
 			
 			<input type="submit" id="buttonS"
 			value="搜索">
 			<!--<i class="iconfont" id="sear">&#xe640</i>-->
 			</input>
 		</form>
 	</div>
 </div>
 <div class="nav">
 	<span>
 		<i class="iconfont">&#xe604</i>首页
 	</span>
 	<span>动画</span>
 	<span>音乐</span>
 	<span>番剧</span>
 	<span>舞蹈</span>
 	<span>游戏</span>
 	<span>科技</span>
 	<span>娱乐</span>
 	<span>鬼畜</span>
 	<span>电影</span>
 	<span>电视剧</span>
 	<span>时尚</span>
 	<span>
 		<i class="iconfont">&#xe65c</i>广场
 	</span>
 	<span>
 		<i class="iconfont">&#xe616</i>直播
 	</span>
 </div>
 <div class="content">
 	<div id="photo">
 		<div id="six">
 			<span id="circle1">
 				<i class="iconfont">&#xe602</i>
 			</span>
 			<span id="circle2">
 				<i class="iconfont">&#xe602</i>
 			</span>
 			<span id="circle3">
 				<i class="iconfont">&#xe602</i>
 			</span>
 			<span id="circle4">
 				<i class="iconfont">&#xe602</i>
 			</span>
 			<span id="circle5">
 				<i class="iconfont">&#xe602</i>
 			</span>
 			<span id="circle6">
 				<i class="iconfont">&#xe602</i>
 			</span>
 		</div>
 	</div>
 	<div class="video1">
 		<span id="tian">
 		<a href="video/video.html">
 		<p>天涯</p></a>
 		</span>
 		<span id="bai">
 		<p>白衣出江左</p></a>
 		</span>
 		<span id="si"><p>四月是你的谎言</p></span>
 	</div>
 	<div class="video2">
 		<span id="xi"><p>写给我第一个喜欢的女孩</p></span>
 		<span id="you"><p>由</p></span>
 		<span id="lei"><p>动漫催泪向</p></span>
 	</div>
 </div>
 <script type="text/javascript">
 	var round1=document.querySelector("#circle1");
 	var round2=document.querySelector("#circle2");
 	var round3=document.querySelector("#circle3");
 	var round4=document.querySelector("#circle4");
 	var round5=document.querySelector("#circle5");
 	var round6=document.querySelector("#circle6");
 	var backphoto=document.querySelector("#photo");
 	round1.addEventListener("mouseenter",function(){
 		backphoto.style.backgroundImage="url(1.jpg)";
 	})
 	round2.addEventListener("mouseenter",function(){
 		backphoto.style.backgroundImage="url(2.jpg)";
 	})
 	round3.addEventListener("mouseenter",function(){
 		backphoto.style.backgroundImage="url(3.jpg)";
 	})
 	round4.addEventListener("mouseenter",function(){
 		backphoto.style.backgroundImage="url(4.jpg)";
 	})
 	round5.addEventListener("mouseenter",function(){
 		backphoto.style.backgroundImage="url(5.jpg)";
 	})
 	round6.addEventListener("mouseenter",function(){
 		backphoto.style.backgroundImage="url(6.jpg)";
 	})
 	if (backphoto.style.backgroundImage="url(1.jpg)") {
 		backphoto.addEventListener("click",function(){
 			window.location="video/video.html";
 		})
 	}
 	</script>
 

    <div class="videoP">
 	<?php foreach ($rows as $row) :?>
	
		<div class="videoPHOTO">
			<a href="video/play.php?videoName=<?php echo $row['videoName'];?>&imageName=<?php echo $row['ImageName']?>&name=<?php echo $row['Name'];?>" target="_blank"
			><img src="jpg/<?php echo $row['ImageName']; ?>" class="img">
			<h3><?php echo $row['Name']; ?></h3>
			</a>
		</div>

	
	<?php endforeach ?>
    </div>
<?php 
	
	$res = $dbh->query('SELECT * FROM image WHERE type = "动漫"');
	$res->setFetchMode(PDO::FETCH_ASSOC);
	while($row=$res->fetch()){
	$rows[]=$row;
	}
?>
<div class="dongm">
<h1>动漫</h1> <br>
	<?php foreach ($rows as $row) :?>
	
		<div class="videoPHOTO">
			<a href="video/play.php?videoName=<?php echo $row['videoName'];?>&imageName=<?php echo $row['ImageName']?>&name=<?php echo $row['Name'];?>" target="_blank"
			><img src="jpg/<?php echo $row['ImageName']; ?>" class="img">
			<h3><?php echo $row['Name']; ?></h3>
			</a>
		</div>

	
	<?php endforeach ?></div>
</body>
</html>