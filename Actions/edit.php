<?php 
 $conn = mysqli_connect("Localhost","root"  ,"" ,   'ccit06');
?>
<?php   
    $id = $_GET['id'];
    $query = $conn->query("SELECT * FROM users WHERE id = '$id'");

    $data = mysqli_fetch_array($query); ?>
<form method="POST">
    <input type="text" name="username" value="<?php echo $data['username'] ?>" ><br><br>
    <input type="text" name="password" value="<?php echo $data['password'] ?>" ><br> <br>
    <button type="submit" name="btnUpdate">Update</button>
    <?php 
    if( isset( $_POST['btnUpdate'])){
        $username = $_POST['username'];
        $password = $_POST['password_hash'];

        $conn ->query("UPDATE user SET username = '$username',password = 'password' WHERE id = $id");

        echo "Succesfully Update";
    }
    
    ?>
</form>