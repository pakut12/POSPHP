<?php

class docservice
{

    public static function getlastprimarykey()
    {
        include "../config.php";
        $sql = "SELECT MAX(doc_id) as lastkey FROM `tb_doc`";
        $result = mysqli_query($conn, $sql);
        $primarykey = null;
        while ($row = mysqli_fetch_assoc($result)) {
            $primarykey = $row["lastkey"];
        }
        return $primarykey;
    }

    public static function adddoc()
    {
        include "../config.php";
        $date = date("Y-m-d");
        $lastkey =  self::getlastprimarykey() + 1;
        $sql = "INSERT INTO `tb_doc` (`doc_id`, `date_create`) VALUES ('$lastkey', ' $date')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            return $lastkey;
        } else {
            return 0;
        }
    }
}
