<?php 
include_once("db.php");

if(isset($_POST["edit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $id = $_POST["id"];

    if (!empty($id)) {
        // Prepare the SQL query
        $stmt = $conn->prepare("UPDATE users SET username = ?, password_hash = ? WHERE id = ?");
        $stmt->bind_param("ssi", $username, $password, $id); // s = string, i = integer

        if ($stmt->execute()) {
            echo "Update Successful";
        } else {
            echo "Not Updated: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "ID is missing!";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <header class="d-flex justify-centent-between my-4">
            <h1>Edit info</h1>
        </header>

        <?php 
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            include "db.php";
            $sql = "SELECT * FROM users Where id=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
          ?>
                  <form method="POST">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="username" value="<?php echo $row["username"];?>" placeholder="Username">
            </div>
            <div class="form-element my-4">
                <input type="password" class="form-control" name="password" value="<?php echo $row["password_hash"];?>placeholder="Password">
            </div>
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <div class="form-element my-4">
                <input type="submit" class="btn btn-success" name="edit" value="Save">
            </div>
            <div class="form-element my-4">
                <a href="\CCIT06\user.php" class="btn btn-primary">Back</a>
            </div>
        </form>
          
          <?php
        } 
        ?>
    </div>
</body>
</html>