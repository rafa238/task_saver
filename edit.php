<?php
    include("db.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task  WHERE  id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
        }
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $query = "UPDATE task SET title = '$title', description= '$description' WHERE id = $id";
        mysqli_query($conn, $query);
        $_SESSION['message'] = "Task updated succesfully";
        $_SESSION['status'] = "warning";
        header("Location: index.php");
    }
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="" method="POST">
                    <div class="form-group">
                            <input type="text" class="form-control mb-4" name="title" id="" placeholder="Update title" value="<?= $title ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control mb-4" placeholder="Update description" ><?= $description ?></textarea>
                    </div>
                    <button type="submit" name="update" class="btn btn-success btn-block">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>