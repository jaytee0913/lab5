<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jtsai", "thisismysql", "jtsai");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$username = $_POST["temp"];
$query = "SELECT *
          FROM Posts            
          WHERE author_id='$username'";

$result = $mysqli->query($query);
if ($result) {
    echo '<table>';
            echo '<tr>';
            echo '<td>';
            printf ("Post ID");
            echo '</td>';
            echo '<td>';
            printf("Content");
            echo '</td>';
            echo '</tr>';
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>';
            printf ($row["post_id"]);
            echo '</td>';
            echo '<td>';
            printf($row["content"]);
            echo '</td>';
            echo '</tr>';
    }    
    echo '</table>';
}
/* free result set */
$result->free();

/* close connection */
$mysqli->close();
?>