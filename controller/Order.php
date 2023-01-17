<?php
include "../config.php";
require "../Service/orderservice.php";

$type = $_POST["type"];
if ($type == "getorder") {
    $order = new orderservice();
    $listorder = $order->getorder();
    echo json_encode($listorder);
} else if ($type == "delorder") {
    $doc_id = $_POST["doc_id"];
    $customer_id = $_POST["customer_id"];
    $order = new orderservice();
    $statusorder = $order->delorder($doc_id, $customer_id);
    echo json_encode($statusorder);
} else if ($type == "getorderbyid") {
    $doc_id = $_POST["doc_id"];
    $order = new orderservice();
    $listorder = $order->getorderbyid($doc_id);
    echo json_encode($listorder);
}
