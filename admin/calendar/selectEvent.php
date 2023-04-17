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
            echo "<h3>Class Management</h3>";
            echo "<p><b>Id:</b> " . $item['id'] . "</p>";
            
            $dateTime = $item['date'];
            $date = new DateTime($dateTime);
            $dateTimeFormatted = $date->format('d/m/Y');
            $formattedTime = $date->format('H:i:s');
            
            echo "<p><b>Date:</b> " . $dateTimeFormatted . "</p>";
            echo "<p><b>Entry time:</b> " . $formattedTime . "</p>";
            echo "<p><b>User:</b> " . $item['user'] . "</p>";
            echo "<p><b>Title:</b> " . $item['title'] . "</p>";
            //echo "<p><b>Color:</b> " . $item['color'] . "</p>";
            echo "<a href='deleteEvent.php?id=$id&idEvent=$idEvent'><button type='button'>Delete</button></a>";
            echo "<a href='https://us02web.zoom.us/j/4131437747?pwd=L0JtMkdvdVEyd3IvYzVwUG40aFRmUT09#success'><button type='button'>Meeting</button></a>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
?>

<title>English Portal - Admin Area - Welcome <?php echo $_SESSION['UsuarioNome']; ?>!</title>
<link rel="shortcut icon" href="../../images/favicon.ico" />