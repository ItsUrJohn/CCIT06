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
      <?php

      if(isset($_SESSION['status'])) 
      {  ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong> Bossing!!</strong> <?php echo $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      <?php 
        unset($_SESSION['status']);
      }
      ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ab915c1825.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="image/img.jpg" alt="Logo" height="50  px">
      </a>
      <!--Toggle btn-->
      <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!--Side Bar-->
      <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

      <!--sideBar header-->
        <div class="offcanvas-header text-white border-bottom">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!--Sidebar Body-->
        <div class="offcanvas-body d-flex flex-column flex-lg-row p-4 p-lg-0">
          <ul class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-5 pe-1">
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#services">Articles</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#portfolio">Pictures</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#reviews">Reviews</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#faq">FAQ</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#footer">Contact</a>
            </li>
          </ul>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px; margin-left: 80%;">
                <li class="nav-item dropdown" <?php echo $_SESSION["user_id"]; ?>>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        My Account
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="user.php">Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        </div>
      </div>
    </div>
  </nav>
  <!--Banner-->
    <div id="banner" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-light">
                    <h1>Naruto Shippuden</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eligendi sed quaerat perferendis deleniti veritatis ullam, neque omnis quidem tempora?</p>
                    <a href="#about" class="btn btn-brand">Please Click Here!</a>
                </div>
            </div>
        </div>
    </div> 

    <!-- ABOUT SECTION-->
    <div id="about">
       <div class="container">
        <div class="row">
          <div class="about-col-1">
            <img src="image/team7.jpg">
          </div>
          <div class="about-col-2">
            <h1 class="sub-title">About Naruto Shippuden</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore dolores mollitia fugit architecto consequatur animi facere nobis? Tempora dolorem, officiis similique, sint maiores, saepe fugiat nostrum voluptate magnam officia perspiciatis?</p>

            <div class="tab-titles">
              <p class="tab-links active-link" onclick="opentab('training1')">Sakura</p>
              <p class="tab-links" onclick="opentab('training2')">Sasuke</p>
              <p class="tab-links" onclick="opentab('training3')">Naruto</p>
            </div>
            <div class="tab-contents active-tab" id="training1">
              <ul>
                <li><span>UNKNOWN</span><br>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</br></li>
              </ul>
            </div>
            <div class="tab-contents" id="training2">
              <ul>
                <li><span>UNKNOWN</span><br>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</br></li>
              </ul>
            </div>
            <div class="tab-contents" id="training3">
              <ul>
                <li><span>UNKNOWN</span><br>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</br></li>
              </ul>
            </div>
          </div>
        </div>
       </div>
    </div> 
<!--SERVICES-->
    <div id="services">
        <div class="container">
          <h1 class="sub-title text-center">Articles</h1>
            <div class="services-list">
              <div>
                <i class="fa-regular fa-newspaper"></i>
                <h2>Lorem ipsum.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, animi?</p>
                <a href="#portfolio">Click Here</a>
              </div>
              <div>
                <i class="fa-regular fa-newspaper"></i>
                <h2>Lorem ipsum.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, animi?</p>
                <a href="#portfolio">Click Here</a>
              </div>
              <div>
                <i class="fa-regular fa-newspaper"></i>
                <h2>Lorem ipsum.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, animi?</p>
                <a href="#portfolio">Click Here</a>
              </div>
            </div>   
        </div> 
       </div> 
<!--CTA-->
      <div id="cta" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-light">
                  <h1>Naruto Shippuden</h1>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eligendi sed quaerat perferendis deleniti veritatis ullam, neque omnis quidem tempora?</p>
                    <a href="#about" class="btn btn-brand">Please Click Here!</a>
                </div>
            </div>
        </div>
      </div> 
<!-- Prize-->
    <div id="portfolio">
      <div class="container">
        <h1 class="sub-title text-center" href="#">PICTURES</h1>
        <div class="work-list">
          <div class="work">
            <img src="image/naruto1.jpg">
            <div class="layer">
              <a href="image/naruto1.jpg">View Picture</a>
            </div>
          </div>
          <div class="work">
            <img src="image/naruto2.jpg">
            <div class="layer">
              <a href="image/naruto2.jpg">View Picture</a>
            </div>
          </div>
          <div class="work">
            <img src="image/naruto3.jpg">
            <div class="layer">
              <a href="image/naruto3.jpg">View Picture</a>
            </div>
          </div>
        </div>
      </div>
    </div>
<!--CTA-->
    <div id="ctaa" class="d-flex align-items-center">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-light">
                <h1>Naruto Shippuden</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eligendi sed quaerat perferendis deleniti veritatis ullam, neque omnis quidem tempora?</p>
                  <a href="#about" class="btn btn-brand">Please Click Here!</a>
              </div>
          </div>
      </div>
    </div>
<!--Reviews-->
 <section id="reviews">
    <div class="container">
      <div class="text-center">
        <h2>REVIEWS</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, enim.</p>
      </div>
      <?php
        require 'db.php'; 

        ?>
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
      
        .main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: rgb(6, 6, 6);
        height: 100vh;
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
      .content h4{
        text-align: center;
        font-size: 3em;
      }

        #editBtn,
        #deleteBtn {
        font-size: 20px;
        width: 30px;
      }
      </style>
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
  </div>
  </section>
  <!--CTA-->
  <div id="ctaaa" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-light">
              <h1>Naruto Shippuden</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eligendi sed quaerat perferendis deleniti veritatis ullam, neque omnis quidem tempora?</p>
                <a href="#about" class="btn btn-brand">Please Click Here!</a>
            </div>
        </div>
    </div>
  </div>

  <!--Accordium-->
    <section id="faq">
     <div class="faq-section">
      <div class="container text-center">
        <h2>FAQ</h2>
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Accordion Item #1
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Accordion Item #2
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Accordion Item #3
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
            </div>
          </div>
        </div>
       </div>
      </div>
    </section>
   <!-- FOOTER-->
    <footer class="footer text-white" id="footer">
      <div class="container">
          <div class="row al">
              <div class="col-md-3 col-sm-6 text-lg-start text-center">
                  <a class="navbar-brand" href="#">
                      <img src="image/img.jpg" alt="Logo" height="60px">
                  </a>
                  <h5 class="mt-4">About Us</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.</p>
              </div>
              <div class="col-md-3 col-sm-6 text-lg-start ps-lg-5 ps-0 text-center ">
                  <h5>Services</h5>
                  <ul class="list-unstyled">
                      <li><a href="#">HOME</a></li>
                      <li><a href="#about">ABOUT</a></li>
                      <li><a href="#services">ARTICLES</a></li>
                      <li><a href="#portfolio">PICTURE</a></li>
                      <li><a href="#reviews">REVIEWS</a></li>
                      <li><a href="#faq">FAQ</a></li>
                  </ul>
              </div>
              <div class="col-md-3 col-sm-6 text-lg-start text-center">
                  <h5>Contact Us</h5>
                  <p>123 Street Name,<br>City, Country</p>
                  <p>Email: example@example.com<br>Phone: +1234567890</p>
              </div>
              <div class="col-md-3 col-sm-6 text-lg-start  text-center">
                  <h5>Newsletter</h5>
                  <form>
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" style="border-radius: 1px;" placeholder="Email"
                              aria-label="email" aria-describedby="button-addon2">
                          <button class="btn btn-outline-light" type="button" id="button-addon2">Send</button>
                      </div>
                  </form>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
              </div>
          </div>
      </div>
  </footer> 
  <script>
    var tablinks = document.getElementsByClassName("tab-links");
    var tabcontents = document.getElementsByClassName("tab-contents");

    function opentab(tabname){
      for(tablink of tablinks){
        tablink.classList.remove("active-link");
      }
      for(tabcontent of tabcontents){
        tabcontent.classList.remove("active-tab");
      }
      event.currentTarget.classList.add("active-link");
      document.getElementById(tabname).classList.add("active-tab");
    }
  </script>
  <!-- Bootstrap Js -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>

</html>