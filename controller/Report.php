<?php
include "../config.php";
require "../Service/reportservice.php";

$type = $_POST["type"];
if ($type == "summarizeorder") {
    $date_start = $_POST["date_start"];
    $date_end = $_POST["date_end"];
    $company_id = $_POST["company_id"];
    $list = new reportservice();
    $listorder = $list->getsummarizeorder($date_start, $date_end, $company_id);
    $html = "";
    $html .= '<table class="table text-nowrap text-center" id="table_exportexcel">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>ลำดับ</th>';
    $html .= '<th>ชื่อสกุล</th>';
    $html .= '<th>รหัสสินค้า</th>';
    $html .= '<th>รหัสบาร์โค้ด</th>';
    $html .= '<th>ชื่อสินค้า</th>';
    $html .= '<th>material group</th>';
    $html .= '<th>ชื่อ material group</th>';
    $html .= '<th>จำนวนที่ขาย</th>';
    $html .= '<th>ต้นทุน</th>';
    $html .= '<th>ราคาขาย</th>';
    $html .= ' </tr>';
    $html .= ' </thead>';
    $html .= '<tbody id="data_exportexcel">';
    foreach ($listorder as $key => $order) {
        $html .= '<tr>';
        $html .= '<td>' . $key . '</td>';
        $html .= '<td>' . $order["customer_name"] . '</td>';
        $html .= '<td>' . $order["product_mat_no"] . '</td>';
        $html .= '<td>' . $order["product_mat_barcode"] . '</td>';
        $html .= '<td>' . $order["product_mat_name_th"] . '</td>';
        $html .= '<td>' . $order["material_group"] . '</td>';
        $html .= '<td>' . $order["material_name"] . '</td>';
        $html .= '<td>' . $order["product_qty"] . '</td>';
        $html .= '<td>' . $order["product_sale_price"] . '</td>';
        $html .= '<td>' . $order["product_sale_vat"] . '</td>';
        $html .= ' </tr>';
    }
    $html .= '</tbody>';
    $html .= '</table>';
    echo $html;
}
