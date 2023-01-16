<?php

class docservice
{

    public static function getlastprimarykey()
    {
        include "../config.php";
        $sql = "SELECT MAX(doc_id) as lastkey FROM `tb_doc`";
        $result = mysqli_query($conn, $sql);
        $primarykey = null;
        while ($row = mysqli_fetch_assoc($result)) {
            $primarykey = $row["lastkey"];
        }
        return $primarykey;
    }

    public static function adddoc()
    {
        include "../config.php";
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y-m-d h:i:s");
        $lastkey =  self::getlastprimarykey() + 1;
        $sql = "INSERT INTO `tb_doc` (`doc_id`, `date_create`) VALUES ('$lastkey', ' $date')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            return $lastkey;
        } else {
            return 0;
        }
    }
    public static function getdetailsdoc($docid)
    {
        include "../config.php";
        require "../modal/orderdetails.php";
        $sql = "SELECT a.doc_id,c.product_id,c.product_mat_no,b.product_qty,c.product_sale_price,c.product_sale_vat,e.customer_code,e.customer_prefix,e.customer_firstname,e.customer_lastname,f.department_name,g.company_name FROM tb_doc a INNER JOIN  tb_order b ON a.doc_id = b.doc_id INNER JOIN tb_product c ON c.product_id = b.product_id INNER JOIN tb_customer e on e.customer_id = b.customer_id INNER JOIN tb_department f on f.department_id = b.department_id INNER JOIN  tb_company g on g.company_id = b.company_id WHERE b.doc_id = '$docid'";
        $result  = mysqli_query($conn, $sql);
        $listorder = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $order = array(
                "doc_id" => $row["doc_id"],
                "product_id" => $row["product_id"],
                "product_mat_no" => $row["product_mat_no"],
                "product_qty" => $row["product_qty"],
                "product_sale_price" => $row["product_sale_price"],
                "product_sale_vat" => $row["product_sale_vat"],
                "customer_code" => $row["customer_code"],
                "customer_prefix" => $row["customer_prefix"],
                "customer_firstname" => $row["customer_firstname"],
                "customer_lastname" => $row["customer_lastname"],
                "department_name" => $row["department_name"],
                "company_name" => $row["company_name"]
            );

            /*
            $order = new orderdetails();
            $order->setDoc_id($row["doc_id"]);
            $order->setProduct_id($row["product_id"]);
            $order->setProduct_mat_no($row["product_mat_no"]);
            $order->setProduct_qty($row["product_qty"]);
            $order->setCustomer_code($row["customer_code"]);
            $order->setCustomer_prefix($row["customer_prefix"]);
            $order->setCustomer_firstname($row["customer_firstname"]);
            $order->setCustomer_lastname($row["customer_lastname"]);
            $order->setDepartment_name($row["department_name"]);
            $order->setCompany_name($row["company_name"]);
            */
            array_push($listorder, $order);
        }
        return $listorder;
    }
}
