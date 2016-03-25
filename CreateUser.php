<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jtsai", "thisismysql", "jtsai");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$query = "SELECT user_id FROM Users";
$username = $_POST["user_id"];
$validUsername = true;
$result = $mysqli->query($query);
if ($result) {
    
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        if($row["user_id"] == $username)
        {
        	$validUsername = false;
        	echo "Username already used!";
        }
    }
    
   

    
}

 if($validUsername == true)
{
    $sql="INSERT INTO Users(user_id) VALUES ('$username')";
    if($mysqli->query($sql) == TRUE)
    {
        echo "New record created";
    }

}
/* free result set */
    $result->free();

/* close connection */
$mysqli->close();
?>