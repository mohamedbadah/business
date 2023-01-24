<!DOCTYPE html>
<html lang="en">

<head>
  <!--====== Required meta tags ======-->
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!--====== Title ======-->
  <title>Business | Bootstrap 5 Business Template</title>

  <!--====== Favicon Icon ======-->
  <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/svg" />

  <!--====== Bootstrap css ======-->
  <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}" />

  <!--====== Line Icons css ======-->
  <link rel="stylesheet" href="{{asset('front/assets/css/lineicons.css')}}" />

  <!--====== Tiny Slider css ======-->
  <link rel="stylesheet" href="{{asset('front/assets/css/tiny-slider.css')}}" />

  <!--====== gLightBox css ======-->
  <link rel="stylesheet" href="{{asset('front/assets/css/glightbox.min.css')}}" />

  <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}" />
  @yield('css')
</head>

<body>

  <!--====== NAVBAR NINE PART START ======-->

  <section class="navbar-area navbar-nine">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.html">
              <img src="{{asset('front/assets/images/white-logo.svg')}}" alt="Logo" />
            </a>
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNine"
              aria-controls="navbarNine" aria-expanded="false" aria-label="Toggle navigation">
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
            </button> --}}

            <div class="collapse navbar-collapse sub-menu-bar">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="{{(request()->is('/'))?'active':''}}" href="{{route("home")}}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="{{(request()->is('service'))?'active':''}}" href="{{route('service')}}">Services</a>
                </li>

                <li class="nav-item">
                  <a class="{{(request()->is('blog'))?'active':''}}" href="{{route('blog')}}">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="{{(request()->is('contact'))?'active':''}}" href="{{route('contact')}}">Contact</a>
                </li>
              </ul>
            </div>
          </nav>
          <!-- navbar -->
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </section>
@yield('content')
  <footer class="footer-area footer-eleven call-action">
    <!-- Start Footer Top -->
    <div class="footer-top">
      <div class="container">
        <div class="inner-content">
          <div class="row">
            <div class="col-lg-12 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="footer-widget f-about">
                <div class="logo">
                  <a href="index.html">
                    <img src="{{asset('front/assets/images/logo.svg')}}" alt="#" class="img-fluid" />
                  </a>
                </div>
                <p class=" text-white">
                  Making the world a better place through constructing elegant
                  hierarchies.
                </p>
                <p class="copyright-text text-white">
                  <span>© 2024 Business. Designed and Developed</span>
                </p>
              </div>
              <!-- End Single Widget -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ End Footer Top -->
  </footer>
  <!--/ End Footer Area -->


  <a href="#" class="scroll-top btn-hover">
    <i class="lni lni-chevron-up"></i>
  </a>

  <!--====== js ======-->
  <script src="{{asset('front/assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('front/assets/js/glightbox.min.js')}}"></script>
  <script src="{{asset('front/assets/js/main.js')}}"></script>
  <script src="{{asset('front/assets/js/tiny-slider.js')}}"></script>

  {{-- <script>

    //===== close navbar-collapse when a  clicked
    let navbarTogglerNine = document.querySelector(
      ".navbar-nine .navbar-toggler"
    );
    navbarTogglerNine.addEventListener("click", function () {
      navbarTogglerNine.classList.toggle("active");
    });

    // ==== left sidebar toggle
    let sidebarLeft = document.querySelector(".sidebar-left");
    let overlayLeft = document.querySelector(".overlay-left");
    let sidebarClose = document.querySelector(".sidebar-close .close");

    overlayLeft.addEventListener("click", function () {
      sidebarLeft.classList.toggle("open");
      overlayLeft.classList.toggle("open");
    });
    sidebarClose.addEventListener("click", function () {
      sidebarLeft.classList.remove("open");
      overlayLeft.classList.remove("open");
    });

    // ===== navbar nine sideMenu
    let sideMenuLeftNine = document.querySelector(".navbar-nine .menu-bar");

    sideMenuLeftNine.addEventListener("click", function () {
      sidebarLeft.classList.add("open");
      overlayLeft.classList.add("open");
    });

    //========= glightbox
    GLightbox({
      'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
      'type': 'video',
      'source': 'youtube', //vimeo, youtube or local
      'width': 900,
      'autoplayVideos': true,
    });

  </script> --}}
</body>

</html>