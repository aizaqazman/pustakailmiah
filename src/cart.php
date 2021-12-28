<?php

include 'dbconn.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <link rel="stylesheet" href="shop.css">
  <title>Pustaka Ilmiah</title>
</head>
<body>

  <!-- Navbar -->
  <div id="navbar"></div>
  <!-- End of Navbar -->

  <section class="min-vh-100 p-3">

    <div class="container">

      <div class="row">

        <h1 class="text-bold mb-5">Your Cart</h1>

        <div class="col-12 col-lg-8">

          <div class="row">
            <div class="col-8 col-md-6">
              <p class="fw-bold text-muted">ITEM</p>
            </div>
            <div class="col-4 col-md-3">
              <p class="fw-bold text-muted">QUANTITY</p>
            </div>
            <div class="col-3 d-none d-md-inline">
              <p class="fw-bold text-muted">SUBTOTAL</p>
            </div>
          </div>

          <hr style="height: 3px;">
          
          <?php
          if(isset($_COOKIE['shopping_cart'])) {
            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
            $cart_data = json_decode($cookie_data, true);
            if(!empty($cart_data)) {
              foreach($cart_data as $keys => $values){
          //       echo htmlspecialchars($values['id'])."<br>";
          //       echo htmlspecialchars($values['title'])."<br>";
          //       echo htmlspecialchars($values['price_per'])."<br>";
          //       echo htmlspecialchars($values['order_qty'])."<br>";
          //       echo htmlspecialchars($values['total_price'])."<br>";
          //       echo htmlspecialchars($values['image_name'])."<br>";
          //       echo "<hr>";
          ?>
          <div class="row mb-2">
            <div class="col-8 col-md-6">
              <div class="d-flex">
                <img src="product_img/<?php echo htmlspecialchars($values['image_name']); ?>" alt="" class="img-thumbnail cart-item-img">
                <div class="ms-2">
                  <h4 class="fw-light"><?php echo htmlspecialchars($values['title']); ?></h4>
                  <p><span class="d-md-none"><?php echo htmlspecialchars($values['order_qty']); ?>x </span><strong>RM <?php echo htmlspecialchars($values['price_per']); ?></strong></p>
                </div>
              </div>
            </div>
            <div class="col-4 col-md-3">
              <div class="d-flex">
                <button type="button" id="btnMinus" class="btnQtyControl"><i class="far qty-control fa-minus-square"></i></button>
                <input id="qtyInput" type="number" value="<?php echo htmlspecialchars($values['order_qty']); ?>" class="form-control qty-input" name="order_qty" readonly required>
                <button type="button" id="btnPlus" class="btnQtyControl"><i class="far qty-control fa-plus-square"></i></button>
              </div>
              <div class="text-center d-md-none mx-auto mt-4">
                <button type="button" class="btnRemoveCartItem"><i class="far fa-trash-alt hover-red"></i></button>
              </div>
            </div>
            <div class="col-2 d-none d-md-inline">
              <strong><p>RM <?php echo number_format(htmlspecialchars($values['subtotal']), 2); ?></p></strong>
            </div>
            <div class="col-1 d-none d-md-inline">
              <button type="button" class="btnRemoveCartItem"><i class="far fa-trash-alt hover-red"></i></button>
            </div>
          </div>
          <hr>
          <?php
              }
            } else {
              echo "<p class='text-danger'>There is no item in cart</p>";
            }
          } else {
            echo "<p class='text-danger'>There is no item in cart</p>";
          }
          ?>
        </div>

        <div class="col-12 col-lg-4 bg-light">

          
        </div>

      </div>

    </div>

  </section>
  
  <hr>

  <!-- Footer -->
  <div id="footer"></div>
  <!-- End of Footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    $("#footer").load("footer.php"); 
    $("#navbar").load("navbar.php");

    $(document).ready(function () {
      $(".card").hover(
        function () {
          $(this).addClass("card-hover");
          console.log('hover');
        },
        function () {
          $(this).removeClass("card-hover");
          console.log('end-hover');
        }
      );
    });
  </script>
</body>
</html>