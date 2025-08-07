<?php include_once "db.php";

$Stu->save($_POST);
//dd($_POST);
header("Content-Type: application/json;");
echo json_encode(['success'=>true]);