<?php

include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $message = "";
  
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);
  $cart_data = json_decode($cookie_data, true);

  // button minus
  if(isset($_POST['btnMinus'])) {
    foreach($cart_data as $keys => $values) {
      if($cart_data[$keys]['id'] == $_POST['id']) {
        if($cart_data[$keys]['order_qty'] == 1){
          unset($cart_data[$keys]);
          $message = "Item removed successfully!";
        } else {
          $cart_data[$keys]['order_qty'] -= 1;
          $cart_data[$keys]['subtotal'] -= $cart_data[$keys]['price_per'];
          $message = "Item updated successfully!";
        }
      }
    }

    $item_data = json_encode($cart_data);
    setcookie('shopping_cart', $item_data, time() + (86400 * 30));
  }

  // button plus
  if(isset($_POST['btnPlus'])) {
    foreach($cart_data as $keys => $values) {
      if($cart_data[$keys]['id'] == $_POST['id']) {
        $cart_data[$keys]['order_qty'] += 1;
        $cart_data[$keys]['subtotal'] += $cart_data[$keys]['price_per'];
      }
    }

    $item_data = json_encode($cart_data);
    setcookie('shopping_cart', $item_data, time() + (86400 * 30));
    $message = "Item updated successfully!";
  }

  // button remove
  if(isset($_POST['removeItem'])) {
    foreach($cart_data as $keys => $values) {
      if($cart_data[$keys]['id'] == $_POST['id']) {
        unset($cart_data[$keys]);
        $item_data = json_encode($cart_data);
        setcookie('shopping_cart', $item_data, time() + (86400 * 30));
        $message = "Item removed successfully!";
      }
    }
  }

  header("Refresh:0; url=cart.php?message=".$message."");
}
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

        <div class="d-flex justify-content-center">
          <h2 class="fw-light mb-5 mx-2">Shopping Cart</h2>
          <h2><i class="fw-light fas fa-angle-right mb-5 mx-2 cart-text-muted d-none d-md-inline"></i></h2>
          <h2 class="fw-light mb-5 mx-2 cart-text-muted d-none d-md-inline">Checkout</h2>
          <h2><i class="fw-light fas fa-angle-right mb-5 mx-2 cart-text-muted d-none d-md-inline"></i></h2>
          <h2 class="fw-light mb-5 mx-2 cart-text-muted d-none d-md-inline">Order Complete</h2>
        </div>

        <div class="col-12 col-lg-8 mb-4">

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
          $total_price = 0.0;
          if(isset($_COOKIE['shopping_cart'])) {
            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
            $cart_data = json_decode($cookie_data, true);
            if(!empty($cart_data)) {
              foreach($cart_data as $keys => $values){
                $total_price += $values['subtotal'];
          ?>
          <div class="row mb-2">
            <div class="col-8 col-md-6">
              <div class="row">
                <div class="col-4">
                  <img src="product_img/<?php echo htmlspecialchars($values['image_name']); ?>" alt="" class="img-thumbnail">
                </div>
                <div class="col-8">
                  <div class="ms-2">
                    <h6 class="fw-light"><?php echo htmlspecialchars($values['title']); ?></h6>
                    <p><span class="d-md-none"><?php echo htmlspecialchars($values['order_qty']); ?>× </span><strong>RM <?php echo htmlspecialchars($values['price_per']); ?></strong></p>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="col-4 col-md-3">
              <div class="d-flex">
                <form method="post" class="d-flex">
                  <input type="hidden" name="id" value="<?php echo htmlspecialchars($values['id']); ?>">
                  <button type="submit" name="btnMinus" class="btnQtyControl"><i class="far qty-control fa-minus-square hover-red"></i></button>
                  <input id="qtyInput" type="number" value="<?php echo htmlspecialchars($values['order_qty']); ?>" class="form-control qty-input" name="order_qty" readonly required>
                  <button type="submit" name="btnPlus" class="btnQtyControl"><i class="far qty-control fa-plus-square hover-red"></i></button>
                </form>
              </div>
              <div class="text-center d-md-none mx-auto mt-4">
                <button type="button" class="btnRemoveCartItem"><i class="far fa-trash-alt hover-red"></i></button>
              </div>
            </div>
            <div class="col-2 d-none d-md-inline">
              <strong><p>RM <?php echo number_format(htmlspecialchars($values['subtotal']), 2); ?></p></strong>
            </div>
            <div class="col-1 d-none d-md-inline">
              <form method="post" class="d-flex">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($values['id']); ?>">
                <button type="submit" name="removeItem" class="btnRemoveCartItem"><i class="far fa-trash-alt hover-red"></i></button>
              </form>
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
          <button class="btn btn-maroon" onclick="location.href='shop.php';"><i class="fas fa-arrow-left"></i> Continue Shopping</button>
        </div>

        <div class="col-12 col-lg-4 bg-light">

          <p class="fw-bold text-muted pb-3">CART TOTALS</p>
          <hr style="height: 3px;">

          <div class="d-flex justify-content-between">
            <p class="text-muted">Subtotal</p>
            <div class="text-end">
              <strong><p>RM <?php echo number_format($total_price, 2); ?></p></strong>
            </div>
          </div>
          <hr>

          <div class="d-flex justify-content-between">
            <p class="text-muted">Shipping Fee</p>
            <div class="text-end">
              <strong><p>RM 8.00</p></strong>
            </div>
          </div>
          <hr>

          <div class="d-flex justify-content-between">
            <p class="text-muted">Total</p>
            <div class="text-end">
              <h5>RM <?php echo number_format($total_price + 8.00, 2); ?></h5>
            </div>
          </div>
          <hr style="height: 3px;">

          <button class="btn btn-orange p-3 w-100 fs-5" onclick="location.href='checkout.php';">Proceed to Checkout</button>

        </div>

      </div>

    </div>

  </section>
  
  <hr>
  

  <!-- Toast -->
  <div id="toast" class="toast align-items-center text-white bg-maroon border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        <!-- Toast message here -->
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
  <!-- End of Toast -->


  <!-- Footer -->
  <div id="footer"></div>
  <!-- End of Footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    $("#footer").load("footer.php"); 
    $("#navbar").load("navbar.php");
    
    function showToast(msg){
      var toast = new bootstrap.Toast($('#toast'));
      $('.toast-body').html(msg);
      toast.show();
    }

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

      <?php if(isset($_GET['message'])){ ?>
        var message = "<?php echo $_GET['message']; ?>";
        if(!(message == "")) {
          showToast(message);
        }
      <?php
      }
      ?>
      
    });
  </script>
</body>
</html>