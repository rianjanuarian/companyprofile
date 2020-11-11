<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- StyleSheet -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/toko.css" />
  <!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Shopping Cart Project</title>
  
</head>

<body>
  <!-- Navigation -->
  
  <nav class="nav">
    <div class="nav__center container">
      <div class="nav__logo">
        <h1>KENTANG<span>SHOP</span></h1>
      </div>
      <div class="home__icon">
          <h2>home</h2>
          
        </div>
      <ul class="nav__list">
     
        <div class="cart__icon">
          <h2>cart</h2>
          <span class="item__total">0</span>
        </div>

        
      </ul>

      <font color="white">WELCOME HOME MOTHERFUCKER : <?php echo $this->session->userdata('nama'); ?></font> 
     <button type="button" class="btn btn-danger" ><a href="<?=base_url('home/logout')?>">Logout</a></button>
    
      <div class="hamburger">
        <svg>
          <use xlink:href="<?php echo base_url() ?>assets/user/images/sprite.svg#icon-menu"></use>
        </svg>
      </div>
    </div>
  </nav>
  <!-- Navigation -->

  <!-- Products -->
  <section class="products">
    <div class="product__center">
      <!-- Single Product -->
      <!-- <div class="product">
        <div class="image__container">
          <img src="./images/product-1.jpg" alt="" />
        </div>
        <div class="product__footer">
          <h1>The Original Super Donut</h1>
          <div class="rating">
            <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-star-full"></use>
              </svg>
            </span>
            <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-star-full"></use>
              </svg>
            </span>
            <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-star-full"></use>
              </svg>
            </span>
            <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-star-full"></use>
              </svg>
            </span>
            <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
              </svg>
            </span>
          </div>
          <div class="bottom">
            <div class="btn__group">
              <a href="#" class="btn addToCart">Add to Cart</a>
              <a href="#" class="btn view">View</a>
            </div>
            <div class="price">$255.99</div>
          </div>
        </div>
      </div> -->
      <!-- End of Single Product -->
    </div>
  </section>

  <section class="cart__overlay">
    <div class="cart">
      <span class="close__cart">
        <svg>
          <use xlink:href="<?php echo base_url() ?>assets/user/images/sprite.svg#icon-cross"></use>
        </svg>
      </span>
      <h1>Your Cart</h1>
      <div class="cart__centent">
        <!-- Cart Item -->
        <!-- <div class="cart__item">
          <img src="./images/product-1.jpg" alt="">
          <div>
            <h3>The Original Super Donut</h3>
            <h3 class="price">$750</h3>
          </div>
          <div>
            <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-angle-up"></use>
              </svg>
            </span>
            <p>3</p>
            <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-angle-down"></use>
              </svg>
            </span>
          </div>

          <div>
            <span class="remove__item">
              <svg>
                <use xlink:href="./images/sprite.svg#icon-trash"></use>
              </svg>
            </span>
          </div>
        </div> -->
      </div>

      <div class="cart__footer">
        <h3>Total: $ <span class="cart__total">0</span></h3>
        <button class="clear__cart btn">Clear Cart</button>
      </div>
    </div>
  </section>

  <script src="<?php echo base_url() ?>assets/user/js/toko.js"></script>
</body>

</html>

<!-- jQuery and JS bundle w/ Popper.js -->
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>