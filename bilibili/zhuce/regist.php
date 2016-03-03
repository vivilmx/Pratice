<meta charset="UTF-8">
<?php
	include '../connect.php';
	session_start();
	$yzm=$_POST['yzm_code'];
	$name=$_POST['name'];
	$password=md5($_POST['password']);
	$re_password=md5($_POST['re_password']);
	$nickname=$_POST['nickname'];

	if ($yzm!=$_SESSION['yzm_code']) {
		die("<script>alert('验证码错误！！');history.go(-1);</script>");
	}
    if ($password!=$re_password) {
		die("<script>alert('2次密码不同！！');history.go(-1);</script>");
	}

	$sql_name="SELECT * FROM consumer WHERE name='$name'";
	$res_name=$dbh->query($sql_name);
	$row_name=$res_name->fetchAll();

	$sql_nickname="SELECT * FROM consumer WHERE nickname='$nickname'";
	$res_nickname=$dbh->query($sql_nickname);
	$row_nickname=$res_name->fetchAll();

	if($row_name){
		die("<script>alert('该账号已经被注册！！');history.go(-1);</script>");
	}

	elseif ($row_nickname) {
		die("<script>alert('该昵称已经被使用！！');history.go(-1);</script>");
	}
	else{
		$dbh-> query("INSERT INTO consumer(name,password,nickname)
		VALUES('$name','$password','$nickname')");
		
            $dbName = "user_".$name;
            $sql="CREATE TABLE ".$dbName." (Collection VARCHAR(255),imageName VARCHAR(255), videoName VARCHAR(255))";
       
            $dbh->query($sql);
		if($dbh)
			die("<script>alert('注册成功！！');history.go(-2);</script>");
		
    }
?>