<?php
include "../config.php";
require "../Service/companyservice.php";

$type = $_POST["type"];
if ($type == "addcompany") {
    
    $key = new companyservice();
    $a = $key->addcompany($company);
    echo json_encode($a);
}
