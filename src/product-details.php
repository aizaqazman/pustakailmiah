<?php
require 'dbconn.php';
if(empty($_GET)) {
  header("Location: shop.php");
  die();
  exit();
} else {
  $title = mysqli_real_escape_string($conn, $_GET['product']);
  $stmt = $conn -> prepare('SELECT * FROM products WHERE title = ?');
  $stmt -> bind_param('s', $title);
  $stmt -> execute();
  $result = $stmt -> get_result();
  $stmt -> close();
  if(!($result -> num_rows > 0)) {
    header("Location: shop.php");
    die();
    exit();
  } else {
    $row = $result -> fetch_assoc();
  }
}

$stmt = $conn -> prepare('SELECT `category` FROM category WHERE id = ?');
$stmt -> bind_param('s', $row['cat_id']);
$stmt -> execute();
$result_cat = $stmt -> get_result();
$stmt -> close();
$row_cat = $result_cat -> fetch_assoc();
$category_name = $row_cat['category'];

$message = "";
if(isset($_POST['addToCart'])) {
  $success = false;
  if(isset($_COOKIE['shopping_cart'])) {
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
  } else {
    $cart_data = array();
  }

  $id_list = array_column($cart_data, 'id');

  if(in_array($_POST['id'], $id_list)) {
    foreach($cart_data as $keys => $values) {
      if($cart_data[$keys]['id'] == $_POST['id']) {
        $cart_data[$keys]['order_qty'] += mysqli_real_escape_string($conn, $_POST['order_qty']);
        $cart_data[$keys]['subtotal'] += mysqli_real_escape_string($conn, ($_POST['price_per'] * $_POST['order_qty']));
      }
    }
  } else {
    $item_array = array(
      'id'          => mysqli_real_escape_string($conn, $_POST['id']),
      'title'       => mysqli_real_escape_string($conn, $_POST['title']),
      'price_per'   => mysqli_real_escape_string($conn, $_POST['price_per']),
      'order_qty'   => mysqli_real_escape_string($conn, $_POST['order_qty']),
      'subtotal' => mysqli_real_escape_string($conn, ($_POST['price_per'] * $_POST['order_qty'])),
      'image_name'  => mysqli_real_escape_string($conn, $_POST['image_name'])
    );
    $cart_data[] = $item_array;
  }

  $item_data = json_encode($cart_data);
  $success = setcookie('shopping_cart', $item_data, time() + (86400 * 30));

  
  if($success) {
    $message = "x" . $_POST['order_qty'] . " " . $_POST['title'] . " has been successfully added to cart!";
  } else {
    $message = "Something went wrong.";
  }
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

        <div class="col-12 col-lg-6">

          <img class="img-thumbnail w-100 pb-1" src="product_img/<?php echo $row['image_name']; ?>" id="MainImg" alt="">

        </div>

        <div class="col-12 col-lg-6">

          <div class="fw-light text-muted">
            <p class="mt-2"> Home / 
              <a class="text-decoration-none text-black hover-red" href="product-category.php?category=<?php echo $category_name; ?>"><?php echo $category_name; ?></a>
            </p>
          </div>

          <h2 class="display-5"> <?php echo $row['title']; ?> </h2>
          <hr>
          <strong><h2>RM <?php echo $row['price']; ?></h2></strong>
          <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" required>
            <input type="hidden" name="title" value="<?php echo $row['title']; ?>" required>
            <input type="hidden" name="price_per" value="<?php echo $row['price']; ?>" required>
            <input type="hidden" name="image_name" value="<?php echo $row['image_name']; ?>" required>
            <div class="d-flex my-3">
              <button type="button" id="btnMinus" class="btnQtyControl"><i class="far qty-control fa-minus-square"></i></button>
              <input id="qtyInput" type="number" value="1" class="form-control qty-input" name="order_qty" readonly required>
              <button type="button" id="btnPlus" class="btnQtyControl"><i class="far qty-control fa-plus-square"></i></button>
            </div>
            <button class="btn bg-maroon text-white" type="submit" name="addToCart">Add To Cart</button>
          </form>
          
          <hr>
          <h4 class="mt-3 mb-3"> Product Description </h4>
          <p> 
              <?php echo $row['description']; ?>
          </p>

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

      $('#btnPlus').on("click", function() {
        var max = 50;
        var qty = $('#qtyInput').val();
        if(qty == max) {
          $('#qtyInput').val(max);
        } else {
          $('#qtyInput').val(++qty);
        }
      });
      $('#btnMinus').on("click", function() {
        var qty = $('#qtyInput').val();
        if(qty == 1) {
          $('#qtyInput').val(1);
        } else if (qty < 1) {
          $('#qtyInput').val(1);
        } else {
          $('#qtyInput').val(--qty);
        }
      });

      // display toast message
      var message = "<?php echo $message; ?>";
      if(!(message == "")) {
        showToast(message);
      }

    });
  </script>
</body>
</html>