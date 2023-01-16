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
        $sql = "INSERT INTO `tb_order` (`order_id`, `doc_id`, `customer_id`, `product_id`, `department_id`, `company_id`, `date_create`, `order_status`) 
        VALUES ";

        $num = count($listcart) - 1;
        foreach ($listcart as $row => $key) {
            $numorder = $key["num"];
            $pd = $key["id"];
            for ($x = 0; $x < $numorder; $x++) {
                if ($x != $numorder - 1) {
                    $sql = $sql . "('$lastkey', '$keydoc', '$keycustomer', '$pd', '$keydepartment', '$keycompany', '$date', 'new'),";
                } else if ($row == $num) {
                    $sql = $sql . "('$lastkey', '$keydoc', '$keycustomer', '$pd', '$keydepartment', '$keycompany', '$date', 'new')";
                } else {
                    $sql = $sql . "('$lastkey', '$keydoc', '$keycustomer', '$pd', '$keydepartment', '$keycompany', '$date', 'new'),";
                }
                $lastkey++;
            }
        }
        $result = array(
            "sql" => $sql,
            "keydoc" => $keydoc
        );
        return $result;
    }
}
