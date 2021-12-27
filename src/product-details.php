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

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link rel="stylesheet" href="product.css">
    <title> Buku </title>
</head>
<body>
    <!-- Navbar -->
  <div id="navbar"></div>
  <!-- End of Navbar -->

    <!-- Product -->
    <section class="container sproduct">
        <div class="row my-5">
            <div class="col-lg-5 col-md-12 col-12">
                <img class="img-fluid w-100 pb-1" src="product_img/<?php echo $row['image_name']; ?>" id="MainImg" alt="">

                <!-- <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="img/Karangan.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="img/Karangan2.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="img/A4white.png" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="img/A4white.png" width="100%" class="small-img" alt="">
                    </div>
                </div> -->
            </div>    

            <div class="col-lg-6 col-md-12 col-12">
                <h5 class="mt-2"> Home / <a class="text-decoration-none text-black hover-red" href="product-category.php?category=<?php echo $category_name; ?>"><?php echo $category_name; ?></a> </h5>
                <h2 class="py-3"> <?php echo $row['title']; ?> </h2>
                <hr>
                <h4> RM <?php echo $row['price']; ?> </h4>
                <input type="number" value="1" class="mb-3"><br>
                <button class="buy-btn"> Add To Cart </button>
                <h4 class="mt-3 mb-3"> Product Description </h4>
                <span> 
                    <?php echo $row['description']; ?>
                </span>
            </div>
        </div>
    </section>
    <!-- End of Product -->
    

    <!-- Related -->
    <section id="related" class="my=5 pb-5">
        <div class="container text-center py-3">
            <h3> Related Products </h3>
            <hr class="mx-auto">
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-2" src="img/Adab.jpg" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <h6 class="p-name"> 400 Adab Komunikasi Di Media Sosial </h6>
                <h5 class="p-price"> RM10.00  </h5>
                <button class="buy-btn"> Buy Now </button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-2" src="img/Essay.jpg" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <h6 class="p-name"> Essay Writing Made Easy SPM (2020) </h6>
                <h5 class="p-price"> RM15.90 </h5>
                <button class="buy-btn"> Buy Now </button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-2" src="img/Rerama.jpg" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <h6 class="p-name"> Filosofi Rerama </h6>
                <h5 class="p-price"> RM28.00 </h5>
                <button class="buy-btn"> Buy Now </button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-2" src="img/Matematik.png" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <h6 class="p-name"> Success KSSM PT3 MATEMATIK TINGKATAN 1, 2 DAN 3 </h6>
                <h5 class="p-price"> RM37.70 </h5>
                <button class="buy-btn"> Buy Now </button>
            </div>
        </div>
        
    </section>
    <!-- End of Related -->


    <!-- Footer -->
  <div id="footer"></div>
  <!-- End of Footer -->

    <!-- JS / Image Selection
    <script>
        var MainImg = document.getElementById('MainImg');
        var smallImg = document.getElementsByClassName('small-img');

        smallImg[0].onclick = function(){
            MainImg.src = smallImg[0].src;
        }
        smallImg[1].onclick = function(){
            MainImg.src = smallImg[1].src;
        }
        smallImg[2].onclick = function(){
            MainImg.src = smallImg[2].src;
        }
        smallImg[3].onclick = function(){
            MainImg.src = smallImg[3].src;
        }
        
    </script> -->

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
    $("#footer").load("footer.php"); 
    $("#navbar").load("navbar.php");
  </script>
</body>
</html>
