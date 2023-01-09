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

        $sql = "SELECT * FROM `tb_company` WHERE tb_company.company_id != 99;";
        $result = mysqli_query($conn, $sql);
        $arr = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $company = new companydetails();
            $company->setCompanyid($row["company_id"]);
            $company->setCompanyName($row["company_name"]);
            array_push($arr, $company);
        }
        return $arr;
    }
    public static function getcompanybyid($id)
    {
        include "../config.php";
        require "../modal/companydetails.php";

        $sql = "SELECT * FROM `tb_company` WHERE company_id = '$id';";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $company = new companydetails();
            $company->setCompanyid($row["company_id"]);
            $company->setCompanyName($row["company_name"]);
            $arr[] = $company;
        }

        return $arr;
    }
    public static function delcompany($id)
    {
        include "../config.php";
        require "../modal/companydetails.php";

        $sql = "DELETE FROM `tb_company` WHERE company_id = '$id';";
        $result = mysqli_query($conn, $sql);
        $status = null;
        if ($result) {
            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }
    public static function updatecompany($id, $company)
    {
        include "../config.php";
        $sql = "UPDATE `tb_company` SET `company_name` = '$company' WHERE `tb_company`.`company_id` = $id;";
        $result = mysqli_query($conn, $sql);
        $status = null;
        if ($result) {
            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }
}
