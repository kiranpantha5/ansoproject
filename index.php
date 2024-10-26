<?php
session_start(); // Start the session

// Check if the order was placed
$orderPlaced = isset($_SESSION['order_placed']) ? $_SESSION['order_placed'] : false;

// Clear the session variable after checking
if ($orderPlaced) {
    unset($_SESSION['order_placed']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anso Fashion Store</title>
    <link rel="stylesheet" href="index.css">
    <style>
    .popup {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #28a745;
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none; /* Initially hidden */
        }
    </style>
</head>
<body>

<div class="popup" id="popup">
        <h1>Order Placed Successfully!</h1>
        <p>Your order has been successfully placed. Thank you for your purchase!</p>
    </div>
 <!-- Header Section -->
<header>
    <div class="container">
        <div class="logo">
            <h1>Anso Fashion Store</h1>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="#women">Women</a></li>
                <li><a href="#men">Men</a></li>
                <li><a href="#kids">Kids</a></li>
                <li><a href="#sale">Sale</a></li>
            </ul>
            <div class="menu-toggle" onclick="toggleMenu()"> 
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </div>
</header>


<!-- Hero Section (Women Fashion) -->
<section id="hero">
    <div class="hero-content">
        <h2>Exclusive Fashion for Everyone</h2>
        <p>Explore the latest trends and timeless styles for women, men, and kids at Anso Fashion Store</p>
        <a href="#women" class="cta-button">SHOP NOW</a>
    </div>
</section>


<!-- Women Section -->
<section id="women">
<h2>Women's Fashion</h2>
    <div class="products">
        <div class="product-card">
            <span class="badge">New</span>
            <img src="anarkali-suits-boutique-nepal-au.webp" alt="Stylish Dress">
            <h3>Stylish Dress</h3>
            <p>$49.99</p>
        </div>
        <div class="product-card">
            <span class="badge">Sale</span>
            <img src="women1.jpg" alt="Trendy Top">
            <h3>Trendy Top</h3>
            <p>$29.99</p>
        </div>
        <div class="product-card">
            <span class="badge">Best Seller</span>
            <img src="women2.jpg" alt="Elegant Skirt">
            <h3>Elegant Skirt</h3>
            <p>$39.99</p>
        </div>
        <div class="product-card">
            <span class="badge">New</span>
            <img src="women3.jpg" alt="Stylish Blouse">
            <h3>Stylish Blouse</h3>
            <p>$34.99</p>
        </div>
    </div>
</section>

<!-- Men Section -->
<section id="men">
<h2>Men's Fashion</h2>
    <div class="products">
        <div class="product-card">
            <span class="badge">New</span>
            <img src="men1.jpg" alt="Stylish Dress">
            <h3>Stylish Dress</h3>
            <p>$49.99</p>
        </div>
        <div class="product-card">
            <span class="badge">Sale</span>
            <img src="men2.jpg" alt="Trendy Top">
            <h3>Trendy Top</h3>
            <p>$29.99</p>
        </div>
        <div class="product-card">
            <span class="badge">Best Seller</span>
            <img src="men3.jpg" alt="Elegant Skirt">
            <h3>Elegant Skirt</h3>
            <p>$39.99</p>
        </div>
        <div class="product-card">
            <span class="badge">New</span>
            <img src="men4.jpg" alt="Stylish Blouse">
            <h3>Stylish Blouse</h3>
            <p>$34.99</p>
        </div>
    </div>
</section>

<!-- Kids Section -->
<section id="kids">
   
    <  <h2>Kid's Fashion</h2>
    <div class="products">
        <div class="product-card">
            <span class="badge">New</span>
            <img src="kid1.jpg" alt="Stylish Dress">
            <h3>Stylish Dress</h3>
            <p>$49.99</p>
        </div>
        <div class="product-card">
            <span class="badge">Sale</span>
            <img src="kid2.jpg" alt="Trendy Top">
            <h3>Trendy Top</h3>
            <p>$29.99</p>
        </div>
        <div class="product-card">
            <span class="badge">Best Seller</span>
            <img src="kid3.jpg" alt="Elegant Skirt">
            <h3>Elegant Skirt</h3>
            <p>$39.99</p>
        </div>
        <div class="product-card">
            <span class="badge">New</span>
            <img src="kid4.jpg" alt="Stylish Blouse">
            <h3>Stylish Blouse</h3>
            <p>$34.99</p>
        </div>
    </div>
</section>

<!-- Kids Section -->
<section id="kids">
   
     <h2>GYM Wear</h2>
    <div class="products">
        <div class="product-card">
            <span class="badge">New</span>
            <img src="gym1.jpg" alt="Stylish Dress">
            <h3>Stylish Dress</h3>
            <p>Rs 2000</p>
        </div>
        <div class="product-card">
            <span class="badge">Sale</span>
            <img src="gym2.jpg" alt="Trendy Top">
            <h3>Trendy Top</h3>
            <p>$29.99</p>
        </div>
        <div class="product-card">
            <span class="badge">Best Seller</span>
            <img src="gym3.jpg" alt="Elegant Skirt">
            <h3>Elegant Skirt</h3>
            <p>$39.99</p>
        </div>
        <div class="product-card">
            <span class="badge">New</span>
            <img src="gym4.jpg" alt="Stylish Blouse">
            <h3>Stylish Blouse</h3>
            <p>$34.99</p>
        </div>
    </div>
</section>









<!-- Product Modal -->
<div id="product-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3 id="modal-product-name"></h3>
        <img id="modal-product-image" src="" alt="Product Image" />
        <p id="modal-product-price"></p>
        <button class="add-to-cart">Add to Cart</button>
        <button class="buy-now" onclick="handleBuyNow()">Buy Now</button>
    </div>
</div>











<!-- Login/Sign-Up Modal -->
<!-- Login/Sign-Up Modal -->
<div id="login-modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeLoginModal()">&times;</span>
        <h3 id="login-title">Login</h3>

        <!-- Login Form -->
        <form id="login-form" action="login.php" method="POST">
            <label for="login-username">Username:</label>
            <input type="text" id="login-username" name="username" required>
            <label for="login-password">Password:</label>
            <input type="password" id="login-password" name="password" required>
            <button type="submit">Login</button>
            <span id="login-error" style="color: red; font-size: 0.9em;"></span>
        </form>

       

        <!-- Toggle Text -->
        <p>Don't have an account? <span id="toggle-form" style="color: #ff6b6b; cursor: pointer;">Sign Up</span></p>
    </div>
</div>


  
  

   








    <footer>
        <p>&copy; 2024 Anso Fashion Store. All rights reserved.</p>
    </footer>

    <script src="index.js"></script>

    <script>
    // Show the popup if a receipt was uploaded
    var popup = document.getElementById("popup");
    <?php if ($orderPlaced): ?>
        popup.style.display = "block";

        // Hide the popup after 3 seconds
        setTimeout(function() {
            popup.style.opacity = "0"; // Start fade-out
            // After 0.5 seconds, set display to none
            setTimeout(function() {
                popup.style.display = "none"; // Hide the popup
            }, 500); // Match this duration to the transition duration
        }, 3000); // 3000 milliseconds = 3 seconds
    <?php endif; ?>
</script>

</body>
</html>
