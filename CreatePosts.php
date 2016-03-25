<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jtsai", "thisismysql", "jtsai");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$query = "SELECT user_id FROM Users";
$username = $_POST["author_id"];
$post_content = $_POST["post_content"];
$validUsername = false;
$post_id = 0;

$result = $mysqli->query($query);
if ($result) {
    
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        if($row["user_id"] == $username)
        {
            $validUsername = true;
            
        }

    }    
}

$query = "SELECT post_id FROM Posts";
if($result = $mysqli->query($query))
{
    while($row = $result->fetch_assoc())
{
    echo $row["post_id"];
    $post_id = $row["post_id"] +2;
}

}


if($validUsername)
{
    $sql="INSERT INTO Posts(author_id, content, post_id) VALUES ('$username', '$post_content', '$post_id')";
    if($mysqli->query($sql) == TRUE)
    {
        echo "post created";
    }
}



/* free result set */
$result->free();

/* close connection */
$mysqli->close();
?>