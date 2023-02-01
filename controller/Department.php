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
} else if ($type == "getdepartment") {
    $arr = [];
    $key = new departmentservice();
    $a = $key->getdepartment();
    foreach ($a as $row) {
        array_push($arr, [$row->getdepartmentid(), $row->getdepartmentname(), $row->getcompany_id()]);
    }
    echo json_encode($arr);
} else if ($type == "gettabledepartment") {
    $key = new departmentservice();
    $a = $key->getdepartment();
    $html = "";
    $html .= '<table class="table text-nowrap text-center" id="table_department">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>No</th>';
    $html .= '<th>DepartmentID</th>';
    $html .= '<th>DepartmentName</th>';
    $html .= '<th>Company</th>';
    $html .= '<th>Edit</th>';
    $html .= '<th>Del</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody id="data_department">';
    foreach ($a as $key => $department) {
        $html .= '<tr>';
        $html .= '<td>' . ($key + 1) . '</td>';
        $html .= '<td>' . $department->getdepartmentid() . '</td>';
        $html .= '<td>' . $department->getdepartmentname() . '</td>';
        $html .= '<td>' . $department->getcompany_id() . '</td>';
        $html .= '<td><button type="button" onclick="editdepartment(' . $department->getdepartmentid() . ');" class="btn btn-warning btn-sm">เเก้ไข</button></td>';
        $html .= '<td><button type="button" onclick="deldepartment(' . $department->getdepartmentid() . ');" class="btn btn-danger btn-sm">ลบ</button></td>';
        $html .= '</tr>';
    }
    $html .= '</tbody>';
    $html .= '</table>';
    echo $html;
} else if ($type == "uploaddepartment") {
    $file = $_FILES["uploaddepartment_file"];
    $company = $_POST["uploaddepartment__companyname"];

    $key = new departmentservice();
    $list = $key->uploadfile($file);
    $readexcel = $key->readexcel($list, $company);
    $sql = $key->generateSQLText($readexcel, $company);
    $uploaddepartmant = $key->uploaddepartment($sql);
    $status = array("status" => $uploaddepartmant);

    echo json_encode($status);
}
