<?php
error_reporting(error_reporting() & ~E_NOTICE);
require('PHPExcel/PHPExcel.php');
require('modal/productdetails.php');
$objPHPExcel = PHPExcel_IOFactory::load("Test.xlsx");

// Get the first worksheet from the workbook
$worksheet = $objPHPExcel->getActiveSheet();
$n = 0;
$d = 1;
// Read data from the worksheet
$arr = [];
foreach ($worksheet->getRowIterator() as $row) {
    $product = new productdetails();
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
    foreach ($cellIterator as $cell) {
        if ($n != 0) {
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
                $d++;
            } else  if ($d == 9) {
                $product->setdate_create($cell->getValue());
                $d = 1;
            }
            //echo $cell->getValue() . "<br>";
        }
    }
    array_push($arr, $product);
    
    $n++;
}

foreach ($arr as $x) {
    echo $x->getproduct_id();
    echo "<br>";
}
