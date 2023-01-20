<?php
include "../config.php";
require "../Service/productservice.php";

$type = $_POST["type"];
if ($type == "searchproduct") {
    $barcode = $_POST["barcode"];
    $sql = "SELECT * FROM `tb_product` WHERE product_mat_barcode = '$barcode';";
    $re = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($re)) {
        echo json_encode($row);
    }
} else if ($type == "getproduct") {
    $product_group = $_POST["groupid"];

    $key = new productservice();
    $a = $key->getproduct($product_group);
    foreach ($a as $row) {
        $listproduct = array(
            "product_id" => $row->getproduct_id(),
            "product_group" => $row->getproduct_group(),
            "product_mat_no" => $row->getproduct_mat_no(),
            "product_mat_barcode" => $row->getproduct_mat_barcode(),
            "product_mat_name_th" => $row->getproduct_mat_name_th(),
            "product_color_id" => $row->getproduct_color_id(),
            "product_size_id" => $row->getproduct_size_id(),
            "product_sale_price" => $row->getproduct_sale_price(),
            "product_sale_vat" => $row->getproduct_sale_vat(),
            "date_create" => $row->getdate_create()
        );

        $arr[] = $listproduct;
    }

    echo json_encode($arr);
} else if ($type == "uploadproduct") {
    $file = $_FILES["fileexcel"];
    $materialgroup = $_POST["materialgroup"];

    $product = new productservice();
    $uploadstatus = $product->uploadfile($file);
    $listproduct = $product->readexcel($uploadstatus);
    $process = $product->insertproduct($listproduct,$materialgroup);

    echo json_encode($process);
  
}
