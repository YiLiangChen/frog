<?php
require'DBconnect.php';
header('Access-Control-Allow-Origin:*');

$act = $_REQUEST['act'];

switch($act){
	case 'delete':
    try{
		$id=(int)$_POST['id'];
        $sql="DELETE FROM frogphotos WHERE id=$id";
        $pdo->exec($sql);
		echo "已刪除";
		return "成功";
    }catch(PDOException $e){
        echo "刪除失敗";
		return "失敗";
    }
    case 'edit':
    try{
		$id=(int)$_POST['id'];
		$filename=$_POST['filename'];
        $textName=$_POST['textName'];
        $textIntroduce=$_POST['textIntroduce'];   
	    $sql = "update frogphotos set filename='$filename', textName='$textName', textIntroduce='$textIntroduce' where id=$id;";
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
	
	

}
?>