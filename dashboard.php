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

  if (isset($_SESSION['status'])) { ?>
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
        <img src="image/logo.png" alt="Logo" height="50  px">
      </a>
      <!--Toggle btn-->
      <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!--Side Bar-->
      <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">

        <!--sideBar header-->
        <div class="offcanvas-header text-white border-bottom">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
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
              <a class="nav-link" href="reviews/view_post.php">Reviews</a>
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
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
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
          <h1>Crossfire</h1>
          <p>The world has change drastically since the dawn of the melinium. Natiopns and organizations have started
            walking down the raod to self-preservation with the impending signs of resource and global warming</p>
          <a href="https://cfph.onstove.com/GameInfo?gameInfoCategory=102#mercenary" class="btn btn-brand">Please Click
            Here!</a>
        </div>
      </div>
    </div>
  </div>

  <!-- ABOUT SECTION-->
  <div id="about">
    <div class="container">
      <div class="row">
        <div class="about-col-1">
          <img src="image/about.png">
        </div>
        <div class="about-col-2">
          <h1 class="sub-title">Crossfire</h1>
          <p>The world has changed drastically since the dawn of the new millennium. Nations and organizations have
            started walking down the road of self-preservation with the impending signs of resource scarcity and global
            warming while anarchists and terrorists are able to run wild in areas outside life interests of the world's
            super powers. Disgruntled with this "new world order" many soldiers from the world's leading special forces
            founded the mercenary corporation: "Global Risk". This organization stands to uphold peace and combat
            terrorism around the world to prevent the world from falling into chaos. The only wars they participate in
            are those with justifiable and moral causes, regardless of how much they get paid; almost as to atone for
            the atrocities they have committed while serving the world's super powers. The Global Risk Corporation's
            main clients are developing countries that don't have regular armies where terrorism runs rampant.</p>

          <div class="tab-titles">
            <p class="tab-links active-link" onclick="opentab('training1')">Global Risk</p>
            <p class="tab-links" onclick="opentab('training2')">Black List</p>
            <p class="tab-links" onclick="opentab('training3')">Synopsis</p>
          </div>
          <div class="tab-contents active-tab" id="training1">
            <ul>
              <li><span>Global Risk</span><br>Global Risk is a mercenary group founded by former SAS member Lord
                Alexandro. Soon after its founding, American entrepreneur Michael Norman structured the organization
                into a corporation in order to make it self-sufficient.</br></li>
            </ul>
          </div>
          <div class="tab-contents" id="training2">
            <ul>
              <li><span>Black List</span><br>Black List is a mercenary organization which mainly performs special
                operations for terrorist groups and rebel armies. The origins of this organization are unknown but they
                have claimed responsibility of the gravest terrorist attacks since the start of the new millennium.</br>
              </li>
            </ul>
          </div>
          <div class="tab-contents" id="training3">
            <ul>
              <li><span>Synopsis</span><br>The world has changed drastically since the dawn of the new millennium.
                Nations and organizations have started walking down the road of self-preservation with the impending
                signs of resource scarcity and global warming while anarchists and terrorists are able to run wild in
                areas</br></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--SERVICES-->
  <div id="services">
    <div class="container">
      <h1 class="sub-title text-center">Services</h1>
      <div class="services-list">
        <div>
          <i class="fa-regular fa-newspaper"></i>
          <h2>Gaming</h2>
          <p>Crossfire is a video game that was released in the Philippines in 2009.</p>
          <a href="https://crossfirefps.fandom.com/wiki/CF_Philippines">More Info</a>
        </div>
        <div>
          <i class="fa-regular fa-newspaper"></i>
          <h2>Membership</h2>
          <p> Crossfire Philippines offers membership services through STOVE</p>
          <a href="https://crossfirefps.fandom.com/wiki/CF_Philippines">More info</a>
        </div>
        <div>
          <i class="fa-regular fa-newspaper"></i>
          <h2>Video uploads</h2>
          <p>STOVE's board features allow users to upload videos</p>
          <a href="https://crossfirefps.fandom.com/wiki/CF_Philippines">More Info</a>
        </div>
      </div>
    </div>
  </div>
  <!--CTA-->
  <div id="cta" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-light">
          <h1>Crossfire</h1>
          <p>The world has change drastically since the dawn of the melinium. Natiopns and organizations have started
            walking down the raod to self-preservation with the impending signs of resource and global warming</p>
          <a href="https://cfph.onstove.com/GameInfo?gameInfoCategory=102#mercenary" class="btn btn-brand">Please Click
            Here!</a>
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
          <img src="image/Phantom.png">
          <div class="layer">
            <a href="image/Phantom.png">View Picture</a>
          </div>
        </div>
        <div class="work">
          <img src="image/Switcher.jpg">
          <div class="layer">
            <a href="image/Switcher.jpg">View Picture</a>
          </div>
        </div>
        <div class="work">
          <img src="image/Viper.jpg">
          <div class="layer">
            <a href="image/Viper.jpg">View Picture</a>
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
          <h1>Crossfire</h1>
          <p>The world has change drastically since the dawn of the melinium. Natiopns and organizations have started
          walking down the raod to self-preservation with the impending signs of resource and global warming</p>
          <a href="https://cfph.onstove.com/GameInfo?gameInfoCategory=102#mercenary" class="btn btn-brand">Please Click Here!</a>
        </div>
      </div>
    </div>
  </div>
  <!--Accordium-->
  <section id="faq">
    <div class="faq-section">
      <div class="container text-center">
      <h1 class="sub-title text-center" href="#">FAQ</h1>
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed text-bg-dark " type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Accordion Item #1
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                <code>.accordion-flush</code> class. This is the first item's accordion body.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed text-bg-dark" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Accordion Item #2
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being
                filled with some actual content.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed text-bg-dark" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Accordion Item #3
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting
                happening here in terms of content, but just filling up the space to make it look, at least at first
                glance, a bit more representative of how this would look in a real-world application.
              </div>
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
            <img src="image/logo.png" alt="Logo" height="60px">
          </a>
          <h5 class="mt-4">About Us</h5>
          <p></p>
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
              <input type="text" class="form-control" style="border-radius: 1px;" placeholder="Email" aria-label="email"
                aria-describedby="button-addon2">
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

    function opentab(tabname) {
      for (tablink of tablinks) {
        tablink.classList.remove("active-link");
      }
      for (tabcontent of tabcontents) {
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