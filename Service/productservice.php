<?php



class productservice
{

    public static function getlastprimarykey()
    {
        include "../config.php";
        $sql = "";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            
        }
        
    }
}
