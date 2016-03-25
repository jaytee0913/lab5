<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jtsai", "thisismysql", "jtsai");
printf("User ID:<br>");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$query = "SELECT user_id FROM Users";


$result = $mysqli->query($query);
if ($result) {
    echo '<table>';
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>';
            printf ($row["user_id"]);
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