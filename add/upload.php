<?php
require 'DBconnect.php';
header('Access-Control-Allow-Origin:*');
$count = count($_FILES['file']['name']);
$error = $_FILES['file']['error'];

for ($i = 0; $i < $count; $i++) {
  if ($error[$i] === UPLOAD_ERR_OK){
    $tmp_name=$_FILES['file']['tmp_name'][$i];
    $file = fopen($tmp_name, "r+");
    $contents = fread($file,filesize($tmp_name));
    fclose($file);
    $contents = base64_encode($contents);
	
    $type=$_FILES['file']['type'][$i];
    $size=$_FILES['file']['size'][$i];
    $name=$_FILES['file']['name'][$i];
    $sizemb = round($size/1024000,2);


    if($sizemb > 10){
      echo "檔案太大了>///<";
    }else{
      try{
        $sql = "INSERT INTO frog(filepic,filename,filetype,filesize) VALUES('".$contents."','".$name."','".$type."','".$size."')";
        $pdo->exec($sql);
        echo "檔案:".$name."上傳成功</br>";
      }catch(PDOException $e){
        echo "檔案:".$name."上傳過惹</br>";
      }
    }
  }else{
	  echo $error;
    echo "圖片上傳失敗";
  }
}


?>
