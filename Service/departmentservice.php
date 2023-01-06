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
        return $primarykey;
    }
    public static function getdepartment()
    {
        include "../config.php";
        require "../modal/departmentdetails.php";

        $sql = "SELECT * FROM `tb_department`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $department = new departmentdetails();
            $department->setDepartmentid($row["department_id"]);
            $department->setDepartmentName($row["department_name"]);
            $arr[] = $department;
        }

        return $arr;
    }
    public static function adddepartment($department)
    {
        include "../config.php";
        require "../modal/departmentdetails.php";

        $date = date("Y-d-m");
        $primarykey = self::getlastprimarykey() + 1;
        $sql = "INSERT INTO `tb_department` (`department_id`, `department_name`, `date_create`) VALUES ('$primarykey ', '$department', '$date');";
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
