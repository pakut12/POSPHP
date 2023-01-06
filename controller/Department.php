<?php
include "../config.php";
require "../Service/departmentservice.php";

$type = $_POST["type"];
if ($type == "getdepartment") {
    $key = new departmentservice();
    $a = $key->getdepartment();
    foreach ($a as $row) {
        $arr[] = [$row->getdepartmentid(), $row->getdepartmentname()];
    }
    echo json_encode($arr);
} else if ($type == "adddepartment") {
    $department = $_POST["department"];
    $key = new departmentservice();
    $a = $key->adddepartment($department);
    
    echo json_encode($arr);
}
