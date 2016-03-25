<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jtsai", "thisismysql", "jtsai");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

printf("Posts deleted: ");
echo "</br>";
foreach($_POST['deletePost'] as $selected){
            
            $query = "DELETE FROM Posts
                      where post_id='$selected'";
                    
            if ($mysqli->query($query) == TRUE) {
                echo $selected."<br>"; 
               // $result->free();
            }
            //free result set
           
}
        
/*$query = "SELECT post_id FROM Posts";
$result = $mysqli->query($query);
if ($result) {
    if(isset($_POST['submit'])){//to run PHP script on submit
        if(!empty($_POST['deletePost'])){
        // Loop to store and display values of individual checked checkbox.
            foreach($_POST['deletePost'] as $selected){
            echo $selected."</br>";
            }
        }
    }
}
/* free result set */
//$result->free();

/* close connection */
$mysqli->close();
?>