<?php
include "../config.php";
require "../Service/docservice.php";

$type = $_POST["type"];
if ($type == "getdocid") {
    $docid = $_POST["docid"];
    $doc = new docservice();
    $listdoc = $doc->getdetailsdoc($docid);
    echo json_encode($listdoc);
}
