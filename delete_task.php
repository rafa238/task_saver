<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        }
        $_SESSION['message'] = "Task removed succesfully";
        $_SESSION['status'] = "danger";
        header("Location: index.php");
    }
?>