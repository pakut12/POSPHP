<?php

class reportservice
{

    public static function getsummarizeorder($date_start, $date_end, $company_id)
    {
        include "../config.php";
        require "../modal/orderdetails.php";
        $sql = "SELECT a.doc_id,e.customer_id,e.customer_code,e.customer_prefix,e.customer_firstname,e.customer_lastname,f.department_name,g.company_name,c.product_mat_no,c.product_mat_name_th,c.product_mat_barcode,h.material_group,h.material_name,b.product_qty,c.product_sale_price,c.product_sale_vat,b.date_create FROM tb_doc a INNER JOIN tb_order b ON a.doc_id = b.doc_id INNER JOIN tb_product c ON c.product_id = b.product_id INNER JOIN tb_customer e on e.customer_id = b.customer_id INNER JOIN tb_department f on f.department_id = b.department_id INNER JOIN tb_company g on g.company_id = b.company_id INNER JOIN tb_material h ON h.material_id = c.material_id WHERE b.date_create BETWEEN '$date_start' AND '$date_end'  AND b.company_id = '$company_id'";

        $result  = mysqli_query($conn, $sql);
        $listorder = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $order = array(
                "customer_name" => $row["customer_prefix"] . " " . $row["customer_firstname"] . " " . $row["customer_lastname"],
                "product_mat_no" => $row["product_mat_no"],
                "product_mat_barcode" => $row["product_mat_barcode"],
                "product_mat_name_th" => $row["product_mat_name_th"],
                "material_group" => $row["material_group"],
                "material_name" => $row["material_name"],
                "product_qty" => $row["product_qty"],
                "product_qty" => $row["product_qty"],
                "product_sale_price" => $row["product_sale_price"],
                "product_sale_vat" => $row["product_sale_vat"]
            );
            array_push($listorder, $order);
        }
        return $listorder;
    }
}
