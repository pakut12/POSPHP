<?php
include "../config.php";
require "../Service/companyservice.php";


$type = $_POST["type"];
if ($type == "addcompany") {
    $company = $_POST["company"];
    $key = new companyservice();
    $a = $key->addcompany($company);
    echo json_encode($a);
} else if ($type == "getcompany") {
    $key = new companyservice();
    $a = $key->getcompany();
    $arr = [];
    foreach ($a as $row) {
        array_push($arr, [$row->getCompanyid(), $row->getCompanyName()]);
    }
    echo json_encode($arr);
} else if ($type == "delcompany") {
    $id = $_POST["company_id"];
    $key = new companyservice();
    $a = $key->delcompany($id);

    echo json_encode($a);
} else if ($type == "getcompanybyid") {
    $id = $_POST["company_id"];
    $key = new companyservice();
    $a = $key->getcompanybyid($id);
    foreach ($a as $row) {
        $arr[] = [$row->getCompanyid(), $row->getCompanyName()];
    }
    echo json_encode($arr);
} else if ($type == "updatecompany") {
    $id = $_POST["company_id"];
    $company = $_POST["company_name"];
    $key = new companyservice();
    $a = $key->updatecompany($id, $company);
    echo json_encode($a);
}
