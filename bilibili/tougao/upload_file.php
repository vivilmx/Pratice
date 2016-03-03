<meta charset="UTF-8">
<?php
  include '../connect.php';
  session_start();

  $userName=$_SESSION['username'];
  $imageName=$_FILES["cover"]["name"];
  $videoName=$_FILES["video"]["name"];
  $Name=$_POST['Name'];
  $type=$_POST['type'];

  if($_FILES["cover"]["error"]>0||$_FILES["video"]["error"]>0){
      echo "Return Code: " . $_FILES["cover"]["error"] . "<br/>";
   		echo "Return Code: " . $_FILES["video"]["error"] . "<br/>";
  }
  else
  {
     	if($_FILES["cover"]["type"]=="image/jpeg")
        	{
            $dbh-> query("INSERT INTO image(ImageName,Author,Name,videoName,type)
            VALUES('$imageName','$userName','$Name','$videoName','$type')");
            move_uploaded_file($_FILES["cover"]["tmp_name"],"../jpg/". $imageName);
          	move_uploaded_file($_FILES["video"]["tmp_name"],"../video/". $videoName);
        	
                
            $path=basename($videoName,".mp4");
            $dbName = "video_".$path;
            $sql="CREATE TABLE ".$dbName." (Comment VARCHAR(255),Author VARCHAR(255))";
                echo $sql;     
            $dbh->query($sql);     
    
          }
	}  
?>



