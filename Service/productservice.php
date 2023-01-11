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

    public static function getproduct($product_group)
    {
        include "../config.php";
        require "../modal/productdetails.php";
        $sql = "SELECT * FROM `tb_product` where product_group = '" . $product_group . "'";
 
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

    public static function getlastkeyproductgroup()
    {
        include "../config.php";
        $sql = "SELECT MAX(product_group) as lastkey FROM `tb_product`";
        $result = mysqli_query($conn, $sql);
        $primarykey = null;
        while ($row = mysqli_fetch_assoc($result)) {
            $primarykey = $row["lastkey"];
        }
        return $primarykey;
    }
    public static function insertproduct($listproduct)
    {
        include "../config.php";
        $sql = self::generatorsqlinsert($listproduct);
        $result = mysqli_query($conn, $sql["sql"]);
        if ($result) {
            $status = array(
                "status" =>  "true",
                "groupid" => $sql["groupid"]
            );
        } else {
            $status = array(
                "status" =>  "false",
                "groupid" => $sql["groupid"]
            );
        }
        return $status;
    }
    public static function generatorsqlinsert($listproduct)
    {
        include "../config.php";
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y-m-d");
        $lastkeygroup = self::getlastkeyproductgroup() + 1;
        $lastkeyprimary = self::getlastprimarykey() + 1;

        $sql = "INSERT INTO `tb_product` (`product_id`, `product_group`, `product_mat_no`, `product_mat_barcode`, `product_mat_name_th`, `product_color_id`, `product_size_id`, `product_sale_price`, `date_create`) VALUES ";
        $row = count($listproduct);
        for ($x = 0; $x < $row; $x++) {
            $product_mat_no = $listproduct[$x]->getproduct_mat_no();
            $product_mat_barcode = $listproduct[$x]->getproduct_mat_barcode();
            $product_mat_name_th = $listproduct[$x]->getproduct_mat_name_th();
            $product_color_id = $listproduct[$x]->getproduct_color_id();
            $product_size_id = $listproduct[$x]->getproduct_size_id();
            $product_sale_price = $listproduct[$x]->getproduct_sale_price();
            if ($x == $row - 1) {
                $sql = $sql . "('" . $lastkeyprimary . "', '" . $lastkeygroup . "', '" . $product_mat_no . "', '" . $product_mat_barcode . "', '" . $product_mat_name_th . "', '" . $product_color_id . "', '" . $product_size_id . "', '" . $product_sale_price . "', '" . $date . "')";
            } else {
                $sql = $sql . "('" . $lastkeyprimary . "', '" . $lastkeygroup . "', '" . $product_mat_no . "', '" . $product_mat_barcode . "', '" . $product_mat_name_th . "', '" . $product_color_id . "', '" . $product_size_id . "', '" . $product_sale_price . "', '" . $date . "'),";
            }
            $lastkeyprimary++;
        }
        $arr = array(
            "sql" =>  $sql,
            "groupid" => $lastkeygroup
        );
        return $arr;
    }

    public static function readexcel($file)
    {
        error_reporting(error_reporting() & ~E_NOTICE);
        require('../PHPExcel/PHPExcel.php');
        require('../modal/productdetails.php');

        $objPHPExcel = PHPExcel_IOFactory::load($file);

        // Get the first worksheet from the workbook
        $worksheet = $objPHPExcel->getActiveSheet();
        $n = 0;
        $d = 1;
        // Read data from the worksheet
        $arr = [];
        foreach ($worksheet->getRowIterator() as $row) {
            if ($n != 0) {
                $product = new productdetails();
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
                foreach ($cellIterator as $cell) {

                    if ($d == 1) {
                        $product->setproduct_id($cell->getValue());
                        $d++;
                    } else  if ($d == 2) {
                        $product->setproduct_group($cell->getValue());
                        $d++;
                    } else  if ($d == 3) {
                        $product->setproduct_mat_no($cell->getValue());
                        $d++;
                    } else  if ($d == 4) {
                        $product->setproduct_mat_barcode($cell->getValue());
                        $d++;
                    } else  if ($d == 5) {
                        $product->setproduct_mat_name_th($cell->getValue());
                        $d++;
                    } else  if ($d == 6) {
                        $product->setproduct_color_id($cell->getValue());
                        $d++;
                    } else  if ($d == 7) {
                        $product->setproduct_size_id($cell->getValue());
                        $d++;
                    } else  if ($d == 8) {
                        $product->setproduct_sale_price($cell->getValue());
                        $d = 1;
                    } 
                    //echo $cell->getValue() . "<br>";
                }
                array_push($arr, $product);
            }

            $n++;
        }
        return $arr;
    }

    public static function uploadfile($file)
    {
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y_m_d_h_i_s");
        $Str_file = explode(".", $file['name']);
        $filename =  $date . "." . $Str_file['1'];
        $target_dir = "../attachfile/upload/";

        $target_file = $target_dir .  $filename;

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 2;
        }

        // Check file size
        if ($file["size"] > 500000) {
            $uploadOk = 3;
        }

        // Allow certain file formats
        if ($imageFileType != "xls" && $imageFileType != "xlsx") {
            $uploadOk = 4;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $uploadOk = 5;
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                $uploadOk = $target_file;
            } else {
                $uploadOk = 6;
            }
        }
        return $uploadOk;
    }
}
