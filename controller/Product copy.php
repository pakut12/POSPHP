<?php
include "../config.php";
require "../modal/userdetails.php";


$type = $_POST["type"];
if ($type == "searchproduct") {
    $barcode = $_POST["barcode"];
    $sql = "SELECT * FROM `tb_product` WHERE product_mat_barcode = '$barcode';";

    $re = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($re)) {
        echo json_encode($row);
    }
} else if ($type == "addproduct") {
    

}
