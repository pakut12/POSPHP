<?php
include "../config.php";
require "../Service/orderservice.php";

$type = $_POST["type"];
if ($type == "getorder") {
    $order = new orderservice();
    $listorder = $order->getorder();
    echo json_encode($listorder);
}
