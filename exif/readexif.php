<?php
require("dbconnect.php"); //匯入連結資料庫之共用程式碼
$id=(int)$_REQUEST['id'];
$sql = "select * from frogphotos where id=$id;"; //預設post進來的是id
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message."); //執行SQL查詢
?>
<?php
$result2=mysqli_query($conn,$sql);
//開啟圖片檔
$file = fopen($_FILES["upfile"]["tmp_name"], "rb");
// 讀入圖片檔資料
$fileContents = fread($file, filesize($_FILES["upfile"]["tmp_name"])); 
//關閉圖片檔
fclose($file);
// 圖片檔案資料編碼
  $fileContents = base64_encode($id);
  //連結SQL Server
$dbnum=mysqli_connect("photos","root","");
//選取資料庫
mssql_select_db("photos");
//組合查詢字串
        $SQLSTR="Insert into myimage (resolution,
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
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>圖片檔案上傳</title>
</head><body><h3>圖檔存入相關資訊：<hr></h3>

<?
    
	  echo "解析度：" . $_FILES["upfile"]["resolution"] . "<BR>";
	  echo "相機型號：" . $_FILES["upfile"]["camera"] . "<BR>";
	  echo "光圈孔徑：" . $_FILES["upfile"]["aperture"] . "<BR>";
	  echo "曝光時間：" . $_FILES["upfile"]["exposure"] . "<BR>";
	  echo "ISO速度：" . $_FILES["upfile"]["isoSpeed"] . "<BR>";
	  echo "焦距：" . $_FILES["upfile"]["focaLength"] . "<BR>";
	  echo "飽和度：" . $_FILES["upfile"]["saturation"] . "<BR>";
      echo "白平衡：" . $_FILES["upfile"]["whiteBalance"] . "<BR>";
	  echo "拍攝時間" . $_FILES["upfile"]["phototime"] . "<BR>";

      if ( $_FILES["upfile"]["size"] > 0 ) 
        {
         //開啟圖片檔
         $file = fopen($_FILES["upfile"]["tmp_name"], "rb");
         // 讀入圖片檔資料
         $fileContents = fread($file, filesize($_FILES["upfile"]["tmp_name"])); 
         //關閉圖片檔
         fclose($file);

         // 圖片檔案資料編碼
         $fileContents = base64_encode($id);

         //連結SQL Server
         $dbnum=mssql_connect("photos","root","");
         //選取資料庫
         mssql_select_db("photos");
         //組合查詢字串
         $SQLSTR="Insert into myimage (resolution,
		camera,aperture,exposure,isoSpeed,focaLength,
		saturation,whiteBalance,phototime) values('"
                  . $_FILES["upfile"]["resolution"] . "',
				'". $_FILES["upfile"]["camera"] . "',
				'". $_FILES["upfile"]["aperture"] . "',
				'". $_FILES["upfile"]["exposure"] . "',
				'". $_FILES["upfile"]["isoSpeed"] . "',
				'". $_FILES["upfile"]["focaLength"] . "',
				'". $_FILES["upfile"]["saturation"] . "',
				'". $_FILES["upfile"]["whiteBalance"] . "',
				'". $_FILES["upfile"]["phototime"] . "',
				  '". $fileContents . "')";
         //將圖片檔案資料寫入資料庫
         if(!mssql_query($SQLSTR)==0)
           {
            echo "您所上傳的檔案已儲存進入資料庫<a href=\"readexif.php?filename="
                 . $_FILES["upfile"]["name"] . "\">"
                 . $_FILES["upfile"]["name"] . "</a>";
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
