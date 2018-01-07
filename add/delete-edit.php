<?php
require'DBconnect.php';
header('Access-Control-Allow-Origin:*');

$act = $_REQUEST['act'];

switch($act){
    case 'delete':
    try{
		$id=(int)$_REQUEST['id'];
        $sql="delete from frogphotos where id=$id;";
        $pdo->exec($sql);
        echo "刪除成功";
    }catch(PDOException $e){
        echo "刪除失敗";
    }

    case 'edit':
    try{
		$id=(int)$_REQUEST['id'];
		$filename=$_REQUEST['filename'];
        $textName=$_REQUEST['textName'];
        $textIntroduce=$_REQUEST['textIntroduce'];   
	    $sql = "update frogdata set filename='$filename', textName='$textName', textIntroduce='$textIntroduce' where id=$id;";
		$pdo->exec($sql);
		echo"修改完成嘞~";
		
        $sql2 = "SELECT filename,textName,textIntroduce,id FROM frogphotos";
        $stmt = $pdo->prepare($sql2);
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }catch (PDOException $e) {
        echo "爆了，重打一次吧";
  }
)
?>