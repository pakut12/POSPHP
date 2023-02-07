<?php

class reportservice
{

    public static function exportexcel($date_start, $date_end, $company_id)
    {
        error_reporting(0);
        include "../config.php";
        require "../modal/orderdetails.php";
        require('../PHPExcel/PHPExcel.php');

        $sql = "SELECT c.material_group,c.material_group_name,a.doc_id,b.order_id,b.product_size_other,e.customer_id,e.customer_code,e.customer_prefix,e.customer_firstname,e.customer_lastname,f.department_name,g.company_name,c.product_mat_no,c.product_mat_name_th,c.product_mat_barcode,b.product_qty,c.product_sale_price,c.product_sale_vat,b.date_create FROM tb_doc a INNER JOIN tb_order b ON a.doc_id = b.doc_id INNER JOIN tb_product c ON c.product_id = b.product_id INNER JOIN tb_customer e on e.customer_id = b.customer_id INNER JOIN tb_department f on f.department_id = b.department_id INNER JOIN tb_company g on g.company_id = b.company_id WHERE b.date_create BETWEEN '$date_start' AND '$date_end'  AND b.company_id = '$company_id'";
        $result  = mysqli_query($conn, $sql);
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y_m_d_h_i_s");
        $path = "";
        if (mysqli_num_rows($result) > 0) {
            $excel = new PHPExcel();
            $excel->getProperties()->setTitle("Example")
                ->setDescription("Example");

            $sheet = $excel->getActiveSheet();
            $sheet->setTitle("Sheet 1");

            $sheet->setCellValueExplicit("A1", "ลำดับ", PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("B1", "เลขที่เอกสาร", PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("C1", "รหัสพนักงาน", PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("D1", "ชื่อนามสกุล", PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("E1", "บริษัท", PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("F1", "เเผนก", PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("G1", "รหัสสินค้า", PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("H1", "รหัสบาร์โค้ด", PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("I1", "ชื่อสินค้า", PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("J1", "material group", PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("K1", "ชื่อ material group", PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("L1", "จำนวนที่ขาย", PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("M1", "ต้นทุน", PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("N1", "ราคาขาย", PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->getStyle('A1:N1')->applyFromArray(
                array(
                    'font' => array('bold' => true),
                    'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
                )
            );

            $n = 2;
            while ($row = mysqli_fetch_assoc($result)) {

                $sheet->setCellValueExplicit("A" . $n, ($n - 1), PHPExcel_Cell_DataType::TYPE_STRING);
                $sheet->setCellValueExplicit("B" . $n, strval($row["doc_id"]), PHPExcel_Cell_DataType::TYPE_STRING);
                $sheet->setCellValueExplicit("C" . $n, strval($row["customer_code"]), PHPExcel_Cell_DataType::TYPE_STRING);
                $sheet->setCellValueExplicit("D" . $n, strval($row["customer_prefix"]) . " " . strval($row["customer_firstname"]) . " " . strval($row["customer_lastname"]));
                $sheet->setCellValueExplicit("E" . $n, strval($row["company_name"]), PHPExcel_Cell_DataType::TYPE_STRING);
                $sheet->setCellValueExplicit("F" . $n, strval($row["department_name"]), PHPExcel_Cell_DataType::TYPE_STRING);
                $sheet->setCellValueExplicit("G" . $n, strval($row["product_mat_no"] . $row["product_size_other"]), PHPExcel_Cell_DataType::TYPE_STRING);
                $sheet->setCellValueExplicit("H" . $n, strval($row["product_mat_barcode"]), PHPExcel_Cell_DataType::TYPE_STRING);
                $sheet->setCellValueExplicit("I" . $n, strval($row["product_mat_name_th"]), PHPExcel_Cell_DataType::TYPE_STRING);
                $sheet->setCellValueExplicit("J" . $n, strval($row["material_group"]), PHPExcel_Cell_DataType::TYPE_STRING);
                $sheet->setCellValueExplicit("K" . $n, strval($row["material_group_name"]), PHPExcel_Cell_DataType::TYPE_STRING);
                $sheet->setCellValueExplicit("L" . $n, strval($row["product_qty"]), PHPExcel_Cell_DataType::TYPE_STRING);
                $sheet->setCellValueExplicit("M" . $n, strval($row["product_sale_price"]), PHPExcel_Cell_DataType::TYPE_STRING);
                $sheet->setCellValueExplicit("N" . $n, strval($row["product_sale_vat"]), PHPExcel_Cell_DataType::TYPE_STRING);
                $n++;
            }

            for ($col = 'A'; $col <= $sheet->getHighestColumn(); $col++) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }

            $path = "attachfile/exportfileexcel/List Order " . $date_start . " To " . $date_end . " " . $date . ".xls";
            $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            $writer->save("../attachfile/exportfileexcel/List Order " . $date_start . " To " . $date_end . " " . $date . ".xls");
        }

        mysqli_close($conn);
        return $path;
    }

    public static function getsummarizeorder($date_start, $date_end, $company_id)
    {
        include "../config.php";
        require "../modal/orderdetails.php";
        $sql = "SELECT c.material_group,c.material_group_name,a.doc_id,b.order_id,b.product_size_other,e.customer_id,e.customer_code,e.customer_prefix,e.customer_firstname,e.customer_lastname,f.department_name,g.company_name,c.product_mat_no,c.product_mat_name_th,c.product_mat_barcode,b.product_qty,c.product_sale_price,c.product_sale_vat,b.date_create FROM tb_doc a INNER JOIN tb_order b ON a.doc_id = b.doc_id INNER JOIN tb_product c ON c.product_id = b.product_id INNER JOIN tb_customer e on e.customer_id = b.customer_id INNER JOIN tb_department f on f.department_id = b.department_id INNER JOIN tb_company g on g.company_id = b.company_id WHERE b.date_create BETWEEN '$date_start' AND '$date_end'  AND b.company_id = '$company_id'";

        $result  = mysqli_query($conn, $sql);
        $listorder = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $order = array(
                "order_id" => $row["order_id"],
                "customer_code" => $row["customer_code"],
                "customer_name" => $row["customer_prefix"] . " " . $row["customer_firstname"] . " " . $row["customer_lastname"],
                "department_name" => $row["department_name"],
                "company_name" => $row["company_name"],
                "product_mat_no" => $row["product_mat_no"],
                "product_size_other" => $row["product_size_other"],
                "product_mat_barcode" => $row["product_mat_barcode"],
                "product_mat_name_th" => $row["product_mat_name_th"],
                "material_group" => $row["material_group"],
                "material_name" => $row["material_group_name"],
                "product_qty" => $row["product_qty"],
                "product_sale_price" => $row["product_sale_price"],
                "product_sale_vat" => $row["product_sale_vat"]
            );
            array_push($listorder, $order);
        }

        mysqli_close($conn);
        return $listorder;
    }


    public static function sumgroupbymat($date_start, $date_end, $company_id, $mat)
    {
        include "../config.php";

        $sql = "SELECT a.doc_id,e.customer_id,e.customer_code,e.customer_prefix,e.customer_firstname,e.customer_lastname,f.department_name,g.company_name,SUM(b.product_qty),b.date_create FROM tb_doc a INNER JOIN tb_order b ON a.doc_id = b.doc_id INNER JOIN tb_product c ON c.product_id = b.product_id INNER JOIN tb_customer e on e.customer_id = b.customer_id INNER JOIN tb_department f on f.department_id = b.department_id INNER JOIN tb_company g on g.company_id = b.company_id WHERE b.date_create BETWEEN '$date_start' AND '$date_end' AND b.company_id = '$company_id' AND SUBSTRING(c.product_mat_no, 1, 12) ='$mat' GROUP BY SUBSTRING(c.product_mat_no, 1, 12);";

        $result  = mysqli_query($conn, $sql);
        $totel = "";
        while ($row = mysqli_fetch_assoc($result)) {
            $totel = $row["SUM(b.product_qty)"];
        }
        mysqli_close($conn);
        return $totel;
    }

    public static function getsummarizeordercustomer($date_start, $date_end, $company_id)
    {
        include "../config.php";
        require "../modal/orderdetails.php";
        $sql = "SELECT a.doc_id,e.customer_id,e.customer_code,e.customer_prefix,e.customer_firstname,e.customer_lastname,f.department_name,g.company_name,SUM(b.product_qty),b.date_create FROM tb_doc a INNER JOIN tb_order b ON a.doc_id = b.doc_id INNER JOIN tb_product c ON c.product_id = b.product_id INNER JOIN tb_customer e on e.customer_id = b.customer_id INNER JOIN tb_department f on f.department_id = b.department_id INNER JOIN tb_company g on g.company_id = b.company_id WHERE b.date_create BETWEEN '$date_start' AND '$date_end' AND b.company_id = '$company_id' GROUP BY e.customer_prefix,e.customer_firstname,e.customer_lastname";

        $result  = mysqli_query($conn, $sql);
        $listorder = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $order = array(
                "customer_code" => $row["customer_code"],
                "customer_name" => $row["customer_prefix"] . " " . $row["customer_firstname"] . " " . $row["customer_lastname"],
                "department_name" => $row["department_name"],
                "company_name" => $row["company_name"],
                "SUM(b.product_qty)" => $row["SUM(b.product_qty)"],
                "date_create" => $row["date_create"]
            );
            array_push($listorder, $order);
        }
        mysqli_close($conn);
        return $listorder;
    }

    public static function getsummarizeordersize($date_start, $date_end, $company_id)
    {
        include "../config.php";
        require "../modal/orderdetails.php";
        $sql = "SELECT b.product_size_other,c.product_mat_no,c.product_mat_name_th,c.product_mat_barcode,c.product_size_id,SUM(b.product_qty),c.product_sale_price,c.product_sale_vat,b.date_create FROM tb_doc a INNER JOIN tb_order b ON a.doc_id = b.doc_id INNER JOIN tb_product c ON c.product_id = b.product_id INNER JOIN tb_customer e on e.customer_id = b.customer_id INNER JOIN tb_department f on f.department_id = b.department_id INNER JOIN tb_company g on g.company_id = b.company_id WHERE b.date_create BETWEEN '$date_start' AND '$date_end' AND b.company_id = '$company_id' GROUP BY c.product_mat_no,c.product_size_id,b.product_size_other";
       
        $result  = mysqli_query($conn, $sql);
        $listorder = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $order = array(
                "product_mat_no" => $row["product_mat_no"],
                "product_mat_name_th" => $row["product_mat_name_th"],
                "product_mat_barcode" => $row["product_mat_barcode"],
                "product_size_id" => $row["product_size_id"],
                "SUM(b.product_qty)" => $row["SUM(b.product_qty)"],
                "product_size_other" => $row["product_size_other"],
                "date_create" => $row["date_create"]
            );
            array_push($listorder, $order);
        }
        mysqli_close($conn);
        return $listorder;
    }
}
