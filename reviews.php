<?php
require 'db.php'; 

?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    .main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: rgb(6, 6, 6);
        height: 100vh;
    }

    .login,
    .registration {
        border: 2px solid;
        border-radius: 20px;
        margin: 10px;
        padding: 50px;
        width: 500px;
        max-width: 500px;
        background-color: rgb(123, 118, 118);
    }

    .login-form,
    .registration-form {
        margin-top: 30px;
    }

    .registrationForm {
        font-size: 13px;
        margin-top: -15px;
        color: blue;
        text-decoration: underline;
        text-align: center;
        cursor: pointer;
    }

    .content {
        border: 2px solid;
        border-radius: 10px;
        background-color: rgb(240, 240, 240);
        padding: 20px;
        width: 95%px;
        height: 500px;
        margin-top: -50px;
    }

    #editBtn,
    #deleteBtn {
        font-size: 20px;
        width: 30px;
    }
</style>
<?php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit;
}

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// Display content if authenticated
$username = $_SESSION['username'];


?>
<script>
    window.onload = function () {
        if (performance.navigation.type === 2) { // Detects "Back" navigation
            location.reload(); // Forces reload from server
        }
    };
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reviews</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand ml-5" href="dashboard.php">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px; margin-left: 80%;">
                <li class="nav-item dropdown" <?php echo $_SESSION["user_id"]; ?>>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        My Account
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="user.php">Profile</a></li>
                        <li><a class="dropdown-item" href="dashboard.php">Home</a></li>
                        <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                    </ul>
                </li>

            </ul>

        </div>
    </nav>

    <!-- Update Modal -->
    <div class="modal fade mt-5" id="updateUserModal" tabindex="-1" aria-labelledby="updateUser" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateUserModal">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./endpoint/update-user.php" method="POST">
                        <div class="form-group row">
                            <div class="col-6">
                                <input type="text" name="tbl_user_id" id="updateUserID" hidden>
                                <label for="updateFirstName">First Name:</label>
                                <input type="text" class="form-control" id="updateFirstName" name="first_name">
                            </div>
                            <div class="col-6">
                                <label for="updateLastName">Last Name:</label>
                                <input type="text" class="form-control" id="updateLastName" name="last_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-5">
                                <label for="updateContactNumber">Contact Number:</label>
                                <input type="number" class="form-control" id="updateContactNumber" name="contact_number"
                                    maxlength="11">
                            </div>
                            <div class="col-7">
                                <label for="updateEmail">Email:</label>
                                <input type="text" class="form-control" id="updateEmail" name="email">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark login-register form-control">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="main">
        <div class="content">
            <h4>Manage Reviews</h4>
            <hr>
            <table class="table table-hover table-collapse">
                <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                // Assuming you have a mysqli connection in $conn

                $stmt = mysqli_prepare($conn, "SELECT * FROM `tbl_user`");
                $stmt->execute();
                $result = $stmt->get_result(); // Use get_result() for mysqli

                if ($result) {
                while ($row = $result->fetch_assoc()) {
                $userID = $row['tbl_user_id'];
                $firstName = $row['first_name'];
                $lastName = $row['last_name'];
                $contactNumber = $row['contact_number'];
                $email = $row['email'];

                }
                            } else {
                                    echo "Error fetching data: " . mysqli_error($conn);
                                    }
                                ?>

                        <tr>
                            <td id="userID-<?= $userID ?>"><?php echo $userID ?></td>
                            <td id="firstName-<?= $userID ?>"><?php echo $firstName ?></td>
                            <td id="lastName-<?= $userID ?>"><?php echo $lastName ?></td>
                            <td id="contactNumber-<?= $userID ?>"><?php echo $contactNumber ?></td>
                            <td id="email-<?= $userID ?>"><?php echo $email ?></td>
                            <td>
                                <button id="editBtn" onclick="update_user(<?php echo $userID ?>)"
                                    title="Edit">&#9998;</button>
                                <button id="deleteBtn" onclick="delete_user(<?php echo $userID ?>)">&#128465;</button>
                            </td>
                        </tr>

                        <?php

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Update user
        function update_user(id) {
            $("#updateUserModal").modal("show");

            let updateUserID = $("#userID-" + id).text();
            let updateFirstName = $("#firstName-" + id).text();
            let updateLastName = $("#lastName-" + id).text();
            let updateContactNumber = $("#contactNumber-" + id).text();
            let updateEmail = $("#email-" + id).text();

            console.log(updateFirstName);
            console.log(updateLastName);

            $("#updateUserID").val(updateUserID);
            $("#updateFirstName").val(updateFirstName);
            $("#updateLastName").val(updateLastName);
            $("#updateContactNumber").val(updateContactNumber);
            $("#updateEmail").val(updateEmail);

        }

        // Delete user
        function delete_user(id) {
            if (confirm("Do you want to delete this user?")) {
                window.location = "./endpoint/delete-user.php?user=" + id;
            }
        }


    </script>

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>

</html>