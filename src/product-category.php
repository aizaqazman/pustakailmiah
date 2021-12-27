<?php

include 'dbconn.php';

if(empty($_GET)) {
  header("Location: shop.php");
  die();
  exit();
} 
else if (isset($_GET['category']) && !isset($_GET['orderby'])){
  $category = mysqli_real_escape_string($conn, $_GET['category']);
  $stmt = $conn -> prepare('SELECT * FROM products WHERE cat_id = (SELECT id FROM category WHERE category = ?)');
  $stmt -> bind_param('s', $category);
  $stmt -> execute();
} 
else if (isset($_GET['category']) && isset($_GET['orderby'])){
  $category = mysqli_real_escape_string($conn, $_GET['category']);
  $orderby = mysqli_real_escape_string($conn, $_GET['orderby']);
  // if ($orderby === "popularity") {
  //   $stmt = $conn -> prepare('SELECT * FROM products WHERE cat_id = (SELECT id FROM category WHERE category = ?) ORDER BY popularity DESC');
  //   $stmt -> bind_param('s', $category);
  //   $stmt -> execute();
  // }
  // else if ($orderby === "rating") {
  //   $stmt = $conn -> prepare('SELECT * FROM products WHERE cat_id = (SELECT id FROM category WHERE category = ?) ORDER BY rating DESC');
  //   $stmt -> bind_param('s', $category);
  //   $stmt -> execute();
  // }
  // else if ($orderby === "latest") {
  //   $stmt = $conn -> prepare('SELECT * FROM products WHERE cat_id = (SELECT id FROM category WHERE category = ?) ORDER BY latest DESC');
  //   $stmt -> bind_param('s', $category);
  //   $stmt -> execute();
  // }
  /*else*/ if ($orderby === "price") {
    $stmt = $conn -> prepare('SELECT * FROM products WHERE cat_id = (SELECT id FROM category WHERE category = ?) ORDER BY price ASC');
    $stmt -> bind_param('s', $category);
    $stmt -> execute();
  }
  else if ($orderby === "priceDesc") {
    $stmt = $conn -> prepare('SELECT * FROM products WHERE cat_id = (SELECT id FROM category WHERE category = ?) ORDER BY price DESC');
    $stmt -> bind_param('s', $category);
    $stmt -> execute();
  } else {
    header("Location: product-category.php?category=".$category);
    die();
    exit();
  }
}

$result = $stmt -> get_result();
$stmt -> close();

$stmt = $conn -> prepare('SELECT * FROM `category`');
$stmt -> execute();
$result_category = $stmt -> get_result();
$stmt -> close();
$category_data = array();

while($row = $result_category -> fetch_assoc()) {
  $item_array = array(
    'id'       => $row['id'],
    'category' => $row['category']
  );
  $category_data[] = $item_array;
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

        <div class="col-12 col-lg-4 bg-light">

          <h4 class="text-bold">browse</h4>
          <hr>

          
          <?php
          foreach($category_data as $keys => $values) {
          ?>
            <a href="product-category.php?category=<?php echo $values['category']; ?>" class="text-decoration-none category-link"><?php echo $values['category']; ?></a>
            <hr>
          <?php
          }
          ?>

        </div>

        <div class="col-12 col-lg-8">

          <div class="align-content-start">
          
            <div class="input-group mb-3">
              <form method="get" class="d-flex text-end justify-content-end">
                <input type="hidden" name="category" value="<?php echo $category; ?>">
                <label class="input-group-text" for="inputGroupSelect01">Sort By</label>
                <select onchange="this.form.submit()" name="orderby" class="form-select" id="inputGroupSelect01">
                  <option value="" selected>Default</option>
                  <option value="popularity">Popularity</option>
                  <option value="rating">Average rating</option>
                  <option value="latest">Latest</option>
                  <option value="price" 
                    <?php
                    if(isset($_GET['orderby'])){
                      if($_GET['orderby'] === "price")
                        echo "selected";
                    }
                    ?>
                  >Price: low to high</option>
                  <option value="priceDesc" 
                    <?php
                    if(isset($_GET['orderby'])){
                      if($_GET['orderby'] === "priceDesc")
                        echo "selected";
                    }
                    ?>
                  >Price: high to low</option>
                </select>
              </form>
            </div>

          </div>

          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-3">
            <?php
            if(!($result -> num_rows > 0)) {
              echo "<p class='lead'>No item in this category</p>";
            }
            while($row = $result -> fetch_assoc()) {
              $category_id = $row['cat_id'];
              $category_name = "";

              foreach($category_data as $keys => $values) {
                if($category_id == $values['id']) {
                  $category_name = $values['category'];
                }
              };
            ?>
            <div class="col">
              <div class="card" style="width: 16rem;">
                <a href="product-details.php?product=<?php echo $row['title']; ?>" class="text-decoration-none text-black">
                  <img src="product_img/<?php echo $row['image_name']; ?>" class="card-img-top product-img" alt="...">
                </a>
                <div class="card-body">
                  <p class="text-muted m-0 p-0"><?php echo $category_name ?></p>
                  <a href="product-details.php?product=<?php echo $row['title']; ?>" class="text-decoration-none text-black">
                    <p class="card-text m-0 p-0 product-title"><?php echo $row['title']; ?></p>
                  </a>
                  <strong><p class="card-text m-0 p-0">RM <?php echo $row['price']; ?></p></strong>
                </div>
              </div>
            </div>
            <?php
            }
            ?>  

          </div>

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