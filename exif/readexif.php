<?php
require("dbconnect.php"); //匯入連結資料庫之共用程式碼
$id=(int) $_REQUEST['id'];
$sql = "select * from frogphotos where id=$id;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message."); //執行SQL查詢

while (	$row=mysqli_fetch_array($result)) {
$sql2 = "select * from frogphotos where title=$row[2];";//row[2]是filepic
$result2=mysqli_query($conn,$sql);
$row2=mysqli_fetch_assoc($result2);
//開啟圖片檔
$file = fopen($_FILES["$row2"]["tmp_name"], "rb");
// 讀入圖片檔資料
$fileContents = fread($file, filesize($_FILES["$row2"]["tmp_name"])); 
//關閉圖片檔
fclose($file);
// 圖片檔案資料編碼
  $fileContents = base64_encode($id);
  //連結SQL Server
$dbnum=mysql_connect("photos","root","");
//選取資料庫
mysql_select_db("photos");
//組合查詢字串
        $SQLSTR="Insert into exif (resolution,
		camera,aperture,exposure,isoSpeed,focaLength,
		saturation,whiteBalance,phototime) values(
				'". $_FILES["upfile"]["resolution"] . "',
				'". $_FILES["upfile"]["camera"] . "',
				'". $_FILES["upfile"]["aperture"] . "',
				'". $_FILES["upfile"]["exposure"] . "',
				'". $_FILES["upfile"]["isoSpeed"] . "',
				'". $_FILES["upfile"]["focaLength"] . "',
				'". $_FILES["upfile"]["saturation"] . "',
				'". $_FILES["upfile"]["whiteBalance"] . "',
				'". $_FILES["upfile"]["phototime"] . "',
				  '". $fileContents . "')";

}?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>圖片檔案上傳</title>
</head><body><h3>圖檔存入相關資訊：<hr></h3>

<?php
    
	  echo "解析度：" . $_FILES["$row2"]["resolution"] . "<BR>";
	  echo "相機型號：" . $_FILES["$row2"]["camera"] . "<BR>";
	  echo "光圈孔徑：" . $_FILES["$row2"]["aperture"] . "<BR>";
	  echo "曝光時間：" . $_FILES["$row2"]["exposure"] . "<BR>";
	  echo "ISO速度：" . $_FILES["$row2"]["isoSpeed"] . "<BR>";
	  echo "焦距：" . $_FILES["$row2"]["focaLength"] . "<BR>";
	  echo "飽和度：" . $_FILES["$row2"]["saturation"] . "<BR>";
      echo "白平衡：" . $_FILES["$row2"]["whiteBalance"] . "<BR>";
	  echo "拍攝時間:" . $_FILES["$row2"]["phototime"] . "<BR>";

      if ( $_FILES["$row2"]["size"] > 0 ) 
        {
         //開啟圖片檔
         $file = fopen($_FILES["$row2"]["tmp_name"], "rb");
         // 讀入圖片檔資料
         $fileContents = fread($file, filesize($_FILES["$row2"]["tmp_name"])); 
         //關閉圖片檔
         fclose($file);

         // 圖片檔案資料編碼
         $fileContents = base64_encode($id);

         //連結SQL Server
         $dbnum=mysql_connect("photos","root","");
         //選取資料庫
         mysql_select_db("photos");
         //組合查詢字串
         $SQLSTR="Insert into exif (resolution,
		camera,aperture,exposure,isoSpeed,focaLength,
		saturation,whiteBalance,phototime) values('"
                  . $_FILES["$row2"]["resolution"] . "',
				'". $_FILES["$row2"]["camera"] . "',
				'". $_FILES["$row2"]["aperture"] . "',
				'". $_FILES["$row2"]["exposure"] . "',
				'". $_FILES["$row2"]["isoSpeed"] . "',
				'". $_FILES["$row2"]["focaLength"] . "',
				'". $_FILES["$row2"]["saturation"] . "',
				'". $_FILES["$row2"]["whiteBalance"] . "',
				'". $_FILES["$row2"]["phototime"] . "',
				  '". $fileContents . "')";
         //將圖片檔案資料寫入資料庫
         if(!mysql_query($SQLSTR)==0)
           {
            echo "您所上傳的檔案已儲存進入資料庫<a href=\"readexif.php?filename="
                 . $_FILES["$row2"]["name"] . "\">"
                 . $_FILES["$row2"]["name"] . "</a>";
           }
         else
           {
            echo "您所上傳的檔案無法儲存進入資料庫";
           } 
        }
      else
        {
         echo "圖片上傳失敗";
        }
      
?>

<hr></body></html>