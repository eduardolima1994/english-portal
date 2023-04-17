<?php
    require('../auth/session.php');
    require('../auth/connection.php');

    $id = $_REQUEST['id'];
    $idEvent = $_REQUEST['idEvent'];

    $query = "SELECT c.id, c.date, u.user, c.title AS title, u.color FROM calendar AS c INNER JOIN users AS u ON u.id = c.user_id WHERE c.id = $idEvent;";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $array = array();
        while ($line = $result->fetch_assoc()) {
            $array[] = $line;
        }
        foreach ($array as $item) {
            echo "<p><b>Id:</b> " . $item['id'] . "</p>";
            echo "<p><b>Date:</b> " . $item['date'] . "</p>";
            echo "<p><b>User:</b> " . $item['user'] . "</p>";
            echo "<p><b>Title:</b> " . $item['title'] . "</p>";
            //echo "<p><b>Color:</b> " . $item['color'] . "</p>";
            echo "<a href='deleteEvent.php?id=$id&idEvent=$idEvent'>Delete</a>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
?>

<title>English Portal - Admin Area - Welcome <?php echo $_SESSION['UsuarioNome']; ?>!</title>
<link rel="shortcut icon" href="../../images/favicon.ico" />