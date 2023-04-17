<?php 

    require('../auth/session.php');
    require('../auth/connection.php');

    $idEvent = $_REQUEST['idEvent'];
    $id = $_REQUEST['id'];

    $stmt = $conn->prepare("DELETE FROM calendar WHERE id = ?");
    $stmt->bind_param("i", $idEvent);
    $stmt->execute();
    $stmt->close();

    if ($conn->affected_rows > 0) {            
        echo "1";     
    } else {
        $script = "<script>";
        $script .= "window.close();";
        $script .= "window.opener.location.href = './index.php?id=$id';";
        $script .= "</script>";

        echo $script;
    }

?>
