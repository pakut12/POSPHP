<?php

class companyservice
{

    public static function getlastprimarykey()
    {
        include "../config.php";
        $sql = "SELECT MAX(company_id) as lastkey FROM `tb_company`";
        $result = mysqli_query($conn, $sql);
        $primarykey = null;
        while ($row = mysqli_fetch_assoc($result)) {
            $primarykey = $row["lastkey"];
        }
        return $primarykey;
    }

    public static function addcompany($company)
    {
        include "../config.php";
        $primarykey = self::getlastprimarykey() + 1;
        $sql = "INSERT INTO `tb_company` (`company_id`, `company_name`) VALUES ('$primarykey', '$company');";
        $result = mysqli_query($conn, $sql);
        $status = null;
        if ($result) {
            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }

    public static function getcompany()
    {
        include "../config.php";
        require "../modal/companydetails.php";
        $primarykey = self::getlastprimarykey() + 1;
        $sql = "SELECT * FROM `tb_company`";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $company = new companydetails();
            $company->setCompanyid($row["company_id"]);
            $company->setCompanyName($row["company_name"]);
            $arr[] = $company;
        }
        return $arr;
    }
}
