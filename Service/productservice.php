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
        mysqli_close($conn);
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
            $product->setproduct_sale_vat($row["product_sale_vat"]);
            $product->setproduct_plant($row["product_plant"]);
            $product->setdate_create($row["date_create"]);
            array_push($arr, $product);
        }

        mysqli_close($conn);
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
        mysqli_close($conn);
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
                "groupid" => $sql["groupid"],
                "sql" => $sql["sql"]
            );
        } else {
            if ($sql["update"] > 0) {
                $status = array(
                    "status" =>  "updatetrue",
                    "groupid" => $sql["groupid"],
                    "sql" => $sql["sql"],
                    "update" => $sql["update"],
                );
            } else {
                $status = array(
                    "status" =>  "false",
                    "groupid" => $sql["groupid"],
                    "sql" => $sql["sql"],
                    "update" => $sql["update"],
                );
            }
        }
        mysqli_close($conn);
        return $status;
    }

    public static function chackmat($mat)
    {
        include "../config.php";
        $sql = "SELECT * FROM `tb_product` WHERE product_mat_no = '" . $mat . "'";
        $result = mysqli_query($conn, $sql);
        $row = $result->num_rows;
        while ($data = mysqli_fetch_assoc($result)) {
            $list = array(
                "row" => $row,
                "id" => $data["product_id"],
                "productid" => $data["product_id"]
            );
        }
        mysqli_close($conn);
        return $list;
    }

    public static function updatemat($mat)
    {
        include "../config.php";
        $id = $mat["id"];
        $materialgroup = $mat["material_group"];
        $materialgroupname = $mat["material_group_name"];
        $barcode = $mat["barcode"];
        $name = $mat["name"];
        $color = $mat["color"];
        $size = $mat["size"];
        $price = $mat["price"];
        $productid = $mat["productid"];
        $pricevat = $mat["pricevat"];
        $plant = $mat["plant"];

        $sql = "UPDATE tb_product SET product_group = '$productid',material_group_name = '$materialgroupname',material_group = '$materialgroup',product_mat_barcode = '$barcode',product_mat_name_th = '$name',product_color_id = '$color',product_size_id = '$size',product_sale_price = '$price',product_sale_vat = '$pricevat',product_plant = '$plant' WHERE product_id = '$id';";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $num = 1;
        } else {
            $num = 0;
        }
        mysqli_close($conn);
        return $num;
    }

    public static function generatorsqlinsert($listproduct)
    {
        include "../config.php";
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y-m-d H:i:s");
        $lastkeygroup = self::getlastkeyproductgroup() + 1;
        $lastkeyprimary = self::getlastprimarykey() + 1;

        $sql = "INSERT INTO `tb_product` (`product_id`, `material_group`,`material_group_name`,`product_group`, `product_mat_no`, `product_mat_barcode`, `product_mat_name_th`, `product_color_id`, `product_size_id`, `product_sale_price`, `product_sale_vat`, `product_plant`,  `date_create`) VALUES ";
        $row = count($listproduct);
        $update = 0;
        for ($x = 0; $x < $row; $x++) {
            $mat = $listproduct[$x]->getproduct_mat_no();
            $product_mat_barcode = $listproduct[$x]->getproduct_mat_barcode();
            $product_mat_name_th = $listproduct[$x]->getproduct_mat_name_th();
            $product_color_id = $listproduct[$x]->getproduct_color_id();
            $product_size_id = $listproduct[$x]->getproduct_size_id();
            $product_sale_price = $listproduct[$x]->getproduct_sale_price();
            $product_sale_vat = $listproduct[$x]->getproduct_sale_vat();
            $product_plant = $listproduct[$x]->getproduct_plant();

            $color = substr(substr($mat, 10), 0, 2);
            $size = substr($mat, 12, 3);
            $chack = self::chackmat($mat);

            $material_group = $listproduct[$x]->getProduct_mat_group();
            $material_group_name = $listproduct[$x]->getProduct_mat_group_name();

            if ($chack["row"] != 1) {
                if ($x == $row - 1) {
                    $sql = $sql . "('" . $lastkeyprimary . "', '" . $material_group . "', '" . $material_group_name . "','" . $lastkeygroup . "', '" . $mat . "', '" . $product_mat_barcode . "', '" . $product_mat_name_th . "', '" .    $color . "', '" . $size . "', '" . $product_sale_price . "', '" . $product_sale_vat . "', '" . $product_plant . "', '" . $date . "')";
                } else {
                    $sql = $sql . "('" . $lastkeyprimary . "','" . $material_group . "', '" . $material_group_name . "', '" . $lastkeygroup . "', '" . $mat . "', '" . $product_mat_barcode . "', '" . $product_mat_name_th . "', '" .    $color . "', '" . $size . "', '" . $product_sale_price . "', '" . $product_sale_vat . "','" . $product_plant . "', '" . $date . "'),";
                }
                $lastkeyprimary++;
            } else {
                $mat = array(
                    "id" => $chack["id"],
                    "material_group" => $material_group,
                    "material_group_name" => $material_group_name,
                    "productid" => $lastkeygroup,
                    "barcode" => $product_mat_barcode,
                    "name" => $product_mat_name_th,
                    "color" => $color,
                    "size" =>  $size,
                    "price" => $product_sale_price,
                    "pricevat" => $product_sale_vat,
                    "plant" => $product_plant
                );

                if (self::updatemat($mat) == 1) {
                    $update =  $update + 1;
                }
            }
        }

        $arr = array(
            "sql" =>  $sql,
            "groupid" => $lastkeygroup,
            "update" => $update
        );
        mysqli_close($conn);
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
                        $product->setproduct_mat_no($cell->getValue());
                        $d++;
                    } else  if ($d == 2) {
                        $product->setproduct_mat_barcode($cell->getValue());
                        $d++;
                    } else  if ($d == 3) {
                        $product->setproduct_mat_name_th($cell->getValue());
                        $d++;
                    } else  if ($d == 4) {
                        $product->setProduct_mat_group($cell->getValue());
                        $d++;
                    } else  if ($d == 5) {
                        $product->setProduct_mat_group_name($cell->getValue());
                        $d++;
                    } else  if ($d == 6) {
                        $product->setproduct_sale_price($cell->getValue());
                        $d++;
                    } else  if ($d == 7) {
                        $product->setproduct_sale_vat($cell->getValue());
                        $d++;
                    } else  if ($d == 8) {
                        $product->setproduct_plant($cell->getValue());
                        $d = 1;
                    }
                    // echo $cell->getValue() . "<br>";
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
