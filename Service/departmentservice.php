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
        $date = date("Y-m-d H:i:s");
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


    public static function uploadfile($file)
    {
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y_m_d_h_i_s");
        $Str_file = explode(".", $file['name']);
        $filename =  $date . "." . $Str_file['1'];
        $target_dir = "../attachfile/uploaddepartment/";

        $target_file = $target_dir .  $filename;

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 2;
        }

        // Check file size
        if ($file["size"] > 500000) {
            $uploadOk = 3;
        }

        // Allow certain file formats
        if ($imageFileType != "xls" && $imageFileType != "xlsx") {
            $uploadOk = 4;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $uploadOk = 5;
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                $uploadOk = $target_file;
            } else {
                $uploadOk = 6;
            }
        }
        return $uploadOk;
    }


    public static function readexcel($file)
    {
        error_reporting(error_reporting() & ~E_NOTICE);
        require('../PHPExcel/PHPExcel.php');

        $objPHPExcel = PHPExcel_IOFactory::load($file);


        // Get the first worksheet from the workbook
        $worksheet = $objPHPExcel->getActiveSheet();
        $n = 0;

        // Read data from the worksheet
        $arr = [];
        foreach ($worksheet->getRowIterator() as $row) {
            if ($n != 0) {

                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
                foreach ($cellIterator as $cell) {
                    array_push($arr, $cell->getValue());
                }
            }
            $n++;
        }
        return $arr;
    }


    public static function generateSQLText($listdepartment, $company)
    {
        include "../config.php";
        $primarykey = self::getlastprimarykey() + 1;
        $date = date("Y-m-d H:i:s");

        $sql = "INSERT INTO `tb_department`(`department_id`, `department_name`, `company_id`, `date_create`) VALUES ";
        for ($n = 0; $n < count($listdepartment); $n++) {
            $department = $listdepartment[$n];
            if ($n + 1 != count($listdepartment)) {
                $sql .= "('$primarykey','$department','$company','$date'),";
            } else {
                $sql .= "('$primarykey','$department','$company','$date')";
            }
            $primarykey++;
        }
        return $sql;
    }

    public static function uploaddepartment($sql)
    {
        include "../config.php";
        $status = null;
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $status = true;
        } else {
            $status = false;
        }

        return $status;
    }
}
