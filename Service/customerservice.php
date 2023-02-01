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
        mysqli_close($conn);
        return $primarykey;
    }

    public static function addcustomer($listcustomer)
    {
        include "../config.php";
        $customercode = $listcustomer["customercode"];
        $customergender = $listcustomer["customergender"];
        $customerprefix = $listcustomer["customerprefix"];
        $customerfirstname = $listcustomer["customerfirstname"];
        $customerlastname = $listcustomer["customerlastname"];
        $customerphone = $listcustomer["customerphone"];
        // $departmentlist = $listcustomer["departmentlist"];
        // $companylist = $listcustomer["companylist"];
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y-m-d h:i:s");
        $lastkey = self::getlastprimarykey() + 1;
        $sql = "INSERT INTO `tb_customer` (`customer_id`, `customer_code`, `customer_gender`, `customer_prefix`, `customer_firstname`, `customer_lastname`,`customer_phone`,`date_create`) VALUES ('$lastkey', '$customercode', '$customerprefix', '$customergender', '$customerfirstname', '$customerlastname', '$customerphone','$date');";
        $result = mysqli_query($conn, $sql);
        $status = null;
        if ($result) {
            $status =  $lastkey;
        } else {
            $status =  0;
        }
        mysqli_close($conn);
        return $status;
    }
}
