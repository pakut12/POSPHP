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

    echo json_encode($a);
} else if ($type == "getdepartmentbyid") {
    $id = $_POST["department_id"];
    $key = new departmentservice();
    $a = $key->getdepartmentbyid($id);
    foreach ($a as $row) {
        $arr[] = [$row->getdepartmentid(), $row->getdepartmentname()];
    }
    echo json_encode($arr);
} else if ($type == "updatedepartment") {
    $id = $_POST["department_id"];
    $name = $_POST["department_name"];
    $key = new departmentservice();
    $a = $key->updatedepartment($id, $name);

    echo json_encode($a);
} else if ($type == "deldepartment") {
    $id = $_POST["department_id"];
    $key = new departmentservice();
    $a = $key->deldepartment($id);

    echo json_encode($a);
}
