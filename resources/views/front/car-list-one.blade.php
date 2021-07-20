<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Renten - Car Rental Service HTML Template</title>
  <!-- site favicon -->
  <link rel="shortcut icon" type="image/png" href="assets/front/images/favicon.jpg"/>
  <!-- fontawesome css link -->
  <link rel="stylesheet" href="assets/front/css/fontawesome.min.css">
  <!-- bootstrap css link -->
  <link rel="stylesheet" href="assets/front/css/bootstrap.min.css">
  <!-- lightcase css link -->
  <link rel="stylesheet" href="assets/front/css/lightcase.css">
  <!-- animate css link -->
  <link rel="stylesheet" href="assets/front/css/animate.css">
  <!-- nice select css link -->
  <link rel="stylesheet" href="assets/front/css/nice-select.css">
  <!-- datepicker css link -->
  <link rel="stylesheet" href="assets/front/css/datepicker.min.css">
  <!-- wickedpicker css link -->
  <link rel="stylesheet" href="assets/front/css/wickedpicker.min.css">
  <!-- jquery ui css link -->
  <link rel="stylesheet" href="assets/front/css/jquery-ui.min.css">
  <!-- owl carousel css link -->
  <link rel="stylesheet" href="assets/front/css/owl.carousel.min.css">
  <!-- main style css link -->
  <link rel="stylesheet" href="assets/front/css/main.css">
</head>
<body>

  <!-- preloader start -->
  <div id="preloader"></div>
  <!-- preloader end -->   

  <!--  header-section start  -->
  <header class="header-section">
    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-3">
            <ul class="social-links">
              <li><a href="#0"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#0"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#0"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#0"><i class="fa fa-google-plus"></i></a></li>
            </ul>
          </div>
          <div class="col-lg-6">
            <ul class="header-info d-flex justify-content-center">
              <li>
                <i class="fa fa-map-marker"></i>
                <p>Medino, NY 10012, USA Mitro Road</p>
              </li>
              <li>
                <i class="fa fa-clock-o"></i>
                <p>Sat - Fri Day 08:00 am - 5.00 pm Sunday Holyday</p>
              </li>
            </ul>
          </div>
          <div class="col-lg-3">
            <div class="header-action d-flex align-items-center justify-content-end">
              <div class="lag-select-area">
                <select>
                  <option>ENG</option>
                  <option>RUS</option>
                  <option>BAN</option>
                </select>
              </div>
              <div class="login-reg">
                  <a href="#0">Sign Up</a>
                  <a href="#0">Sign in</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom">
      <div class="container">
        <nav class="navbar navbar-expand-lg p-0">
          <a class="site-logo site-title" href="index.html"><img src="assets/front/images/logo1.png" alt="site-logo"><span class="logo-icon"><i class="flaticon-fire"></i></span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="menu-toggle"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav main-menu mr-auto">
              <li class="menu_has_children"><a href="#0">Home</a>
                <ul class="sub-menu">
                  <li><a href="index.html">Home One</a></li>
                  <li><a href="home-two.html">Home Two</a></li>
                </ul>
              </li>
              <li><a href="about.html">About</a>
              <li class="menu_has_children"><a href="#0">cars</a>
                <ul class="sub-menu">
                  <li><a href="car-list-one.html">car list one</a></li>
                  <li><a href="car-list-two.html">car list two</a></li>
                </ul>
              </li>
              <li class="menu_has_children"><a href="#0">pages</a>
                <ul class="sub-menu">
                  <li><a href="reservation.html">reservation</a></li>
                  <li><a href="login.html">login</a></li>
                  <li><a href="registration.html">registration</a></li>
                  <li><a href="error-404.html">404</a></li>
                </ul>
              </li>
              <li class="menu_has_children"><a href="#0">blog</a>
                <ul class="sub-menu">
                  <li><a href="blog.html">blog page</a></li>
                  <li><a href="blog-details.html">blog details</a></li>
                </ul>
              </li>
              <li><a href="contact.html">contact us</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div><!-- header-bottom end -->
  </header>
  <!--  header-section end  -->

  <!-- inner-apge-banner start -->
  <section class="inner-page-banner bg_img overlay-3" data-background="assets/front/images/inner-page-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-title">reservation</h2>
          <ol class="page-list">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#0">car list</a></li>
            <li>reservation</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- inner-apge-banner end -->

  <!-- car-search-section start -->
  <section class="car-search-section pt-120 pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="car-search-filter-area">
            <div class="car-search-filter-form-area">
              <form class="car-search-filter-form">
                <div class="row justify-content-between">
                  <div class="col-lg-4 col-md-5 col-sm-6">
                    <div class="cart-sort-field">
                      <span class="caption">Sort by : </span>
                      <select>
                        <option>Pajero Range</option>
                        <option>Toyota Axio</option>
                        <option>Lancer</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-6 d-flex">
                    <input type="text" name="car_search" id="car_search" placeholder="Search what you want........">
                    <button class="search-submit-btn">Search</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="view-style-toggle-area">
              <button class="view-btn list-btn"><i class="fa fa-bars"></i></button>
              <button class="view-btn grid-btn active"><i class="fa fa-th-large"></i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-70">
        <div class="col-lg-8">
          <div class="car-search-result-area grid--view row mb-none-30">
            <div class="col-md-6 col-12">
              <div class="car-item">
                <div class="thumb bg_img" data-background="assets/front/images/cars/4.jpg"></div>
                <div class="car-item-body">
                  <div class="content">
                    <h4 class="title">pajero rang</h4>
                    <span class="price">start form $20 per day</span>
                    <p>Aliquam sollicitudin dolores tristiquvel ornare, vitae aenean.</p>
                    <a href="#0" class="cmn-btn">rent car</a>
                  </div>
                  <div class="car-item-meta">
                    <ul class="details-list">
                      <li><i class="fa fa-car"></i>model 2014ib</li>
                      <li><i class="fa fa-tachometer"></i>32000 KM</li>
                      <li><i class="fa fa-sliders"></i>auto</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div><!-- car-item end -->
            <div class="col-md-6 col-12">
              <div class="car-item">
                <div class="thumb bg_img" data-background="assets/front/images/cars/5.jpg"></div>
                <div class="car-item-body">
                  <div class="content">
                    <h4 class="title">mirage range</h4>
                    <span class="price">start form $20 per day</span>
                    <p>Aliquam sollicitudin dolores tristiquvel ornare, vitae aenean.</p>
                    <a href="#0" class="cmn-btn">rent car</a>
                  </div>
                  <div class="car-item-meta">
                    <ul class="details-list">
                      <li><i class="fa fa-car"></i>model 2014ib</li>
                      <li><i class="fa fa-tachometer"></i>32000 KM</li>
                      <li><i class="fa fa-sliders"></i>auto</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div><!-- car-item end -->
            <div class="col-md-6 col-12">
              <div class="car-item">
                <div class="thumb bg_img" data-background="assets/front/images/cars/6.jpg"></div>
                <div class="car-item-body">
                  <div class="content">
                    <h4 class="title">Volkswagen</h4>
                    <span class="price">start form $20 per day</span>
                    <p>Aliquam sollicitudin dolores tristiquvel ornare, vitae aenean.</p>
                    <a href="#0" class="cmn-btn">rent car</a>
                  </div>
                  <div class="car-item-meta">
                    <ul class="details-list">
                      <li><i class="fa fa-car"></i>model 2014ib</li>
                      <li><i class="fa fa-tachometer"></i>32000 KM</li>
                      <li><i class="fa fa-sliders"></i>auto</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div><!-- car-item end -->
            <div class="col-md-6 col-12">
              <div class="car-item">
                <div class="thumb bg_img" data-background="assets/front/images/cars/7.jpg"></div>
                <div class="car-item-body">
                  <div class="content">
                    <h4 class="title">Rools royce</h4>
                    <span class="price">start form $20 per day</span>
                    <p>Aliquam sollicitudin dolores tristiquvel ornare, vitae aenean.</p>
                    <a href="#0" class="cmn-btn">rent car</a>
                  </div>
                  <div class="car-item-meta">
                    <ul class="details-list">
                      <li><i class="fa fa-car"></i>model 2014ib</li>
                      <li><i class="fa fa-tachometer"></i>32000 KM</li>
                      <li><i class="fa fa-sliders"></i>auto</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div><!-- car-item end -->
            <div class="col-md-6 col-12">
              <div class="car-item">
                <div class="thumb bg_img" data-background="assets/front/images/cars/8.jpg"></div>
                <div class="car-item-body">
                  <div class="content">
                    <h4 class="title"> Toyota</h4>
                    <span class="price">start form $20 per day</span>
                    <p>Aliquam sollicitudin dolores tristiquvel ornare, vitae aenean.</p>
                    <a href="#0" class="cmn-btn">rent car</a>
                  </div>
                  <div class="car-item-meta">
                    <ul class="details-list">
                      <li><i class="fa fa-car"></i>model 2014ib</li>
                      <li><i class="fa fa-tachometer"></i>32000 KM</li>
                      <li><i class="fa fa-sliders"></i>auto</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div><!-- car-item end -->
            <div class="col-md-6 col-12">
              <div class="car-item">
                <div class="thumb bg_img" data-background="assets/front/images/cars/9.jpg"></div>
                <div class="car-item-body">
                  <div class="content">
                    <h4 class="title"> Porsche</h4>
                    <span class="price">start form $20 per day</span>
                    <p>Aliquam sollicitudin dolores tristiquvel ornare, vitae aenean.</p>
                    <a href="#0" class="cmn-btn">rent car</a>
                  </div>
                  <div class="car-item-meta">
                    <ul class="details-list">
                      <li><i class="fa fa-car"></i>model 2014ib</li>
                      <li><i class="fa fa-tachometer"></i>32000 KM</li>
                      <li><i class="fa fa-sliders"></i>auto</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div><!-- car-item end -->
          </div>
          <nav class="d-pagination" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-4">
          <aside class="sidebar">
            <div class="widget widget-reservation">
              <h4 class="widget-title">reservation</h4>
              <div class="widget-body">
                <form class="car-search-form">
                  <div class="row">
                    <div class="col-lg-12 form-group">
                      <select>
                        <option value="1" selected>Choose Your Car Type</option>
                        <option value="2">Another option</option>
                        <option value="4">Potato</option>
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-map-marker"></i>
                      <input class="form-control has-icon" type="text" placeholder="Pickup Location">
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-map-marker"></i>
                      <input class="form-control has-icon" type="text" placeholder="Drop Off Location">
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-calendar"></i>
                      <input type='text' class='form-control has-icon datepicker-here' data-language='en' placeholder="Pickup Date">
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-clock-o"></i>
                      <input type="text" name="timepicker" class="form-control has-icon timepicker" placeholder="Pickup Time">
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-calendar"></i>
                      <input type='text' class='form-control has-icon datepicker-here' data-language='en' placeholder="Drop Off Date">
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-clock-o"></i>
                      <input type="text" name="timepicker" class="form-control has-icon timepicker" placeholder="Drop Off Time">
                    </div>
                  </div>
                  <button type="submit" class="cmn-btn">Reservation</button>
                </form>
              </div>
            </div><!-- widget end -->
            <div class="widget widget-price-filter">
              <h4 class="widget-title">price filter</h4>
              <div class="widget-body">
                <div id="slider-range"></div>
                <div class="filter-price-result">
                  <input type="text" id="amount" readonly><span>(Per Day)</span>
                </div>
              </div>
            </div><!-- widget end -->
            <div class="widget widget-testimonial">
              <h4 class="widget-title">testimonial</h4>
              <div class="widget-body">
                <div class="testimonial-slider owl-carousel">
                  <div class="testimonial-item">
                    <div class="testimonial-item--header">
                      <div class="thumb"><img src="assets/front/images/testimonial/1.jpg" alt="image"></div>
                      <div class="content">
                        <h6 class="name">martin hook</h6>
                        <span class="designation">business man</span>
                      </div>
                    </div>
                    <div class="testimonial-item--body">
                      <p>Tristique consequat, lorem sed vivamus donec eget, nulla pharetra lacinia wisi diamaliquam velit nec.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- widget end -->
          </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- car-search-section end -->

  <!-- footer-section start -->
  <footer class="footer-section">
    <div class="footer-top pt-120 pb-120">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-8">
            <div class="footer-widget widget-about">
              <div class="widget-about-content">
                <a href="index.html" class="footer-logo"><img src="assets/front/images/logo-footer.png" alt="logo"></a>
                <p>Lorem ipsum dolor sit amet, congue placeranec. Leo faucibus sed eleifend bibendum n vehicula nulla mauris nulla ipsum neque sed. Gravida egestas fermentum urna, velit sed. </p>
                <ul class="social-links">
                  <li><a href="#0"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#0"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#0"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#0"><i class="fa fa-google-plus"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-sm-4">
            <div class="footer-widget widget-menu">
              <h4 class="widget-title">our cars</h4>
              <ul>
                <li><a href="#0">mistubishi lancer</a></li>
                <li><a href="#0">forester subar</a></li>
                <li><a href="#0">mirage ange</a></li>
                <li><a href="#0">pajero range</a></li>
                <li><a href="#0">subaru liberty</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-sm-4">
            <div class="footer-widget widget-menu">
              <h4 class="widget-title">useful link</h4>
              <ul>
                <li><a href="#0">about</a></li>
                <li><a href="#0">reservation</a></li>
                <li><a href="#0">faq</a></li>
                <li><a href="#0">blog</a></li>
                <li><a href="#0">car list</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-sm-8">
            <div class="footer-widget widget-address">
              <h4 class="widget-title">contact with us</h4>
              <ul>
                <li>
                  <i class="fa fa-map-marker"></i>
                  <span>Medino, NY 10012, Kitaniya Road Nikamobo Libono USA</span>
                </li>
                <li>
                  <i class="fa fa-envelope"></i>
                  <span>www.carrentalinfo2457@gmail.com www.oursupport/info@gmail.com</span>
                </li>
                <li>
                  <i class="fa fa-phone-square"></i>
                  <span>+88014578541-09 , +0885424-542-254 +88047859-4541</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-sm-6">
            <p class="copy-right-text"><a href="templateshub.net">Templates Hub</a></p>
          </div>
          <div class="col-sm-6">
            <ul class="payment-method d-flex justify-content-end">
              <li>We accept</li>
              <li><img src="assets/front/images/money-method/1.png" alt="image"></li>
              <li><img src="assets/front/images/money-method/2.png" alt="image"></li>
              <li><img src="assets/front/images/money-method/3.png" alt="image"></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer-section end -->
  
  <!-- scroll-to-top start -->
  <div class="scroll-to-top">
    <span class="scroll-icon">
      <i class="fa fa-rocket"></i>
    </span>
  </div>
  <!-- scroll-to-top end -->

  <!-- jquery js link -->
  <script src="assets/front/js/jquery-3.3.1.min.js"></script>
  <!-- jquery migrate js link -->
  <script src="assets/front/js/jquery-migrate-3.0.0.js"></script>
  <!-- bootstrap js link -->
  <script src="assets/front/js/bootstrap.min.js"></script>
  <!-- lightcase js link -->
  <script src="assets/front/js/lightcase.js"></script>
  <!-- wow js link -->
  <script src="assets/front/js/wow.min.js"></script>
  <!-- nice select js link -->
  <script src="assets/front/js/jquery.nice-select.min.js"></script>
  <!-- datepicker js link -->
  <script src="assets/front/js/datepicker.min.js"></script>
  <script src="assets/front/js/datepicker.en.js"></script>
  <!-- wickedpicker js link -->
  <script src="assets/front/js/wickedpicker.min.js"></script>
  <!-- owl carousel js link -->
  <script src="assets/front/js/owl.carousel.min.js"></script>
  <!-- jquery ui js link -->
  <script src="assets/front/js/jquery-ui.min.js"></script>
  <!-- main js link -->
  <script src="assets/front/js/main.js"></script>
</body>

</html>