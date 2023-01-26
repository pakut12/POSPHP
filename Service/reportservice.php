<?php

class reportservice
{

    public static function exportexcel($date_start, $date_end, $company_id)
    {
        error_reporting(0);
        include "../config.php";
        require "../modal/orderdetails.php";
        require('../PHPExcel/PHPExcel.php');

        $sql = "SELECT a.doc_id,b.order_id,e.customer_id,e.customer_code,e.customer_prefix,e.customer_firstname,e.customer_lastname,f.department_name,g.company_name,c.product_mat_no,c.product_mat_name_th,c.product_mat_barcode,h.material_group,h.material_name,b.product_qty,c.product_sale_price,c.product_sale_vat,b.date_create FROM tb_doc a INNER JOIN tb_order b ON a.doc_id = b.doc_id INNER JOIN tb_product c ON c.product_id = b.product_id INNER JOIN tb_customer e on e.customer_id = b.customer_id INNER JOIN tb_department f on f.department_id = b.department_id INNER JOIN tb_company g on g.company_id = b.company_id INNER JOIN tb_material h ON h.material_id = c.material_id WHERE b.date_create BETWEEN '$date_start' AND '$date_end'  AND b.company_id = '$company_id'";
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
            $sheet->mergeCells('A1:M1');



            $sheet->setCellValueExplicit("A2", "ลำดับ");
            $sheet->setCellValueExplicit("B2", "เลขที่เอกสาร");
            $sheet->setCellValueExplicit("C2", "รหัสพนักงาน");
            $sheet->setCellValueExplicit("D2", "ชื่อนามสกุล");
            $sheet->setCellValueExplicit("E2", "บริษัท");
            $sheet->setCellValueExplicit("F2", "เเผนก");
            $sheet->setCellValueExplicit("G2", "รหัสสินค้า");
            $sheet->setCellValueExplicit("H2", "รหัสบาร์โค้ด");
            $sheet->setCellValueExplicit("I2", "ชื่อสินค้า");
            $sheet->setCellValueExplicit("J2", "material group");
            $sheet->setCellValueExplicit("K2", "ชื่อ material group");
            $sheet->setCellValueExplicit("L2", "จำนวนที่ขาย");
            $sheet->setCellValueExplicit("M2", "ต้นทุน");
            $sheet->setCellValueExplicit("N2", "ราคาขาย");
            $sheet->getStyle('A1:N1')->applyFromArray(
                array(
                    'font' => array('bold' => true),
                    'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
                )
            );
            $sheet->getStyle('A2:N2')->applyFromArray(
                array(
                    'font' => array('bold' => true),
                    'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
                )
            );
            $n = 3;
            while ($row = mysqli_fetch_assoc($result)) {
                $sheet->setCellValueExplicit("A1", "List Order " . $row["company_name"] . " Date : " . $date_start . " To " . $date_end);
                $sheet->setCellValueExplicit("A" . $n, ($n - 2));
                $sheet->setCellValueExplicit("B" . $n, $row["doc_id"]);
                $sheet->setCellValueExplicit("C" . $n, $row["customer_code"]);
                $sheet->setCellValueExplicit("D" . $n, $row["customer_prefix"] . " " . $row["customer_firstname"] . " " . $row["customer_lastname"]);
                $sheet->setCellValueExplicit("E" . $n, $row["company_name"]);
                $sheet->setCellValueExplicit("F" . $n, $row["department_name"]);
                $sheet->setCellValueExplicit("G" . $n, $row["product_mat_no"]);
                $sheet->setCellValueExplicit("H" . $n, $row["product_mat_barcode"]);
                $sheet->setCellValueExplicit("I" . $n, $row["product_mat_name_th"]);
                $sheet->setCellValueExplicit("J" . $n, $row["material_group"]);
                $sheet->setCellValueExplicit("K" . $n, $row["material_name"]);
                $sheet->setCellValueExplicit("L" . $n, $row["product_qty"]);
                $sheet->setCellValueExplicit("M" . $n, $row["product_sale_price"]);
                $sheet->setCellValueExplicit("N" . $n, $row["product_sale_vat"]);
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
        $sql = "SELECT a.doc_id,b.order_id,e.customer_id,e.customer_code,e.customer_prefix,e.customer_firstname,e.customer_lastname,f.department_name,g.company_name,c.product_mat_no,c.product_mat_name_th,c.product_mat_barcode,h.material_group,h.material_name,b.product_qty,c.product_sale_price,c.product_sale_vat,b.date_create FROM tb_doc a INNER JOIN tb_order b ON a.doc_id = b.doc_id INNER JOIN tb_product c ON c.product_id = b.product_id INNER JOIN tb_customer e on e.customer_id = b.customer_id INNER JOIN tb_department f on f.department_id = b.department_id INNER JOIN tb_company g on g.company_id = b.company_id INNER JOIN tb_material h ON h.material_id = c.material_id WHERE b.date_create BETWEEN '$date_start' AND '$date_end'  AND b.company_id = '$company_id'";

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
                "product_mat_barcode" => $row["product_mat_barcode"],
                "product_mat_name_th" => $row["product_mat_name_th"],
                "material_group" => $row["material_group"],
                "material_name" => $row["material_name"],
                "product_qty" => $row["product_qty"],
                "product_sale_price" => $row["product_sale_price"],
                "product_sale_vat" => $row["product_sale_vat"]
            );
            array_push($listorder, $order);
        }
        mysqli_close($conn);
        return $listorder;
    }

    public static function getsummarizeordercustomer($date_start, $date_end, $company_id)
    {
        include "../config.php";
        require "../modal/orderdetails.php";
        $sql = "SELECT a.doc_id,e.customer_id,e.customer_code,e.customer_prefix,e.customer_firstname,e.customer_lastname,f.department_name,g.company_name,SUM(b.product_qty),b.date_create FROM tb_doc a INNER JOIN tb_order b ON a.doc_id = b.doc_id INNER JOIN tb_product c ON c.product_id = b.product_id INNER JOIN tb_customer e on e.customer_id = b.customer_id INNER JOIN tb_department f on f.department_id = b.department_id INNER JOIN tb_company g on g.company_id = b.company_id INNER JOIN tb_material h ON h.material_id = c.material_id WHERE b.date_create BETWEEN '$date_start' AND '$date_end' AND b.company_id = '$company_id' GROUP BY e.customer_prefix,e.customer_firstname,e.customer_lastname";

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
        $sql = "SELECT c.product_mat_no,c.product_mat_name_th,c.product_mat_barcode,h.material_group,h.material_name,c.product_size_id,SUM(b.product_qty),c.product_sale_price,c.product_sale_vat,b.date_create FROM tb_doc a INNER JOIN tb_order b ON a.doc_id = b.doc_id INNER JOIN tb_product c ON c.product_id = b.product_id INNER JOIN tb_customer e on e.customer_id = b.customer_id INNER JOIN tb_department f on f.department_id = b.department_id INNER JOIN tb_company g on g.company_id = b.company_id INNER JOIN tb_material h ON h.material_id = c.material_id WHERE b.date_create BETWEEN '$date_start' AND '$date_end' AND b.company_id = '$company_id' GROUP BY c.product_mat_no,c.product_size_id;";

        $result  = mysqli_query($conn, $sql);
        $listorder = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $order = array(
                "product_mat_no" => $row["product_mat_no"],
                "product_mat_name_th" => $row["product_mat_name_th"],
                "product_mat_barcode" => $row["product_mat_barcode"],
                "product_size_id" => $row["product_size_id"],
                "SUM(b.product_qty)" => $row["SUM(b.product_qty)"],
                "date_create" => $row["date_create"]
            );
            array_push($listorder, $order);
        }
        mysqli_close($conn);
        return $listorder;
    }
}
