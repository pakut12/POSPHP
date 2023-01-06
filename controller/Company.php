<?php
include "../config.php";
require "../Service/companyservice.php";


$type = $_POST["type"];
if ($type == "addcompany") {
    $company = $_POST["company"];
    $key = new companyservice();
    $a = $key->addcompany($company);
    var_dump($a);
} else if ($type == "getcompany") {
    $key = new companyservice();
    $a = $key->getcompany();
    foreach ($a as $row) {
        $arr[] = [$row->getCompanyid(), $row->getCompanyName()];
    }
    echo json_encode($arr);
}
