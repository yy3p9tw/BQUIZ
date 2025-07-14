<?php include "./api/db.php";
unset($_POST['pw2']); //移除pw2欄位

echo $User->save($_POST); //將資料存入資料庫
?>