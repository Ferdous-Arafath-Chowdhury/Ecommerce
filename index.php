<?php
session_start(); 
include("assets/includes/db.php");
include("assets/functions/products.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <title>Multivendor E-commerce</title>
</head>
<body>

    <div class="topbar">
        <div class="row">
            <div class="col-lg-5">
              <div class="button">
                <a href="" class="btn btn-success btn-sm"> Guest</a>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="topmenu">
                <ul>
                  <li><a href="login.php">Login<span>&nbsp;|</span></a></li>
                  <li><a href="#">Register <span>|</span></a></li>
                  <li><a href="#">My Account <span>|</span></a></li>
                  <li><a href="busireq.html">Become A Vendor<span>|</span></a></li>
                  <li><a href="adminlogin.html">Admin?<span>|</span></a></li>
                  <li><a href="suggest_product.php">Suggest Product<span>|</span></a></li>
                  <li><a href="#">Contact</a></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
    </div>

    <div class="nav">
        <a href="#" class="logo">Online Store</a>

        <nav class="navbar">
            <a href="#">Home</a>
            <a href="#">Products</a>
            <a href="#">Categories</a>
            <a href="#">Sale</a>
            <a href="#">About</a>

        </nav>

        <table>
          <tr>
            <td><input type="text" placeholder="Search..."></td>
            <td><i class="fas fa-search ic"></i></td>
          </tr>
          
        </table>

        <div class="icons">
          <a href="#" class="fas fa-heart"></a>
          <a href="" class="fas fa-shopping-cart"></a>
        </div>

    </div>

    <section class="home">
      <div class="slide-container active">
        <div class="slide">
          <div class="content">
            <span>Men Watch</span>
            <h3>Men Watch</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            <a href="" class="buy-btn">Buy Now</a>
          </div>
          <div class="img">
            <img src="assets/images/img2.jpg" alt="" class="watch">
          </div>
        </div>
        </div>

        <div class="slide-container">
          <div class="slide">
            <div class="content">
              <span>Men Watch</span>
              <h3>Men Watch</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
              <a href="" class="buy-btn">Buy Now</a>
            </div>
            <div class="img">
              <img src="assets/images/img3.jpg" alt="" class="watch">
            </div>
          </div>
          </div>

          <div class="slide-container">
            <div class="slide">
              <div class="content">
                <span>Men Watch</span>
                <h3>Men Watch</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                <a href="" class="buy-btn">Buy Now</a>
              </div>
              <div class="img">
                <img src="assets/images/img4.jpg" alt="" class="watch"> 
              </div>
            </div>
            </div>

            <div id="previous" class="fas fa-chevron-left" onclick="prev()"></div>
            <div id="next" class=" fas fa-chevron-right" onclick="next()"></div>
    </section>


    <h1 class="heading"> Latest <span>Products</span> </h1>

      <!-- Product section -->
        <div class="container" id="content">
          <div class="row">
              <?php
                getProducts();
              ?>
          </div>

        </div>


    <section class="service">

      <div class="box-container">
  
          <div class="box">
              <i class="fas fa-shipping-fast"></i>
              <h3>Fast Delivery</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, fugit.</p>
          </div>
  
          <div class="box">
              <i class="fas fa-undo"></i>
              <h3>10 days Replacements</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, fugit.</p>
          </div>
  
          <div class="box">
              <i class="fas fa-headset"></i>
              <h3>24 x 7 Support</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, fugit.</p>
          </div>
  
      </div>
  
  </section>



  <?php
  include("assets/includes/footer.php");
  ?>