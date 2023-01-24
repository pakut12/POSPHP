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
        mysqli_close($conn);
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
        mysqli_close($conn);
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
        mysqli_close($conn);
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

        mysqli_close($conn);
        return $arr;
    }
    public static function delcompany($id)
    {
        include "../config.php";
        require "../modal/companydetails.php";
        $sql = array(
            "DELETE FROM `tb_company` WHERE company_id = '$id'",
            "DELETE FROM tb_department WHERE company_id = '$id'"
        );
        $x = 0;
        foreach ($sql as $row) {
            $result = mysqli_query($conn, $row);
            if ($result) {
                $x++;
            }
        }
        if ($x == 2) {
            $status = true;
        } else {
            $status = false;
        }
        mysqli_close($conn);
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
        mysqli_close($conn);
        return $status;
    }
}
