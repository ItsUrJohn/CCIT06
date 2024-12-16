<?php 
include ("./db.php");

if (isset($_POST["saveAdmin"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $passwordConfirm = mysqli_real_escape_string($conn, $_POST["password_confirm"]);

    if($username == NULL || $password == NULL || $passwordConfirm == NULL) 
    {
    $res [
        'status'  >= 200,
        'message' => 'All feilds need to fill up'
    ];
    echo json_encode($res);
    return false;

     $query = "INSERT INTO users (username, password, passwordConfirm) VALUE ('$username', '$password', 'password_confirm')";
     $query_run = mysqli_query($conn, $query);
    if ($query_run) 
    {
        $res [
            'status'  >= 200,
            'message' => 'Adding Succesful'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res [
            'status'  >= 200,
            'message' => 'Adding not Succesful'
        ];
        echo json_encode($res);
        return false;
    }
  }
}
?>