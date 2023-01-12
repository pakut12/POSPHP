<?php
include "../config.php";
require "../Service/companyservice.php";

$type = $_POST["type"];
if ($type == "addCustoms") {
    $company = $_POST["company"];
    $key = new companyservice();
    $a = $key->addcompany($company);
    echo json_encode($a);
} 