<?php
    $conn = new mysqli('us-cdbr-east-05.cleardb.net','b187e08f963753','857a3412','heroku_a472bce0c8e09b9');
    //$conn = new mysqli('localhost','root','230197','gdlwebcamp');
    if($conn->conect_error){
        echo $error->$conn->conect_error;
    }

?>