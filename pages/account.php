<?php
require_once '../services/user.service.php';

session_start();

if (isset($_SESSION) && isset($_SESSION['user']))
  $user = getUserById($_SESSION['user']);
else (header('Location: home.php'));

if (array_key_exists('logout', $_POST)) {
  session_destroy();
  header("Refresh:0");
}   
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <!--Bootstrap 5.2 links-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <title>Laptops website</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="../css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">
  <!-- header section -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="home.php">
          <span>
            Laptops website
          </span>
        </a>
        <?php
        if (isset($_SESSION['name']))
          echo 'Welcome ' . $_SESSION['name'];
        ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link fw-bolder" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bolder" href="shop.php"> Shop </a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bolder" href="contact.php">Contact Us</a>
            </li>
          </ul>

          <?php
          if (isset($_SESSION['name']))
            echo '
            <form method="post">
            <button class="btn btn-primary" type="submit" name="logout" value="logout">Logout</button>
            </form>
            '
          ?>

          <div class="user_option-box">
            <a href="login.php">
              <i class="fa fa-user" aria-hidden="true"></i>
            </a>
            <div class="dropstart">
              <button type="button" class="bg-transparent border-0 ml-3" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
              </button>
              <ul class="dropdown-menu">
                <li><span class="dropdown-item-text">No Items Available</span></li>
                <li><a class="dropdown-item" href="#">First Item</a></li>
                <li><a class="dropdown-item" href="#">Second Item</a></li>
                <li><a class="dropdown-item" href="#">Third Item</a></li>
              </ul>
            </div>
            <a href="">
              <i class="fa fa-search" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!-- end header section -->

  </div>

  <!-- contact section -->

  <section class="contact_section layout_padding p-5">
    <div class="container">
      <div class="form_container">
        <div class="text-center text-primary">
          <h2 class="display-5 fw-bolder mb-2 mt-0">
            Account
          </h2>
        </div>
        <form method="post">
          <div class="row">
            <div class="col">
              <img src="../uploads/Thumbnails/sony-vaio-2.jpg" width="360px" height="480px" class="rounded float-left" alt="...">
            </div>
            <div class="col">
              <label for="first">First Name</label>
              <input name="firstName" id="first" type="text" placeholder="*First Name" value=<?php echo $user->firstName ?> disabled />
            </div>
            <div class="col">
              <label for="first">Last Name</label>
              <input name="lastName" type="text" placeholder="*Last Name" value=<?php echo $user->lastName ?> disabled />
            </div>
          </div>
          </div>
          <div class="row">
            
            
          <div>
            <label for="first">Email</label>
            <input name="email" type="email" placeholder="*Email" value=<?php echo $user->email ?> disabled />
          </div>
          <div>
            <label for="first">Phone Number</label>
            <input name="phoneNumber" type="text" placeholder="*Phone Number" value=<?php echo $user->phoneNumber ?> disabled />
          </div>
          <div class="row">
            <div class="col">
              <label for="first">Birthday</label>
              <input name="birthday" type="date" min="1920-02-02" value=<?php echo $user->birthday ?> disabled />
            </div>
            <div class="col pb-2 text-center">
              <input type="radio" class="btn-check" name="gender" id="option1" value="M" disabled>
              <label class="btn btn-primary" for="option1">Male</label>
              <input type="radio" class="btn-check" name="gender" id="option2" value="F" disabled>
              <label class="btn btn-primary" for="option2">Female</label>
              <span>(Select your Gender)</span>
            </div>
          </div>
          <div class="text-center">
            <button class="btn btn-primary btn-lg bg-primary border border-primary">
              Edit
            </button>
            <button type="submit" class="btn btn-primary btn-lg bg-primary border border-primary" disabled>
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- end contact section -->

  <!-- footer section -->
  <footer class="footer_section bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-6 footer-col text-center">
          <div class="footer_detail">
            <h4>
              About
            </h4>
            <p>
              Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
            </p>
            <div class="footer_social justify-content-center">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 footer-col text-center">
          <div class="footer_contact">
            <h4>
              Reach at..
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Laptops website</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="../js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="../js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script src="../js/custom.js"></script>

</body>

</html>