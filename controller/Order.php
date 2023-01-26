<?php
include "../config.php";
require "../Service/orderservice.php";

$type = $_POST["type"];
if ($type == "getorder") {

    $company_id = $_POST["company_id"];
    $date_start = $_POST["date_start"];
    $date_end = $_POST["date_end"];

    $order = new orderservice();
    $listorder = $order->getorder($date_start, $date_end, $company_id);
    $html = "";
    if (count($listorder) > 0) {

        $html .= '<table class="table text-nowrap" id="table_order">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>No</th>';
        $html .= '<th>DocID</th>';
        $html .= '<th>CustomerCode</th>';
        $html .= '<th>Name</th>';
        $html .= '<th>Company</th>';
        $html .= '<th>Department</th>';
        $html .= '<th>Date</th>';
        $html .= '<th>Detail</th>';
        $html .= '<th>Print</th>';
        $html .= '<th>Del</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody id="data_order">';
        foreach ($listorder as $key => $order) {
            $html .= '<tr>';
            $html .= '<td>' . ($key + 1) . '</td>';
            $html .= '<td>' . $order["doc_id"] . '</td>';
            $html .= '<td>' . $order["customer_code"] . '</td>';
            $html .= '<td>' . $order["customer_prefix"] . ' ' . $order["customer_firstname"] . ' ' . $order["customer_lastname"] . '</td>';
            $html .= '<td>' . $order["company_name"] . '</td>';
            $html .= '<td>' . $order["department_name"] . '</td>';
            $html .= '<td>' . $order["date_create"] . '</td>';
            $html .= "<td><button type='button' class='btn btn-sm btn-warning' onclick='editorder(" . $order["doc_id"] . "," . $order["customer_id"] . ")'>ดูรายละเอียด</button></td>";
            $html .= "<td><button type='button' class='btn btn-sm btn-primary' onclick='printout(" . $order["doc_id"] . ")'>พิมพ์</button></td>";
            $html .= "<td><button type='button' class='btn btn-sm btn-danger' onclick='delorder(" . $order["doc_id"] . "," . $order["customer_id"] . ")'>ลบ</button></td>";
            $html .= "</tr>";
        }
        $html .= '</tbody>';
        $html .= '</table>';
    }

    echo $html;

    
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
        if ($list["orderid"] == '"new"') {
            array_push($listinsent, $list);
        } else {
            array_push($listupdate, $list);
        }
    }

    $order = new orderservice();
    $statusorderupdate = $order->updateorderbyid($listupdate);
    $statusorderinsert = $order->insertorderbyid($listinsent, $doc_id, $customer_id, $department_id, $company_id);

    if ($statusorderupdate && count($listupdate) > 0 && $statusorderinsert && count($listinsent) > 0) {
        $status = array(
            "status" => "true"
        );
    } else if ($statusorderupdate && count($listupdate) > 0  && !$statusorderinsert &&  count($listinsent) == 0) {
        $status = array(
            "status" => "true"
        );
    } else {
        $status = array(
            "status" => "false"
        );
    }
    echo json_encode($status);
} else if ($type == "delorderbyid") {
    $order_id = $_POST["orderid"];
    $order = new orderservice();
    $statusdel = $order->delorderbyid($order_id);
    echo json_encode(array("status" => $statusdel));
}
