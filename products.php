<?php
session_start();

include("connection.php");
include("./functions/functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>All Products</title>
  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />

  <!-- styles css -->
  <link rel="stylesheet" href="./public/styles.css" />
</head>

<body>
  <!-- navbar start -->
  <nav class="navbar">
    <div class="nav-center">
      <!-- links -->
      <div>
        <button class="toggle-nav">
          <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-links">
          <li class="nav-link">
            <h3><?php echo $user_data["username"]; ?></h3>
          </li>
          <li>
            <a href="index.php" class="nav-link">
              Home
            </a>
          </li>
          <li>
            <a href="products.php" class="nav-link">
              Products
            </a>
          </li>
          <li>
            <a href="about.html" class="nav-link">
              About
            </a>
          </li>
          <li>
            <a href="./logout.php" class="nav-link">
              logout
            </a>
          </li>
        </ul>
      </div>
      <!-- logo -->
      <!-- <img src="./images/logo.png" width="250px" class="nav-logo" alt="logo" /> -->
      <!-- cart icon -->
      <div class="toggle-container">
        <button class="toggle-cart">
          <i class="fas fa-shopping-cart"></i>
        </button>
        <span class="cart-item-count">7</span>
      </div>
    </div>
  </nav>
  <!-- navbar end -->
  <!-- hero -->
  <section class="page-hero">
    <div class="section-center">
      <h3 class="page-hero-title">Home / Products</h3>
    </div>
  </section>
  <!-- sidebar -->
  <div class="sidebar-overlay">
    <aside class="sidebar">
      <!-- close -->
      <button class="sidebar-close">
        <i class="fas fa-times"></i>
      </button>
      <!-- links -->
      <ul class="sidebar-links">
        <li>
          <h3>
            <center> <?php echo $user_data["username"]; ?></center>
          </h3>
          <a href="index.php" class="sidebar-link">
            <i class="fas fa-home fa-fw"></i>
            home
          </a>
        </li>
        <li>
          <a href="products.php" class="sidebar-link">
            <i class="fas fa-couch fa-fw"></i>
            products
          </a>
        </li>
        <li>
          <a href="about.html" class="sidebar-link">
            <i class="fas fa-book fa-fw"></i>
            about
          </a>
        </li>
        <li>
          <a href="./logout.php" class="sidebar-link">
            <i class="fas fa-sign-out-alt"></i>
            logout
          </a>
        </li>
      </ul>
    </aside>
  </div>
  <!-- cart -->
  <div class="cart-overlay">
    <aside class="cart">
      <button class="cart-close">
        <i class="fas fa-times"></i>
      </button>
      <header>
        <h3 class="text-slanted">your bag</h3>
      </header>
      <!-- cart items -->
      <div class="cart-items"></div>
      <!-- footer -->
      <footer>
        <h3 class="cart-total text-slanted">
          total : $12.99
        </h3>
        <button class="cart-checkout btn">checkout</button>
      </footer>
    </aside>
  </div>
  <!-- products -->
  <section class="products">
    <!-- filters -->
    <div class="filters">
      <div class="filters-container">
        <!-- search -->
        <form class="input-form">
          <input type="text" class="search-input" placeholder="search..." />
        </form>
        <!-- categories -->
        <h4>Company</h4>
        <article class="companies">
          <button class="company-btn">all</button>
          <button class="company-btn">ikea</button>
        </article>
        <!-- price -->
        <h4>Price</h4>
        <form class="price-form">
          <input type="range" class="price-filter" min="0" value="" max="" />
        </form>
        <p class="price-value"></p>
      </div>
    </div>
    <!-- products -->
    <div class="products-container"></div>
  </section>
  <!-- page loading -->
  <div class="page-loading">
    <h2>Loading...</h2>
  </div>
  <script type="module" src="./public/src/pages/products.js"></script>
</body>

</html>