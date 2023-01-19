<?php
include "../config.php";
require "../Service/materialservice.php";

$type = $_POST["type"];
if ($type == "addmaterial") {
    $material_group = $_POST["material_group"];
    $material_name = $_POST["material_name"];

    $materialservice = new materialservice();
    $listmaterial = $materialservice->addmaterial($material_group, $material_name);

    if ($listmaterial) {
        $status = array("status" => "true");
    } else {
        $status = array("status" => "false");
    }
    echo json_encode($status);
} else if ($type == "getmaterial") {
    $materialservice = new materialservice();
    $listmaterial = $materialservice->getmaterial();

    echo json_encode($listmaterial);
} else if ($type == "delmaterial") {
    $material_id = $_POST["material_id"];
    $materialservice = new materialservice();
    $listmaterial = $materialservice->delmaterial($material_id);
    if ($listmaterial) {
        $status = array("status" => "true");
    } else {
        $status = array("status" => "false");
    }
    echo json_encode($status);
} else if ($type == "updatematerial") {
    $material_id = $_POST["material_id"];
    $material_name = $_POST["material_name"];
    $material_group = $_POST["material_group"];
    $materialservice = new materialservice();
    $listmaterial = $materialservice->updatematerial($material_id, $material_name, $material_group);
    if ($listmaterial) {
        $status = array("status" => "true");
    } else {
        $status = array("status" => "false");
    }
    echo json_encode($status);
}
