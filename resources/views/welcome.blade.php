<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopify Co.</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: auto;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
        }

        .logo-container {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
        }

        .logo {
            width: 100%;
            height: auto;
        }

        nav ul {
            display: inline;
            line-height: 40px;
            margin-right: 20px;
        }

        nav ul li {
            display: inline;
            line-height: 40px;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        nav {
            display: inline;
            line-height: 40px;
            height: 50px;
        }

        /* Hero Section Styles */
#hero {
    background-image: url('https://cwpwp2.betterthanpaper.com/wp-content/uploads/2020/04/10-Advantages-of-Online-Shopping.jpg');
    background-size: cover;
    background-position: center;
    padding: 100px 0;
    text-align: center;
    color: #100d0d;
    height: 60vh;
}

/* Larger text styles */
#hero h2 {
    font-size: 56px; /* Adjust size as needed */
    margin-bottom: 20px; /* Add some spacing between title and description */
    animation: moveLetters 2s infinite alternate; /* Add animation for moving letters */
}

#hero p {
    font-size: 34px; /* Adjust size as needed */
    margin-bottom: 40px; /* Add some spacing between description and button */
}

/* Define animation for moving letters */
@keyframes moveLetters {
    0% {
        letter-spacing: normal; /* Start with normal letter spacing */
    }
    50% {
        letter-spacing: 5px; /* Increase letter spacing in the middle of animation */
    }
    100% {
        letter-spacing: normal; /* Return to normal letter spacing at the end of animation */
    }
}/* Feature Section Styles */
        #features {
            padding: 80px 0;
            text-align: center;
        }

        .feature {
            display: inline-block;
            margin: 0 20px;
        }

        .feature img {
            width: 100px;
            height: 100px;
        }

        /* Testimonials Section Styles */
        /* Testimonials Section Styles */
#testimonials {
    background-color: #596591;
    padding: 80px 0;
    text-align: center;
    width: 100%; /* Make the section full width */
    overflow-x: auto; /* Allow horizontal scrolling if needed */
    white-space: nowrap; /* Prevent wrapping of testimonial blocks */
}

.container {
    max-width: none; /* Remove the maximum width constraint */
}

.testimonial {
    display: inline-block; /* Display testimonials side by side */
    margin-right: 20px; /* Add some spacing between testimonials */
}

.testimonial img {
    width: 200px; /* Adjust image width */
    height: 200px; /* Maintain aspect ratio */
    border-radius: 50%; /* Make the image circular */
}

blockquote {
    font-style: italic;
    margin: 20px 0; /* Add some spacing above and below the blockquote */
}

cite {
    font-weight: bold;
}

        /* Call-to-Action Section Styles */
        #cta {
            padding: 100px 0;
            text-align: center;
            background-color: #333;
            color: #fff;
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        footer nav ul {
            margin-top: 10px;
        }

        footer nav ul li {
            display: inline;
            margin-right: 10px;
        }

        footer nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FF5733;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #FF814A;
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
            <h1>Shopify Co.</h1>
          </div>
        </nav>
      </div>

</header>



<section id="hero" style="position: relative;">
    <div class="container">
        <div style="position: absolute; top: 20px; right: 20px;">
            <a href="{{ route('login') }}" class="btn">Login</a>
            <a href="{{ route('register') }}" class="btn">Register</a>
        </div>
        <h2>Welcome to Shopify Co.</h2>
        <p>Discover amazing products at great prices!</p>
        <a href="#" class="btn">Shop Now</a>
    </div>
</section>

<section id="features">
    <div class="container">
        <h2>Key Features</h2>
        <div class="feature">
            <img src="https://www.numinix.com/images/Fast%20and%20Easy%20Checkout%20for%20Zen%20Cart.png" alt="Feature 1">
            <h3>Easy Checkout</h3>
            <p>Quick and hassle-free payment process.</p>
        </div>
        <div class="feature">
            <img src="https://www.shipmercury.com/getmedia/9548634d-3a6d-4747-a0c1-7efca10f043b/fastest-shipping-method-ss-1609947532-1100x733.jpg" alt="Feature 2">
            <h3>Fast Shipping</h3>
            <p>Get your products delivered in no time.</p>
        </div>
        <!-- Add more feature blocks as needed -->
    </div>
</section>

<section id="testimonials">
    <div class="container">
        <h2>Testimonials</h2>
        <div class="testimonial">
            <img src="https://img.freepik.com/free-photo/portrait-man-having-great-time_23-2149443790.jpg?size=626&ext=jpg&ga=GA1.1.2014620489.1717962090&semt=ais_user" alt="Customer 1">
            <blockquote>"Amazing products and excellent service!"</blockquote>
            <cite>John Doe</cite>
        </div>
        <div class="testimonial">
            <img src="https://img.freepik.com/free-photo/portrait-man-wearing-white-clothes_23-2148910266.jpg?size=626&ext=jpg&ga=GA1.1.2014620489.1717962090&semt=ais_user" alt="Customer 2">
            <blockquote>"Best online shopping experience ever!"</blockquote>
            <cite>Jane Smith</cite>
        </div>
        <!-- Add more testimonial blocks as needed -->
    </div>
</section>

<section id="cta">
    <div class="container">
        <h2>Ready to Start Shopping?</h2>
        <p>Sign up now for exclusive offers and discounts!</p>
        <a href="{{ route('login') }}" class="btn">Sign Up</a>
    </div>
</section>

<footer class="footer-20192">
    <div class="site-section">
        <div class="container">

            <div class="cta d-block d-md-flex align-items-center px-5">
                <div>
                    <<h2 class="mb-0">Ready for a next project?</h2>
                    <h3 class="text-dark">Let's get started!</h3>
                    </div>
                    <div class="ml-auto">
                        <a href="#" class="btn btn-dark rounded-0 py-3 px-5">Contact us</a>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <a href="#" class="footer-logo">Colorlib</a>
                            <p class="copyright">
                                <small>&copy; 2019</small>
                            </p>
                        </div>
                        <div class="col-sm">
                            <h3>Customers</h3>
                            <ul class="list-unstyled links">
                                <li><a href="#">Buyer</a></li>
                                <li><a href="#">Supplier</a></li>
                            </ul>
                        </div>
                        <div class="col-sm">
                            <h3>Company</h3>
                            <ul class="list-unstyled links">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>
                        <div class="col-sm">
                            <h3>Further Information</h3>
                            <ul class="list-unstyled links">
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h3>Follow us</h3>
                            <ul class="list-unstyled social">
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                <li><a href="#"><span class="icon-medium"></span></a></li>
                                <li><a href="#"><span class="icon-paper-plane"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    </div>
                    </footer>

                    <script src="js/jquery-3.3.1.min.js"></script>
                    <script src="js/popper.min.js"></script>
                    <script src="js/bootstrap.min.js"></script>
                    </body>
                    </html>

