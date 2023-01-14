<?php
class customerservice
{
    public static function getlastprimarykey()
    {
        include "../config.php";
        $sql = "SELECT MAX(customer_id) as lastkey FROM `tb_customer`";
        $result = mysqli_query($conn, $sql);
        $primarykey = null;
        while ($row = mysqli_fetch_assoc($result)) {
            $primarykey = $row["lastkey"];
        }
        return $primarykey;
    }

    public static function addcustomer($listcustomer)
    {
        include "../config.php";
        $customercode = $listcustomer["customercode"];
        $customerprefix = $listcustomer["customerprefix"];
        $customerfirstname = $listcustomer["customerfirstname"];
        $customerlastname = $listcustomer["customerlastname"];
        // $departmentlist = $listcustomer["departmentlist"];
        // $companylist = $listcustomer["companylist"];
        $date = date("Y-m-d h:i:s");
        $lastkey = self::getlastprimarykey() + 1;
        $sql = "INSERT INTO `tb_customer` (`customer_id`, `customer_code`, `customer_prefix`, `customer_firstname`, `customer_lastname`, `date_create`) VALUES ('$lastkey', '$customercode', '$customerprefix', '$customerfirstname', '$customerlastname', '$date');";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            return  $lastkey;
        } else {
            return  0;
        }
    }
}
