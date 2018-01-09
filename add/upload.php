<?php
require 'DBconnect.php';
header('Access-Control-Allow-Origin:*');
$count = count($_FILES['file']['name']);
$error = $_FILES['file']['error'];


for ($i = 0; $i < $count; $i++) {
  if ($error[$i] === UPLOAD_ERR_OK){
    $tmp_name=$_FILES['file']['tmp_name'][$i];
    $type=$_FILES['file']['type'][$i];
    if($type == "image/jpeg" || $type == "image/jpg"){
      $file = fopen($tmp_name, "r+");
      $exif = exif_read_data($tmp_name);
      $contents = fread($file,filesize($tmp_name));
      fclose($file);
      $contents = base64_encode($contents);

      $size=$_FILES['file']['size'][$i];
      $name=$_FILES['file']['name'][$i];
      if(isset($_POST['filename'])){
        $textName = $_POST['filename'];
      }else{
        $textName = $name;
      }
      if(isset($_POST['introduce'])){
        $textIntroduce = $_POST['introduce'];
      }else{
        $textIntroduce = "沒有介紹QQ";
      }

      $sizemb = round($size/1024000,2);

      if(isset($exif['ResolutionUnit'])){
        if (array_key_exists('DateTime', $exif)) {
          $DateTime = $exif['DateTime'];
        }else{
          $DateTime = "Unknown";
        }
        if (array_key_exists('ResolutionUnit', $exif)) {
          $ResolutionUnit = $exif['ResolutionUnit'];
        }else{
          $ResolutionUnit = "Unknown";
        }
        if (array_key_exists('Model', $exif)) {
          $Model = $exif['Model'];
        }else{
          $Model = "Unknown";
        }
        if (array_key_exists('ApertureFNumber', $exif)) {
          $ApertureFNumber = $exif['COMPUTED']['ApertureFNumber'];
        }else{
          $ApertureFNumber = "Unknown";
        }
        if (array_key_exists('ExposureTime', $exif)) {
          $ExposureTime = $exif['ExposureTime'];
        }else{
          $ExposureTime = "Unknown";
        }
        if (array_key_exists('ISOSpeedRatings', $exif)) {
          $ISOSpeedRatings = $exif['ISOSpeedRatings'];
        }else{
          $ISOSpeedRatings = "Unknown";
        }
        if (array_key_exists('FocalLengthIn35mmFilm', $exif)) {
          $FocalLengthIn35mmFilm = $exif['FocalLengthIn35mmFilm'];
        }else{
          $FocalLengthIn35mmFilm = "Unknown";
        }
        if (array_key_exists('Saturation', $exif)) {
          $Saturation = $exif['Saturation'];
        }else{
          $Saturation = "Unknown";
        }
        if (array_key_exists('WhiteBalance', $exif)) {
          $WhiteBalance = $exif['WhiteBalance'];
        }else{
          $WhiteBalance = "Unknown";
        }
      }else{
        echo "EXIF Unknown";
        $DateTime = "Unknown";
        $ResolutionUnit = "Unknown";
        $Model = "Unknown";
        $ApertureFNumber = "Unknown";
        $ExposureTime = "Unknown";
        $ISOSpeedRatings = "Unknown";
        $FocalLengthIn35mmFilm = "Unknown";
        $Saturation = "Unknown";
        $WhiteBalance = "Unknown";
      }

      if($sizemb > 5){
        echo "檔案太大了>///<";
      }else{
        try{
          $sql = "INSERT INTO frogphotos(filepic,filename,filetype,filesize,textName,textIntroduce) VALUES('".$contents."','".$name."','".$type."','".$size."','".$textName."','".$textIntroduce."')";
          $pdo->exec($sql);
          $sql2 = "INSERT INTO exif(photoTime,resolution,camera,aperture,exposure,isoSpeed,focalLength,saturation,whiteBalance)
          VALUES('".$DateTime."','".$ResolutionUnit."','".$Model."','".$ApertureFNumber."','".$ExposureTime."','".$ISOSpeedRatings."','".$FocalLengthIn35mmFilm."','".$Saturation."','".$WhiteBalance."')" ;
          $pdo->exec($sql2);
          echo "檔案:".$name."上傳成功";
        }catch(PDOException $e){
          echo "檔案:".$name."上傳過惹";
        }
      }
    }else{
      echo "檔案不對喔";
    }
  }else{
    echo $e;
    echo "圖片上傳失敗";
  }
}
?>
