<?php

class materialservice
{

    public static function getlastprimarykey()
    {
        include "../config.php";
        $sql = "SELECT MAX(material_id) as lastkey FROM `tb_material`";
        $result = mysqli_query($conn, $sql);
        $primarykey = null;
        while ($row = mysqli_fetch_assoc($result)) {
            $primarykey = $row["lastkey"];
        }
        mysqli_close($conn);
        return $primarykey;
    }

    public static function addmaterial($material_group, $material_name)
    {
        include "../config.php";
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y-m-d h:i:s");
        $lastkey =  self::getlastprimarykey() + 1;
        $sql = "INSERT INTO `tb_material`(`material_id`, `material_name`, `material_group`,`date_create`) VALUES ('$lastkey','$material_name','$material_group','$date')";
        $result = mysqli_query($conn, $sql);
        $status = "";
        if ($result) {
            $status = true;
        } else {
            $status = false;
        }
        mysqli_close($conn);
        return $status;
    }

    public static function getmaterial()
    {
        include "../config.php";
        $sql = "SELECT * FROM `tb_material` WHERE material_id != 99";
        $result = mysqli_query($conn, $sql);
        $listmaterial = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $list = array(
                "material_id" => $row["material_id"],
                "material_name" => $row["material_name"],
                "material_group" => $row["material_group"],
                "date_create" => $row["date_create"]
            );
            array_push($listmaterial, $list);
        }
        mysqli_close($conn);
        return $listmaterial;
    }

    public static function delmaterial($material_id)
    {
        include "../config.php";

        $sql = "DELETE FROM `tb_material` WHERE material_id = '$material_id'";
        $result = mysqli_query($conn, $sql);
        $status = "";
        if ($result) {
            $status = true;
        } else {
            $status = false;
        }
        mysqli_close($conn);
        return $status;
    }

    public static function updatematerial($material_id, $material_name, $material_group)
    {
        $material_id = $_POST["material_id"];
        $material_name = $_POST["material_name"];
        $material_group = $_POST["material_group"];

        include "../config.php";
        $sql = "UPDATE tb_material SET material_name = '$material_name',material_group = '$material_group' WHERE material_id = '$material_id'";
        $result = mysqli_query($conn, $sql);
        $status = "";
        if ($result) {
            $status = true;
        } else {
            $status = false;
        }
        mysqli_close($conn);
        return $status;
    }
}
