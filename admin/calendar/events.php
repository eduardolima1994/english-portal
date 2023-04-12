<?php
    
    require('../auth/session.php');
    require('../auth/connection.php');

    $query = "SELECT c.id, c.date, UPPER(CONCAT(u.user, ' - ' , c.title)) AS title, u.color FROM calendar AS c INNER JOIN users AS u ON u.id = c.user_id;";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($line = $result->fetch_assoc()) {
            $array[] = $line;
        }
        echo json_encode($array);
    } else {
        echo "No results found.";
    }

    
?>
