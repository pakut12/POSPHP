<?php
include "../config.php";
require "../Service/customerservice.php";
require "../Service/orderservice.php";
require "../Service/docservice.php";

$type = $_POST["type"];

if ($type == "addcustomer") {
    $cart = $_POST["listcart"];
    $customer = $_POST["listcustomer"];
    $customerservice = new customerservice();
    $orderservice = new orderservice();
    $docservice = new docservice();

    $customerresult = $customerservice->addcustomer($customer);
    $docresult = $docservice->adddoc();
    $orderresult = $orderservice->addorder($customerresult, $customer, $cart, $docresult);

    if ($orderresult["status"]) {
        $arr = array(
            "status" => "true",
            "doc_id" => $orderresult["keydoc"]
        );
    } else {
        $arr = array(
            "status" => "false",
            "doc_id" => $orderresult["keydoc"]
        );
    }
    echo json_encode($arr);
}
