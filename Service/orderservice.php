<?php
class orderservice
{
    public static function getlastprimarykey()
    {
        include "../config.php";
        $sql = "SELECT MAX(order_id) as lastkey FROM `tb_order`";
        $result = mysqli_query($conn, $sql);
        $primarykey = null;
        while ($row = mysqli_fetch_assoc($result)) {
            $primarykey = $row["lastkey"];
        }
        mysqli_close($conn);
        return $primarykey;
    }

    public static function addorder($keycustomer, $listcustomer, $listcart, $keydoc)
    {
        include "../config.php";
        $sql = self::generatorsqlinsert($keycustomer, $listcustomer, $listcart, $keydoc);
        $result = mysqli_query($conn, $sql["sql"]);

        if ($result) {
            $status = array(
                "status" => true,
                "keydoc" => $sql["keydoc"]
            );
        } else {
            $status = array(
                "status" => false,
                "keydoc" => $sql["keydoc"]
            );
        }

        mysqli_close($conn);
        return $status;
    }

    public static function generatorsqlinsert($keycustomer, $listcustomer, $listcart, $keydoc)
    {
        include "../config.php";

        $keydepartment = $listcustomer["departmentlist"];
        $keycompany = $listcustomer["companylist"];
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y-m-d h:i:s");
        $lastkey = self::getlastprimarykey() + 1;
        $sql = "INSERT INTO `tb_order` (`order_id`, `doc_id`, `customer_id`, `product_id`, `department_id`,`product_qty`, `company_id`, `date_create`, `order_status`) 
        VALUES ";


        $numpd = count($listcart) - 1;
        foreach ($listcart as $row => $key) {
            $num = $key["num"];
            $pd = $key["id"];
            if ($numpd != $row) {
                $sql = $sql . "('$lastkey', '$keydoc', '$keycustomer', '$pd', '$keydepartment','$num', '$keycompany', '$date', 'new'),";
            } else {
                $sql = $sql . "('$lastkey', '$keydoc', '$keycustomer', '$pd', '$keydepartment', '$num','$keycompany', '$date', 'new')";
            }
            $lastkey++;
        }

        $result = array(
            "sql" => $sql,
            "keydoc" => $keydoc
        );

        mysqli_close($conn);
        return $result;
    }

    public static function getorder($date_start, $date_end, $company_id)
    {
        include "../config.php";
        $sql = "SELECT a.doc_id,e.customer_id,e.customer_code,e.customer_prefix,e.customer_firstname,e.customer_lastname,f.department_name,g.company_name,b.date_create FROM tb_doc a INNER JOIN tb_order b ON a.doc_id = b.doc_id INNER JOIN tb_product c ON c.product_id = b.product_id INNER JOIN tb_customer e on e.customer_id = b.customer_id INNER JOIN tb_department f on f.department_id = b.department_id INNER JOIN tb_company g on g.company_id = b.company_id  WHERE b.date_create BETWEEN '$date_start' AND '$date_end' AND b.company_id = '$company_id' GROUP BY a.doc_id";
      
        $result = mysqli_query($conn, $sql);
        $listorder = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $order = array(
                "doc_id" => $row["doc_id"],
                "customer_id" => $row["customer_id"],
                "customer_code" => $row["customer_code"],
                "customer_prefix" => $row["customer_prefix"],
                "customer_firstname" => $row["customer_firstname"],
                "customer_lastname" => $row["customer_lastname"],
                "department_name" => $row["department_name"],
                "company_name" => $row["company_name"],
                "date_create" => $row["date_create"]
            );
            array_push($listorder, $order);
        }
        mysqli_close($conn);
        return $listorder;
    }

    public static function delorder($doc_id, $customer_id)
    {
        include "../config.php";

        $tb = [
            "DELETE FROM tb_order WHERE doc_id = '$doc_id'",
            "DELETE FROM tb_doc WHERE doc_id = '$doc_id'",
            "DELETE FROM tb_customer WHERE customer_id = '$customer_id'"
        ];

        $status = "";
        foreach ($tb as $row) {
            $result = mysqli_query($conn, $row);
            if ($result) {
                $status = "true";
            } else {
                $status = "false";
                break;
            }
        }

        $resultstatus = array(
            "status" => $status
        );
        mysqli_close($conn);
        return $resultstatus;
    }
    public static function delorderbyid($order_id)
    {
        include "../config.php";
        $sql = "DELETE  FROM `tb_order` WHERE order_id = '$order_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $status = true;
        } else {
            $status = false;
        }
        mysqli_close($conn);
        return $status;
    }

    public static function getorderbyid($doc_id)
    {
        include "../config.php";
        $sql = "SELECT b.order_id,a.doc_id,e.customer_id,e.customer_code,e.customer_prefix,e.customer_firstname,e.customer_lastname,e.customer_phone,f.department_id,f.department_name,g.company_id,g.company_name,b.date_create,c.product_mat_no,c.product_id,c.product_sale_price,c.product_sale_vat,b.product_qty FROM tb_doc a INNER JOIN tb_order b ON a.doc_id = b.doc_id INNER JOIN tb_product c ON c.product_id = b.product_id INNER JOIN tb_customer e on e.customer_id = b.customer_id INNER JOIN tb_department f on f.department_id = b.department_id INNER JOIN tb_company g on g.company_id = b.company_id WHERE a.doc_id ='$doc_id' GROUP BY c.product_mat_no ORDER BY b.order_id";
        $result = mysqli_query($conn, $sql);
        $listorder = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $totalnovat = $row["product_sale_price"] * $row["product_qty"];
            $totalvat = $row["product_sale_vat"] * $row["product_qty"];
            $vat =   $totalvat - $totalnovat;
            $order = array(
                "order_id" => $row["order_id"],
                "doc_id" => $row["doc_id"],
                "customer_id" => $row["customer_id"],
                "customer_code" => $row["customer_code"],
                "customer_prefix" => $row["customer_prefix"],
                "customer_firstname" => $row["customer_firstname"],
                "customer_lastname" => $row["customer_lastname"],
                "customer_phone" => $row["customer_phone"],
                "department_id" => $row["department_id"],
                "department_name" => $row["department_name"],
                "company_id" => $row["company_id"],
                "company_name" => $row["company_name"],
                "product_id" => $row["product_id"],
                "product_mat_no" => $row["product_mat_no"],
                "product_sale_price" => $row["product_sale_price"],
                "product_sale_vat" => $row["product_sale_vat"],
                "product_qty" => $row["product_qty"],
                "date_create" => $row["date_create"],
                "totalnovat" => $totalnovat,
                "totalvat" => $totalvat,
                "vat" => $vat
            );

            array_push($listorder, $order);
        }
        mysqli_close($conn);
        return $listorder;
    }

    public static function updateorderbyid($listcart)
    {

        include "../config.php";
        $sql = self::generatorsqlupdateorder($listcart);
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $status = true;
        } else {
            $status = false;
        }
        mysqli_close($conn);
        return $status;
    }

    public static function generatorsqlupdateorder($listcart)
    {
        include "../config.php";
        $sql = 'UPDATE tb_order SET product_id = CASE order_id';

        foreach ($listcart as $row) {
            $sql .= ' WHEN ' . $row["orderid"] . ' THEN ' . $row["id"];
        }
        $sql .= " END,product_qty = CASE order_id";

        foreach ($listcart as $row) {
            $sql .= ' WHEN ' . $row["orderid"] . ' THEN ' . $row["qty"];
        }
        $sql .= " END WHERE order_id IN (";
        foreach ($listcart as $row => $key) {
            $num = count($listcart) - 1;

            if ($row == $num) {
                $sql .= $key["orderid"] . ')';
            } else {
                $sql .= $key["orderid"] . ',';
            }
        }

        mysqli_close($conn);
        return $sql;
    }

    public static function insertorderbyid($listcart, $doc_id,  $customer_id, $department_id, $company_id)
    {

        include "../config.php";
        $sql = self::generatorsqlinsertorder($listcart, $doc_id, $customer_id, $department_id, $company_id);
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $status = true;
        } else {
            $status = false;
        }
        mysqli_close($conn);
        return $status;
    }

    public static function generatorsqlinsertorder($listcart, $doc_id, $customer_id, $department_id, $company_id)
    {
        include "../config.php";
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y-m-d h:i:s");
        $lastkey = self::getlastprimarykey() + 1;
        $sql = "INSERT INTO `tb_order`(`order_id`, `doc_id`, `customer_id`, `product_id`, `product_qty`, `department_id`, `company_id`, `date_create`, `order_status`) 
        VALUES ";

        $numpd = count($listcart) - 1;

        foreach ($listcart as $row => $key) {
            $product_id = $key["id"];
            $product_qty = $key["qty"];

            if ($numpd != $row) {
                $sql = $sql . "('$lastkey', '$doc_id', '$customer_id', '$product_id', '$product_qty','$department_id', '$company_id', '$date', 'new'),";
            } else {
                $sql = $sql . "('$lastkey', '$doc_id', '$customer_id', '$product_id', '$product_qty', '$department_id','$company_id', '$date', 'new')";
            }
            $lastkey++;
        }
        mysqli_close($conn);
        return $sql;
    }
}
