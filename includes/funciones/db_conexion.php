<?php
    $conn = new mysqli('localhost','root','230197','gdlwebcamp');
    if($conn->conect_error){
        echo $error->$conn->conect_error;
    }

?>