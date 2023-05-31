<?php
require_once '../services/product.service.php';
require_once '../services/cart.service.php';

session_start();

$product = getProductById($_GET['productId']);

$Message = '';

if (isset($_POST) && isset($_POST['quantity'])) {
    $Message = addToCart($product->ProductId, $_POST['quantity']);
    // header('Location: shop.php?addedToCart=true');
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

    <title>Laptops website</title>

    <!--Bootstrap 5.2 style link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

    <style>
        /* Hide the number input spinner controls */
        #quantityGroup input[type="number"]::-webkit-inner-spin-button,
        #quantityGroup input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        #quantityGroup input[type="number"] {
            -moz-appearance: textfield;
            /* Firefox */
        }
    </style>

</head>

<body class="sub_page">

    <div class="hero_area">

        <!-- header section strats -->
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
                            <li class="nav-item">
                                <a class="nav-link fw-bolder text-muted" href="home.php">Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bolder text-muted" href="shop.php"> Shop </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link fw-bolder text-primary" href="contact.php">Contact Us <span class="sr-only">(current)</span> </a>
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
                                <?php
                                if (isset($_SESSION['admin']))
                                    echo 'admin page '
                                ?>
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

    <section class="p-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box ms-5">
                        <img src=<?php echo $product->thumbnail ?> class="img-thumbnail" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form_container">
                        <div>
                            <h2 class="text-primary mb-5 text-center display-5 fw-bolder">
                                <?php echo $product->productName; ?>
                            </h2>
                        </div>
                        <form method="post">
                            <div>
                                <h3 class="mb-5">
                                    <?php echo $product->description; ?>
                                </h3>
                            </div>
                            <div>
                                <h4 class="mb-5">
                                    <?php echo $product->price . '$'; ?>
                                </h4>
                            </div>
                            <label for="quantityGroup">Quantity</label><br />
                            <div id="quantityGroup" class="btn-group mb-5" role="group" aria-label="Basic example">
                                <button type="button" id="reduce" onclick="quantityChange('reduce')" class="btn btn-primary">-</button>
                                <input type="number" name="quantity" id="quantity" style="width: 50px;" class="form-control text-center" min="1" value="1" />
                                <button type="button" id="add" onclick="quantityChange('add')" class="btn btn-primary">+</button>
                            </div>
                            <div class="text-white">
                                <button type="submit" class="btn btn-primary">
                                    Add to Cart
                                </button>
                            </div>
                            <?php echo $Message; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->
    <br>
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

    <script>
        const quantityChange = (action) => {
            let quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);

            switch (action) {
                case 'add':
                    quantityInput.value = currentValue + 1;
                    break;
                case 'reduce':
                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                    } else console.log('You can\'t add 0 items');
                    break;
            }
        }
    </script>
</body>

</html>