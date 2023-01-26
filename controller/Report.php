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
    $html .= '<table class="table text-nowrap text-center w-100" id="table_exportexcel">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>ลำดับ</th>';
    $html .= '<th>เลขที่ออเดอร์</th>';
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
        $html .= '<td>' . ($key + 1) . '</td>';
        $html .= '<td>' . $order["order_id"] . '</td>';
        $html .= '<td><b>รหัสพนักงาน : </b>' . $order["customer_code"] . '<br><b>ชื่อพนักงาน : </b>' . $order["customer_name"] . '<br><b>บริษัท : </b>' . $order["company_name"] . '<br><b>เเผนก : </b>' . $order["department_name"] . '<br></td>';
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
} else if ($type == "summarizeordercustomer") {
    $date_start = $_POST["date_start"];
    $date_end = $_POST["date_end"];
    $company_id = $_POST["company_id"];
    $list = new reportservice();
    $listorder = $list->getsummarizeordercustomer($date_start, $date_end, $company_id);
    $html = "";
    $html .= '<table class="table text-nowrap text-center w-100" id="table_customer">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>ลำดับ</th>';
    $html .= '<th>รหัสพนักงาน</th>';
    $html .= '<th>ชื่อสกุล</th>';
    $html .= '<th>บริษัท</th>';
    $html .= '<th>เเผนก</th>';
    $html .= '<th>จำนวนที่ขาย</th>';
    $html .= '<th>วันที่</th>';
    $html .= ' </tr>';
    $html .= ' </thead>';
    $html .= '<tbody id="data_exportexcel">';
    foreach ($listorder as $key => $order) {
        $html .= '<tr>';
        $html .= '<td>' . ($key + 1) . '</td>';
        $html .= '<td>' . $order["customer_code"] . '</td>';
        $html .= '<td>' . $order["customer_name"] . '</td>';
        $html .= '<td>' . $order["company_name"] . '</td>';
        $html .= '<td>' . $order["department_name"] . '</td>';
        $html .= '<td>' . $order["SUM(b.product_qty)"] . '</td>';
        $html .= '<td>' . $order["date_create"] . '</td>';
        $html .= ' </tr>';
    }
    $html .= '</tbody>';
    $html .= '</table>';
    echo $html;
} else if ($type == "getsummarizeordersize") {
    $date_start = $_POST["date_start"];
    $date_end = $_POST["date_end"];
    $company_id = $_POST["company_id"];
    $list = new reportservice();
    $listorder = $list->getsummarizeordersize($date_start, $date_end, $company_id);
    $html = "";
    $html .= '<table class="table text-nowrap text-center w-100" id="table_size">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>ลำดับ</th>';
    $html .= '<th>รหัสสินค้า</th>';
    $html .= '<th>รหัสบาร์โค้ด</th>';
    $html .= '<th>ไซร์</th>';
    $html .= '<th>จำนวนที่ขาย</th>';
    $html .= '<th>วันที่</th>';
    $html .= ' </tr>';
    $html .= ' </thead>';
    $html .= '<tbody id="data_exportexcel">';
    foreach ($listorder as $key => $order) {
        $html .= '<tr>';
        $html .= '<td>' . ($key + 1) . '</td>';
        $html .= '<td><b>ชื่อสินค้า : </b>' . $order["product_mat_name_th"] . '<br><b>รหัสสินค้า : </b>' . substr($order["product_mat_no"], 0, 12) . '</td>';
        $html .= '<td>' . $order["product_mat_barcode"] . '</td>';
        $html .= '<td>' . $order["product_size_id"] . '</td>';
        $html .= '<td>' . $order["SUM(b.product_qty)"] . '</td>';
        $html .= '<td>' . $order["date_create"] . '</td>';
        $html .= ' </tr>';
    }
    $html .= '</tbody>';
    $html .= '</table>';
    echo $html;
} else if ($type == "exportorder") {
    $date_start = $_POST["date_start"];
    $date_end = $_POST["date_end"];
    $company_id = $_POST["company_id"];
    $list = new reportservice();
    $listorder = $list->exportexcel($date_start, $date_end, $company_id);
    $path = array(
        "paht" => $listorder
    );
    echo json_encode($path);
}
