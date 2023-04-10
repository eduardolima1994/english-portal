<?php 

    require('../auth/session.php');
    require('../auth/connection.php');

    $id = $_REQUEST['id'];
                        
    $name = $_POST["name"];
    $date = $_POST["date"];

    $query = "INSERT INTO `calendar` (`title`, `date`, `user_id`) VALUES ('$name', '$date', $id)";

    $exec = $conn->query($query);                         
            
    if($exec){            
        echo "1";     
    }
    else{
        echo "0";
    }

?>