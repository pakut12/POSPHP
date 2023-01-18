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
} else if ($type == "updateorderbyid") {
    $doc_id = $_POST["doc_id"];
    $customer_id = $_POST["customer_id"];
    $department_id = $_POST["department_id"];
    $company_id = $_POST["company_id"];

    $listcart = $_POST["listcart"];
    $listupdate = [];
    $listinsent = [];

    foreach ($listcart as $list) {
        if ($list["orderid"] == "new") {
            array_push($listinsent, $list);
        } else {
            array_push($listupdate, $list);
        }
    }

    $order = new orderservice();
    $statusorderupdate = $order->updateorderbyid($listupdate);
    $statusorderinsert = $order->insertorderbyid($listinsent, $doc_id, $customer_id, $department_id, $company_id);

    $status = array(
        "statusorderupdate" =>  $statusorderupdate,
        "statusorderinsert" =>  $statusorderinsert
    );
    echo json_encode($status);
} else if ($type == "delorderbyid") {
    $order_id = $_POST["orderid"];
    $order = new orderservice();
    $statusdel = $order->delorderbyid($order_id);
    echo json_encode(array("status" => $statusdel));
}
