<?php

include 'dbconn.php';

$total_price = 0.0;
$item_array = array();
if(isset($_COOKIE['shopping_cart'])) {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);
  $cart_data = json_decode($cookie_data, true);
  if(!empty($cart_data)) {
    foreach($cart_data as $keys => $values){
      $total_price += $values['subtotal'];
      $id_qty_array = array(
        'id'        => mysqli_real_escape_string($conn, $values['id']),
        'order_qty' => mysqli_real_escape_string($conn, $values['order_qty']),
      );
      $item_array[] = $id_qty_array;
    }
  } else {
    header("Location: cart.php");
    die();
    exit();
  }
} else {
  header("Location: cart.php");
  die();
  exit();
}

$id_array = array();
foreach($item_array as $keys => $values){
  $id_array[] = $values['id'];
}

$in = str_repeat('?,', count($id_array) - 1) . '?';
$types = str_repeat('i', count($id_array));
$stmt = $conn -> prepare('SELECT * FROM `products` WHERE `id` IN ( '.$in.' )');
$stmt->bind_param($types, ...$id_array);
$stmt -> execute();
$result = $stmt -> get_result();
$stmt -> close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


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
          <a href="cart.php" class="text-decoration-none text-black hover-red">
            <h2 class="fw-light mb-5 mx-2 d-none d-md-inline">Shopping Cart</h2>
          </a>
          <h2><i class="fw-light fas fa-angle-right mb-5 mx-2 d-none d-md-inline"></i></h2>
          <h2 class="fw-light mb-5 mx-2">Checkout</h2>
          <h2><i class="fw-light fas fa-angle-right mb-5 mx-2 cart-text-muted d-none d-md-inline"></i></h2>
          <h2 class="fw-light mb-5 mx-2 cart-text-muted d-none d-md-inline">Order Complete</h2>
        </div>

        <div class="col-12 col-lg-8 mb-4">

          <p class="fw-bold fs-5">BILLING DETAILS</p>
          <hr>

          <div class="bg-light p-3">
            <form id="checkoutForm" class="row g-3 needs-validation" action="checkout-process" method="post" novalidate>
              <div class="col-md-6">
                <label for="validationFirstName" class="form-label">First name</label>
                <input type="text" class="form-control" id="validationFirstName" name="first_name" required>
                <div class="invalid-feedback">
                  Please enter a first name.
                </div>
              </div>
              <div class="col-md-6">
                <label for="validationLastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="validationLastName" name="last_name" required>
                <div class="invalid-feedback">
                  Please enter a last name.
                </div>
              </div>
              <div class="col-md-12">
                <label for="validationFirstName" class="form-label">Company name(optional)</label>
                <input type="text" class="form-control" id="validationFirstName" name="first_name">
                <div class="invalid-feedback">
                  Please enter a company name.
                </div>
              </div>
              <div class="col-md-4">
                <label for="phone_number" class="form-label">Phone number</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone-alt"></i></span>
                  <input type="tel" class="form-control" id="phone_number" aria-describedby="inputGroupPrepend" name="phone_number" required>
                  <div class="invalid-feedback phone">
                    Please provide a valid phone number.
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <label for="validationEmail" class="form-label">Email</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend"><i class="far fa-envelope"></i></span>
                  <input type="email" class="form-control" id="validationEmail" aria-describedby="inputGroupPrepend" name="email" required>
                  <div class="invalid-feedback">
                    Please provide a valid email.
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label for="validationAddress1" class="form-label">Address 1</label>
                <input type="text" class="form-control" id="validationAddress1" name="address1" required>
                <div class="invalid-feedback">
                  Please provide an address
                </div>
              </div>
              <div class="col-md-6">
                <label for="validationAddress2" class="form-label">Address 2</label>
                <input type="text" class="form-control" id="validationAddress2" name="address2">
                <div class="invalid-feedback">
                  Please provide an address
                </div>
              </div>
              <div class="col-md-6">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state" required>
                <div class="invalid-feedback">
                  Please provide a state.
                </div>
              </div>
              <div class="col-md-3">
                <label for="validationState" class="form-label">State</label>
                <select class="form-select" id="validationState" name="state" required>
                  <option selected disabled value="">Choose...</option>
                  <option value="Johor">Johor</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Kuala Lumpur">Kuala Lumpur</option>
                  <option value="Labuan">Labuan</option>
                  <option value="Melaka">Melaka</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Penang">Penang</option>
                  <option value="Perak">Perak</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Putrajaya">Putrajaya</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                  <option value="Selangor">Selangor</option>
                  <option value="Terengganu">Terengganu</option>
                </select>
                <div class="invalid-feedback">
                  Please select a state.
                </div>
              </div>
              <div class="col-md-3">
                <label for="zip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" required>
                <div class="invalid-feedback">
                  Please provide a valid zip.
                </div>
              </div>
              <div class="col-md-12">
                <label for="orderNotes" class="form-label">Order Notes(optional)</label>
                <textarea type="text" class="form-control" id="orderNotes" name="orderNotes"></textarea>
                <div class="invalid-feedback">
                  Please provide a valid zip.
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="yes" id="invalidCheck" name="agree_terms_conditions" required>
                  <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                  </label>
                  <div class="invalid-feedback">
                    You must agree before submitting.
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>

        <div class="col-12 col-lg-4 border p-3">

          <p class="fw-bold fs-5">ORDER SUMMARY</p>

          <div class="d-flex justify-content-between p-0 m-0">
            <p class="fw-bold text-muted mb-2">Product</p>
            <p class="fw-bold text-muted mb-2">Subtotal</p>
          </div>
          <hr class="p-0 m-0" style="height: 2px;">

          <?php
          while($row = $result -> fetch_assoc()){
          ?>
          <div class="row py-1">
            <div class="col-8">
              <p class="text-muted"><?php echo $row['title']; ?> <span class="fw-bold">×1</span></p>
            </div>
            <div class="col-4 text-end">
              <strong><p>RM <?php echo number_format($row['price'], 2); ?></p></strong>
            </div>
          </div>
          <hr class="p-0 m-0" style="height: 0.1px;">
          <?php
          }
          ?>

          <div class="d-flex justify-content-between py-3">
            <p class="fw-bold">Subtotal</p>
            <div class="text-end">
              <strong><p>RM <?php //echo number_format($total_price, 2); ?></p></strong>
            </div>
          </div>
          <hr class="p-0 m-0" style="height: 0.1px;">

          <div class="d-flex justify-content-between py-3">
            <p class="fw-bold">Shipping Fee</p>
            <div class="text-end">
              <strong><p>RM 8.00</p></strong>
            </div>
          </div>
          <hr class="p-0 m-0" style="height: 3px;">

          <div class="d-flex justify-content-between py-1">
            <p class="fw-bold">Total</p>
            <div class="text-end">
              <h5>RM <?php //echo number_format($total_price + 8.00, 2); ?></h5>
            </div>
          </div>
          <hr class="p-0 m-0 mb-3" style="height: 3px;">

          <button class="btn btn-orange p-2 w-100 fs-5" form="checkoutForm">Place Order</button>

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

      // form validation
      $('.needs-validation').on('submit', function(e) {
        if (!this.checkValidity()) {
          e.preventDefault();
          e.stopPropagation();
        }
        
        const phone_number = $('#phone_number');
        if(isNaN(phone_number.val()) || phone_number.val().length < 10) {
          phone_number.get(0).setCustomValidity("Invalid field.");
          e.preventDefault();
          e.stopPropagation();
        } else {
          phone_number.get(0).setCustomValidity("");
        }

        const zip = $('#zip');
        if(isNaN(zip.val()) || zip.val().length < 5) {
          zip.get(0).setCustomValidity("Invalid field.");
          e.preventDefault();
          e.stopPropagation();
        } else {
          zip.get(0).setCustomValidity("");
        }

        $(this).addClass('was-validated');
      });
      
    });
  </script>
</body>
</html>