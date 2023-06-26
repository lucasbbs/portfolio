 {{-- <style>
     /* Top and Bottom borders come in */
     ul.topBotomBordersIn li:before,
     ul.topBotomBordersIn li:after {
         position: absolute;
         left: 0px;
         width: 100%;
         height: 2px;
         background: #ffffff;
         content: "";
         opacity: 0;
         transition: all 0.3s;
     }

     ul.topBotomBordersIn li:before {
         top: 0px;
         transform: translateY(-10px);
     }

     ul.topBotomBordersIn li:after {
         bottom: 0px;
         transform: translateY(10px);
     }

     ul.topBotomBordersIn li:hover:before,
     ul.topBotomBordersIn li:hover:after {
         opacity: 1;
         transform: translateY(0px);
     }
 </style> --}}
 <!-- ======= Mobile nav toggle button ======= -->
 <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

 <!-- ======= Header ======= -->
 <header id="header">
     <div class="d-flex flex-column">

         <div class="profile">
             <img src="{{ asset('frontend/assets/img/profile-img.jpg') }}" alt="" class="img-fluid rounded-circle">
             <h1 class="text-light"><a href="index.html">Lucas Breno de Souza Noronha Braga</a></h1>
             <div class="social-links mt-3 text-center">
                 <a title="vk" href="#" class="vk"><i class="bx bxl-vk"></i></a>
                 <a title="whatsapp" href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                 <a title="map" href="#" class="map"><i class="bx bx-map"></i></a>
                 <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                 <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
             </div>
         </div>

         <nav id="navbar" class="nav-menu navbar">
             <ul class="topBotomBordersIn">
                 <li><a href="{{ route('home') }}#hero" class="nav-link scrollto active"><i class="bx bx-home"></i>
                         <span>Home</span></a></li>
                 <li><a href="{{ route('home') }}#about" class="nav-link scrollto"><i class="bx bx-user"></i>
                         <span>About</span></a></li>
                 <li><a href="{{ route('home') }}#skills" class="nav-link scrollto"><i class="bx bx-cog"></i>
                         <span>Skills</span></a></li>
                 </li>
                 <li><a href="{{ route('home') }}#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i>
                         <span>Resume</span></a></li>
                 <li><a href="{{ route('home') }}#portfolio" class="nav-link scrollto"><i
                             class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
                 <li><a href="{{ route('home') }}#services" class="nav-link scrollto"><i class="bx bx-server"></i>
                         <span>Services</span></a></li>
                 <li><a href="{{ route('home') }}#testimonials" class="nav-link scrollto"><i
                             class="bx bxs-quote-left"></i><span>Testimonials</span></a></li>
                 <li><a href="{{ route('home') }}#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i>
                         <span>Contact</span></a></li>
             </ul>
         </nav><!-- .nav-menu -->
     </div>
 </header><!-- End Header -->
