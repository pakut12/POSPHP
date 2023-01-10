<?php

class productservice
{
    public static function getlastprimarykey()
    {
        include "../config.php";
        $sql = "SELECT MAX(product_id) as lastkey FROM `tb_product`";
        $result = mysqli_query($conn, $sql);
        $primarykey = null;
        while ($row = mysqli_fetch_assoc($result)) {
            $primarykey = $row["lastkey"];
        }
        return $primarykey;
    }

    public static function getproduct()
    {
        include "../config.php";
        require "../modal/productdetails.php";
        $sql = "SELECT * FROM `tb_product` where product_id != 99";
        $result = mysqli_query($conn, $sql);
        $arr = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $product = new productdetails();
            $product->setproduct_id($row["product_id"]);
            $product->setproduct_group($row["product_group"]);
            $product->setproduct_mat_no($row["product_mat_no"]);
            $product->setproduct_mat_barcode($row["product_mat_barcode"]);
            $product->setproduct_mat_name_th($row["product_mat_name_th"]);
            $product->setproduct_color_id($row["product_color_id"]);
            $product->setproduct_size_id($row["product_size_id"]);
            $product->setproduct_sale_price($row["product_sale_price"]);
            $product->setdate_create($row["date_create"]);
            array_push($arr, $product);
        }

        return $arr;
    }
}
