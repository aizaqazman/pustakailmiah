<html>
      <?php include("config.php"); ?>
    <head>
      <meta charset="UTF-8">
      <title>category2</title>
      <link rel="stylesheet" href="style.css">
      <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    </head>
    <body>

    <!--div class="wrapper">
        <div class="sidebar">
            <ul>
              <li><a href="#"><i class=""></i>Ain Maisarah</a></li>
              <li><a href="#"><i class=""></i>Bestseller Agama</a></li>
              <li><a href="#"><i class=""></i>Icon</a></li>
              <li><a href="#"><i class=""></i>Jemputan Haji</a></li>
              <li><a href="#"><i class=""></i>Kelab Penulis Muda</a></li>
              <li><a href="#"><i class=""></i>Keluarga</a></li>
              <li><a href="#"><i class=""></i>Komik M</a></li>
              <li><a href="#"><i class=""></i>Motivasi Umum</a></li>
              <li><a href="#"><i class=""></i>Novel Islamik</a></li>
              <li><a href="#"><i class=""></i>Novel Sejarah</a></li>
              <li><a href="#"><i class=""></i>Pustaka Ilmiah</a></li>
              <li><a href="#"><i class=""></i>Raikan Kasih Rasulullah</a></li>
              <li><a href="#"><i class=""></i>Resepi</a></li>
            </ul> 
        </div>
    </div-->

    <!-- blog -->
    <section class = "blog" id = "blog">
      <div class = "container">
        <div class = "blog-content">
          <!-- item -->
          <div class = "blog-item">
              <img src = "img/nota_UPKK.jpg" alt = "">
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=11";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
              <p><?php 
                        $sql = "SELECT title,price FROM products WHERE id=17";
                        $query = mysqli_query($conn,$sql);
                        $r = mysqli_fetch_assoc($query);

                        echo $r['title'];?></p>
                        <span><?php echo "RM".$r['price'];?></span>
                

            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "blog-item">
            <div class = "blog-img">
              <img src = "img/icon.jpg" alt = "">
            </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=3";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p><?php 
                        $sql = "SELECT title,price FROM products WHERE id=3";
                        $query = mysqli_query($conn,$sql);
                        $r = mysqli_fetch_assoc($query);

                        echo $r['title'];?></p>
                        <span><?php echo "RM".$r['price'];?></span>  
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "blog-item">
            <div class = "blog-img">
              <img src = "img/pada_suatu_hari.jpg" alt = "">
            </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=11";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p> <?php 
                        $sql = "SELECT title,price FROM products WHERE id=18";
                        $query = mysqli_query($conn,$sql);
                        $r = mysqli_fetch_assoc($query);

                        echo $r['title'];?></p>
                        <span><?php echo "RM".$r['price'];?></span>  
           
              
            </div>
          </div>
          <!-- end of item -->
           <!-- item -->
           <div class = "blog-item">
            <div class = "blog-img">
              <img src = "img/practical_eng.jpg" alt = "">
            </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=11";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p> <?php 
                        $sql = "SELECT title,price FROM products WHERE id=19";
                        $query = mysqli_query($conn,$sql);
                        $r = mysqli_fetch_assoc($query);

                        echo $r['title'];?></p>
                        <span><?php echo "RM".$r['price'];?></span>  
           
              
            </div>
          </div>
          <!-- end of item -->
           <!-- item -->
           <div class = "blog-item">
            <div class = "blog-img">
              <img src = "img/novel_sejarah.png" alt = "">
            </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=10";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p> <?php 
                        $sql = "SELECT title,price FROM products WHERE id=8";
                        $query = mysqli_query($conn,$sql);
                        $r = mysqli_fetch_assoc($query);

                        echo $r['title'];?></p>
                        <span><?php echo "RM".$r['price'];?></span>  
           
              
            </div>
          </div>
          <!-- end of item -->
           <!-- item -->
            <div class = "blog-item">
              <div class = "blog-img">
                <img src = "img/seni_mengubah_nasib.jpg" alt = "">
              </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=11";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p><?php 
                        $sql = "SELECT title,price FROM products WHERE id=20";
                        $query = mysqli_query($conn,$sql);
                        $r = mysqli_fetch_assoc($query);

                        echo $r['title'];?></p>
                        <span><?php echo "RM".$r['price'];?></span>  
           
              
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "blog-item">
              <div class = "blog-img">
                <img src = "img/keluarga.png" alt = "">
              </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=6";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p> <?php 
                        $sql = "SELECT title,price FROM products WHERE id=5";
                        $query = mysqli_query($conn,$sql);
                        $r = mysqli_fetch_assoc($query);

                        echo $r['title'];?></p>
                        <span><?php echo "RM".$r['price'];?></span>  
           
              
            </div>
          </div>
          <!--  item -->
          <div class = "blog-item">
              <div class = "blog-img">
                <img src = "img/ubah_patah_hati_jadi_prestasi.jpg" alt = "">
              </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=11";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p> <?php 
                        $sql = "SELECT title,price FROM products WHERE id=21";
                        $query = mysqli_query($conn,$sql);
                        $r = mysqli_fetch_assoc($query);

                        echo $r['title'];?></p>
                        <span><?php echo "RM".$r['price'];?></span>  
           
              
            </div>
          </div>
          <!-- end of item -->       
        </div>
      </div>
    </section>
    <!-- end of blog -->
    <!--pagination-->
    <div class="pagination">
        <a href="category.php" class="prev"><</a>
        <a href="category.php" class="num">1</a>
        <a href="category2.php" class="num active">2</a>
       
      </div>
    <!--end pagination-->

    </body>
    </html>
