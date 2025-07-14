<?php include_once "./api/db.php";
$chk =$User->count(['acc'=>$_GET['acc']]);
if($chk){
    echo 1; //帳號已存在
}else{
    echo 0; //帳號可用
}
?>