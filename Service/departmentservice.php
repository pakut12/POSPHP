<?php

class departmentservice
{

    public static function getlastprimarykey()
    {
        include "../config.php";
        $sql = "SELECT MAX(department_id) as lastkey FROM `tb_department`";
        $result = mysqli_query($conn, $sql);
        $primarykey = null;
        while ($row = mysqli_fetch_assoc($result)) {
            $primarykey = $row["lastkey"];
        }
        mysqli_close($conn);
        return $primarykey;
    }

    public static function deldepartment($id)
    {
        include "../config.php";
        $sql = "DELETE FROM `tb_department`WHERE department_id = '$id'";
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
    public static function getdepartmentbycompanyid($id)
    {
        include "../config.php";
        require "../modal/departmentdetails.php";
        $sql = "SELECT * FROM tb_department a INNER JOIN tb_company b ON a.company_id = b.company_id WHERE a.company_id = '$id' and a.department_id != 99";
        $result = mysqli_query($conn, $sql);
        $listdepartment = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $list = array(
                "department_id" => $row["department_id"],
                "department_name" => $row["department_name"],
                "company_name" => $row["company_name"],
            );
            array_push($listdepartment, $list);
        }

        mysqli_close($conn);
        return $listdepartment;
    }

    public static function getdepartmentbyid($id)
    {
        include "../config.php";
        require "../modal/departmentdetails.php";
        $sql = "SELECT * FROM tb_department a INNER JOIN tb_company b ON a.company_id = b.company_id WHERE a.department_id = '$id' and a.department_id != 99";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $department = new departmentdetails();
            $department->setDepartmentid($row["department_id"]);
            $department->setDepartmentName($row["department_name"]);
            $department->setcompany_id($row["company_name"]);
            $arr[] = $department;
        }

        mysqli_close($conn);
        return $arr;
    }

    public static function updatedepartment($id, $department)
    {
        include "../config.php";
        $sql = "UPDATE `tb_department` SET `department_name` = '$department' WHERE `tb_department`.`department_id` = $id;";
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

    public static function getdepartment()
    {
        include "../config.php";
        require "../modal/departmentdetails.php";
        $arr = [];
        $sql = 'SELECT * FROM tb_department a INNER JOIN tb_company b ON a.company_id = b.company_id WHERE a.department_id != 99';
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $department = new departmentdetails();
            $department->setDepartmentid($row["department_id"]);
            $department->setDepartmentName($row["department_name"]);
            $department->setcompany_id($row["company_name"]);
            array_push($arr, $department);
        }
        mysqli_close($conn);
        return $arr;
    }

    public static function adddepartment($department, $company)
    {
        include "../config.php";
        require "../modal/departmentdetails.php";
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y-m-d h:i:s");
        $primarykey = self::getlastprimarykey() + 1;
        $sql = "INSERT INTO `tb_department` (`department_id`, `department_name`, `company_id`, `date_create`) VALUES ('$primarykey ', '$department','$company', '$date');";
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
