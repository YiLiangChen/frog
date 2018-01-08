<?php
require("dbconnect.php"); //匯入連結資料庫之共用程式碼
$id=(int) $_REQUEST['id'];
$sql = "select * from frogphotos where id=$id;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message."); //執行SQL查詢

while (	$row=mysqli_fetch_array($result)) {
$sql2 = "select * from frogphotos where title=$row[2];";//row[2]是filepic
$result2=mysqli_query($conn,$sql);
$row2=mysqli_fetch_assoc($result2);

$exif = exif_read_data('$row2', 0, true);
echo "顯示照片exif資訊如下: </br>";
foreach ($exif as $key => $section) {
foreach ($section as $name => $val) {
echo "$key.$name: $val </br>";
}
}
}
?>