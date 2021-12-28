<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="contact.css">
  <title>Main Page</title>
</head>
<body>
  <!-- Navbar -->
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <img src="img/logo-150px.png" alt="" class="">
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-dark">Home</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Shop</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Blog</a></li>
          <li><a href="contact.php" class="nav-link px-2 link-dark">Contact</a></li>
        </ul>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>
        <div class="dropdown text-end">
          <button class="btn bg-maroon text-white">Login</button>
          <a href="cart.php" class="text-decoration-none text-maroon">
            <i class="cart fas fa-shopping-cart mx-2"></i>
          </a>
          <!-- <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </header>
    <!-- End of Navbar -->


<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="images/main4.jpg" alt="Main" width="2000" height="1000">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white" align="center";><span class="w3-padding w3-black w3-opacity-min"><b>Pustaka</b></span> <span class="w3-hide-small w3-text-light-grey">Ilmiah</span></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:2000px">

<br><br>

  <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">-----------------------------------------------------------------------------BEST SELLING PRODUCTS-----------------------------------------------------------------------</h3>
  </div>
  
  <style>
* {
  box-sizing: border-box;
}

.column {
  float: right;
  width: 25%;
  padding: 10px;
  align: center;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>

<br>

<div class="row" align="center";>
  <div class="column">
  <img src="images/best1.png" alt="Snow" style="width:60%">
        <div>KOLEKSI UPSR 2021 TAHUN 4, 5 DAN 6</div>
		<div><b> RM2.95</b></div>
  </div>
  <div class="column">
    <img src="images/best2.png" alt="Forest" style="width:60%">
	  <div>Etika Profesionalisme - SIRI KOLEJ VOKASIONAL:</div>
	  <div><b> RM21.90</b></div>
  </div>
  <div class="column">
    <img src="images/best3.png" alt="Mountains" style="width:60%">
	  <div>Pada Suatu Hari</div>
	  <div><b> RM25.00</b></div>
  </div>
  <div class="column">
    <img src="images/best4.png" alt="Mountains" style="width:60%">
	<div>KEMBALI KEPADA JAWI: PANDAI MEMBACA DAN MENULIS JAWI DALAM MASA 20 JAM</div>
	<div><b> RM5.00</b></div>
  </div>
</div>

<br><br>

<div class="row" align="center";>
  <div class="column">
    <img src="images/best5.png" alt="Snow" style="width:60%">
        <div>24 Jam Belajar Sunah Nabi</div>
		<div><b> RM18.00</b></div>
  </div>
  <div class="column">
    <img src="images/best6.png" alt="Forest" style="width:60%">
        <div>Filosofi Rerama</div>
		<div><b> RM28.00</b></div>
  </div>
  <div class="column">
    <img src="images/best7.png" alt="Mountains" style="width:60%">
        <div>Islam Kata Isteri Bukan Bibik</div>
		<div><b> RM20.00</b></div>
  </div>
  <div class="column">
    <img src="images/best8.png" alt="Mountains" style="width:60%">
        <div>Essay Writing Made Easy SPM</div>
		<div><b> RM15.90</b></div>
  </div>
</div>

<br><br>

  <!-- About Section -->
  <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">----------------------------------------------------------------------BROWSE OUR CATEGORIES-----------------------------------------------------------------------------</h3>
  </div>
  
<br>
  
  <div class="row" align="center";>
  <div class="column">
    <img src="" alt="Snow" style="width:60%">
      <h4>PUSTAKA ILMIAH</h4>
	  <p class="w3-opacity">20 PRODUCTS</p>
  </div>
  <div class="column">
    <img src="" alt="Forest" style="width:60%">
      <h4>AIN MAISARAH</h4>
	  <p class="w3-opacity">1 PRODUCT</p>
  </div>
  <div class="column">
    <img src="" alt="Mountains" style="width:60%">
      <h4>BESTSELLER AGAMA</h4>
	  <p class="w3-opacity">1 PRODUCT</p>
  </div>
  <div class="column">
    <img src="" alt="Mountains" style="width:60%">
      <h4>ICON</h4>
	  <p class="w3-opacity">1 PRODUCT</p>
  </div>
</div>

<br><br>

  <div class="row" align="center";>
  <div class="column">
    <img src="" alt="Snow" style="width:60%">
      <h4>KELAB PENULIS MUDA</h4>
	  <p class="w3-opacity">1 PRODUCT</p>
  </div>
  <div class="column">
    <img src="" alt="Forest" style="width:60%">
      <h4>KELUARGA</h4>
	  <p class="w3-opacity">1 PRODUCT</p>
  </div>
  <div class="column">
    <img src="" alt="Mountains" style="width:60%">
      <h4>KOMIK M</h4>
	  <p class="w3-opacity">1 PRODUCT</p>
  </div>
  <div class="column">
    <img src="" alt="Mountains" style="width:60%">
      <h4>MOTIVASI UMUM</h4>
	  <p class="w3-opacity">1 PRODUCT</p>
  </div>
</div>

<br><br>

 <div class="row" align="center";>
  <div class="column">
    <img src="" alt="Snow" style="width:60%">
      <h4>NOVEL SEJARAH</h4>
	  <p class="w3-opacity">1 PRODUCT</p>
  </div>
</div>
  
<br><br>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-32" id="contact">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">-----------------------------------------------------------------------------LATEST NEWS------------------------------------------------------------------------------------</h3>
	
<br>
	
    <div class="row" align="center";>
  <div class="column">
    <img src="" alt="Snow" style="width:60%">
      <h4>06 MAY</h4>
	  <p class="w3-opacity">Website Launched!</p>
  </div>
<br><br>
  <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h3>
</div>
  </div>
<!-- End page content -->
</div>

<br><br>


<body>
  <section class="min-vh-50 w-100 p-3">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg">
          <p class="fw-bold text-muted">LATEST</p>
          <hr>
          <!-- Item -->
          <a href="#" class="text-decoration-none text-black">
            <div class="shadow-sm m-1">
              <div class="d-flex">
                <div class="w-25">
                  <img src="img/5-768x1024.jpg" alt="" class="img-thumbnail footer-item-img m-1">
                </div>
                <div class="ml-2">
                  <p class="mx-2 item-text">KEMBALI KEPADA JAWI : PANDAI MEMBACA DAN MENULIS JAWI DALAM MASA 20 JAM</p>
                  <p class="mx-2 fw-bold">RM5.00</p>
                </div>
              </div>
            </div>
          </a>
          <!-- End of Item -->
          <!-- Item -->
          <a href="#" class="text-decoration-none text-black">
            <div class="shadow-sm m-1">
              <div class="d-flex">
                <div class="w-25">
                  <img src="img/25.jpg" alt="" class="img-thumbnail footer-item-img m-1">
                </div>
                <div class="ml-2">
                  <p class="mx-2 item-text">Ubah Patah Hati Jadi Prestasi</p>
                  <p class="mx-2 fw-bold">RM40.00</p>
                </div>
              </div>
            </div>
          </a>
          <!-- End of Item -->
        </div>
        <div class="col-12 col-md-6 col-lg">
          <p class="fw-bold text-muted">BEST SELLING</p>
          <hr>
          <!-- Item -->
          <a href="#" class="text-decoration-none text-black">
            <div class="shadow-sm m-1">
              <div class="d-flex">
                <div class="w-25">
                  <img src="img/25.jpg" alt="" class="img-thumbnail footer-item-img m-1">
                </div>
                <div class="ml-2">
                  <p class="mx-2 item-text">Ubah Patah Hati Jadi Prestasi</p>
                  <p class="mx-2 fw-bold">RM40.00</p>
                </div>
              </div>
            </div>
          </a>
          <!-- End of Item -->
          <!-- Item -->
          <a href="#" class="text-decoration-none text-black">
            <div class="shadow-sm m-1">
              <div class="d-flex">
                <div class="w-25">
                  <img src="img/5-768x1024.jpg" alt="" class="img-thumbnail footer-item-img m-1">
                </div>
                <div class="ml-2">
                  <p class="mx-2 item-text">KEMBALI KEPADA JAWI : PANDAI MEMBACA DAN MENULIS JAWI DALAM MASA 20 JAM</p>
                  <p class="mx-2 fw-bold">RM5.00</p>
                </div>
              </div>
            </div>
          </a>
          <!-- End of Item -->
        </div>
        <div class="col-12 col-md-6 col-lg">
          <p class="fw-bold text-muted">TOP RATED</p>
          <hr>
          <!-- Item -->
          <a href="#" class="text-decoration-none text-black">
            <div class="shadow-sm m-1">
              <div class="d-flex">
                <div class="w-25">
                  <img src="img/25.jpg" alt="" class="img-thumbnail footer-item-img m-1">
                </div>
                <div class="ml-2">
                  <p class="mx-2 item-text">Ubah Patah Hati Jadi Prestasi</p>
                  <p class="mx-2 fw-bold">RM40.00</p>
                </div>
              </div>
            </div>
          </a>
          <!-- End of Item -->
          <!-- Item -->
          <a href="#" class="text-decoration-none text-black">
            <div class="shadow-sm m-1">
              <div class="d-flex">
                <div class="w-25">
                  <img src="img/5-768x1024.jpg" alt="" class="img-thumbnail footer-item-img m-1">
                </div>
                <div class="ml-2">
                  <p class="mx-2 item-text">KEMBALI KEPADA JAWI : PANDAI MEMBACA DAN MENULIS JAWI DALAM MASA 20 JAM</p>
                  <p class="mx-2 fw-bold">RM5.00</p>
                </div>
              </div>
            </div>
          </a>
          <!-- End of Item -->
        </div>
      </div>
    </div>
  </section>
  
  <!-- Footer -->
  <footer class="text-center text-lg-start bg-grey-77 text-light">
    <!-- Section: Links  -->
    <section class="p-2">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              About Us
            </h6>
            <hr>
            <p>
            Kedai Buku, Al-Quran & Alat Tulis dan Servis Perkhidmatan antaranya :<br>
            (1) Buku Terkini & Bestseller<br>
            (2) Bahan Perpustakaan<br>
            (3) Alat Bantu Mengajar<br>
            (4) Alat Tulis<br>
            (5) Makanan Sunnah<br>
            </p>
            <div>
              <a href="" class="socmed me-4 text-reset text-decoration-none">
                <i class="fab fa-whatsapp"></i>
              </a>
              <a href="" class="socmed me-4 text-reset text-decoration-none">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="" class="socmed me-4 text-reset text-decoration-none">
                <i class="fab fa-telegram-plane"></i>
              </a>
              <a href="" class="socmed me-4 text-reset text-decoration-none">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="" class="socmed me-4 text-reset text-decoration-none">
                <i class="far fa-envelope"></i>
              </a>
              <a href="" class="socmed me-4 text-reset text-decoration-none">
                <i class="fab fa-google"></i>
              </a>
              <a href="" class="socmed me-4 text-reset text-decoration-none">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="" class="socmed me-4 text-reset text-decoration-none">
                <i class="fab fa-pinterest"></i>
              </a>
            </div>
          </div>
          <!-- Grid column -->
          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Latest News
            </h6>
            <hr>
            <p>
              <a href="#" class="news-link text-light text-decoration-none">
                <span class="font-monospace">6th May - </span>
                Website Launched!
              </a>
            </p>
          </div>
          <!-- Grid column -->
          <!-- Grid column -->
          <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Sign Up For Newsletter
            </h6>
            <hr>
            <form>
              <input type="text" class="rounded-pill mb-2 p-1 form-control" name="email">
              <button class="btn bg-maroon rounded-pill p-2 text-light">Sign Up</button>
            </form>
          </div>
          <!-- Grid column -->
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Contact
            </h6>
            <p><i class="fas fa-home me-3"></i> Pustaka Ilmiah, 1150-a, Jalan Pasir Panjang, 21100 Kuala Terengganu, Terengganu</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              pustaka_ilmiah@yahoo.com
            </p>
            <p><i class="fas fa-phone me-3"></i> 09-6226996</p>
            <p><i class="fas fa-print me-3"></i> 09-6226996</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
    <!-- Copyright -->
    <div class="text-center p-4 bg-grey-5b d-md-flex justify-content-between">
      <div>
        Copyright Pustaka Ilmiah ©️ 2021 |
        <a class="text-reset fw-bold" href="#">website.com</a>
      </div>
      <div>
        <i class="payment-icon mx-1 fab fa-cc-visa"></i>
        <i class="payment-icon mx-1 fab fa-cc-mastercard"></i>
        <i class="payment-icon mx-1 fas fa-money-check"></i>
      </div>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- End Footer -->
</body>
</html>