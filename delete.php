<?php
 include("config.php");

 $id = $_GET['id'];

 $sql = "DELETE FROM students WHERE id = $id";
 $result = mysqli_query($db_con , $sql);

 if($result){
    
    

    header("Location: insert.php");

 }


?>