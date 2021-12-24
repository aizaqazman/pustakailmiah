<?php

include 'dbconn.php';

$stmt = $conn -> prepare('SELECT * FROM `products`');
$stmt -> execute();
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
          <label class="input-group-text" for="inputGroupSelect01">Options</label>
          <select class="form-select" id="inputGroupSelect01">
            <option selected>Choose...</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
      </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-3">
          <?php
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
              <img src="product_img/<?php echo $row['image_name']; ?>" class="card-img-top product-img" alt="...">
              <div class="card-body">
                <p class="text-muted m-0 p-0"><?php echo $category_name ?></p>
                <p class="card-text m-0 p-0"><?php echo $row['title']; ?></p>
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
  </script>
</body>
</html>