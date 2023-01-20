<?php
include "../config.php";
require "../Service/departmentservice.php";

$type = $_POST["type"];
if ($type == "getdepartment") {
    $arr = [];
    $key = new departmentservice();
    $a = $key->getdepartment();
    foreach ($a as $row) {
        array_push($arr, [$row->getdepartmentid(), $row->getdepartmentname(), $row->getcompany_id()]);
    }
    echo json_encode($arr);
} else if ($type == "adddepartment") {
    $department = $_POST["department"];
    $company = $_POST["company"];

    $key = new departmentservice();
    $a = $key->adddepartment($department, $company);

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
} else if ($type == "getdepartmentbycompanyid") {
    $id = $_POST["company_id"];
    $key = new departmentservice();
    $a = $key->getdepartmentbycompanyid($id);
    echo json_encode($a);
}
