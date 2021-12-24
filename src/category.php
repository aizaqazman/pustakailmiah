    <html>
      <?php include("config.php"); ?>
    <head>
      <meta charset="UTF-8">
      <title>Side Navigation Bar</title>
      <link rel="stylesheet" href="category.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
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
              <img src = "img/Bahasa_Melayu_SPM.jpg" alt = "">
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=11";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
              <p><?php 
                        $sql = "SELECT title,price FROM products WHERE id=9";
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
              <img src = "img/belajar_sunah_Nabi.jpg" alt = "">
            </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=11";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p><?php 
                        $sql = "SELECT title,price FROM products WHERE id=11";
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
              <img src = "img/adab_komunikasi.jpg" alt = "">
            </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=11";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p> <?php 
                        $sql = "SELECT title,price FROM products WHERE id=12";
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
              <img src = "img/ainmaisarah_1_img.jpg" alt = "">
            </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=1";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p> <?php 
                        $sql = "SELECT title,price FROM products WHERE id=1";
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
              <img src = "img/buku_sifir.jpg" alt = "">
            </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=11";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p> <?php 
                        $sql = "SELECT title,price FROM products WHERE id=13";
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
                <img src = "img/essay_SPM.jpg" alt = "">
              </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=11";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p><?php 
                        $sql = "SELECT title,price FROM products WHERE id=14";
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
                <img src = "img/motivasi_umum.jpg" alt = "">
              </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=8";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p> <?php 
                        $sql = "SELECT title,price FROM products WHERE id=7";
                        $query = mysqli_query($conn,$sql);
                        $r = mysqli_fetch_assoc($query);

                        echo $r['title'];?></p>
                        <span><?php echo "RM".$r['price'];?></span>  
           
              
            </div>
          </div>
          <!--  item -->
          <div class = "blog-item">
              <div class = "blog-img">
                <img src = "img/Komik_M.jpg" alt = "">
              </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=7";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p> <?php 
                        $sql = "SELECT title,price FROM products WHERE id=6";
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
                <img src = "img/kelab_penulis_muda.jpg" alt = "">
              </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=5";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                   <p><?php 
                        $sql = "SELECT title,price FROM products WHERE id=4";
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
                <img src = "img/islam_kata_isteri_bukan_bibik.png" alt = "">
              </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=11";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p> <?php 
                        $sql = "SELECT title,price FROM products WHERE id=15";
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
                <img src = "img/bestseller_agama.jpg" alt = "">
              </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=2";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                  <p> <?php 
                        $sql = "SELECT title,price FROM products WHERE id=2";
                        $query = mysqli_query($conn,$sql);
                        $r = mysqli_fetch_assoc($query);

                        echo $r['title'];?></p>
                        <span><?php echo "RM".$r['price'];?></span>  
           
              
            </div>
          </div>
          <!-- end of item -->
          <!--item-->
          <div class = "blog-item">
              <div class = "blog-img">
                <img src = "img/koleksi_UPSR.jpg" alt = "">
              </div>
            <div class = "blog-text">
              <h2><?php
                      $sql= "SELECT category FROM category WHERE id=11";
                      $query = mysqli_query($conn,$sql);
                      $r = mysqli_fetch_assoc($query);

                      echo $r['category'];

                    ?></h2>
                   <p><?php 
                        $sql = "SELECT title,price FROM products WHERE id=5";
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
        <a href="category.php" class="num active">1</a>
        <a href="category2.php" class="num">2</a>
        <a href="category2.php" class="next">></a>
      </div>
    <!-- end pagination-->


    </body>
    </html>
