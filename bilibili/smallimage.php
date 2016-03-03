<?php
	session_start();
	$dst_w=50;
	$dst_h=50;
	$src_w=$_SESSION['width'];
	$src_h=$_SESSION['height'];
	$dst_image=imagecreate($dst_w, $dst_h);
	ob_clean();
	if ($_SESSION['type']=="image/jpeg") 
	{
		$src_image=imagecreatefromjpeg("jpg/". $_SESSION['name']);
		header("content-type:image/jpeg");
		imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
		imagejpeg($dst_image);
	}
	else if($_SESSION['type']=="image/png")
	{
		$src_image=imagecreatefrompng("png/". $_SESSION['name']);
		header("content-type:image/png");
		imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
		imagepng($dst_image);
	}
	else 
	{
		$src_image=imagecreatefrompng("gif/". $_SESSION['name']);
		header("content-type:image/gif");
		imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
		imagegif($dst_image);
	}
	
	
	
	

	imagedestroy($dst_image);
?>