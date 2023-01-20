<?php
include "../config.php";
require "../Service/reportservice.php";

$type = $_POST["type"];
if ($type == "summarizeorder") {
    $date_start = $_POST["date_start"];
    $date_end = $_POST["date_end"];
    $company_id = $_POST["company_id"];
    $list = new reportservice();
    $listorder = $list->getsummarizeorder($date_start, $date_end,$company_id);
    echo json_encode($listorder);
}
