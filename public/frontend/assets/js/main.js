/**
* Template Name: iPortfolio
* Updated: May 30 2023 with Bootstrap v5.3.0
* Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos,
      behavior: 'smooth'
    })
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('body').classList.toggle('mobile-nav-active')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let body = select('body')
      if (body.classList.contains('mobile-nav-active')) {
        body.classList.remove('mobile-nav-active')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Hero type effect
   */
  const typed = select('.typed')
  if (typed) {
    let typed_strings = typed.getAttribute('data-typed-items')
    typed_strings = typed_strings.split(',')
    new Typed('.typed', {
      strings: typed_strings,
      loop: true,
      typeSpeed: 100,
      backSpeed: 50,
      backDelay: 2000
    });
  }

  /**
   * Skills animation
   */
  let skilsContent = select('.skills-content');
  if (skilsContent) {
    new Waypoint({
      element: skilsContent,
      offset: '80%',
      handler: function(direction) {
        let progress = select('.progress .progress-bar', true);
        progress.forEach((el) => {
          el.style.width = el.getAttribute('aria-valuenow') + '%'
        });
      }
    })
  }

  /**
   * Porfolio isotope and filter
   */
  window.addEventListener('load', () => {
    let portfolioContainer = select('.portfolio-container');
    if (portfolioContainer) {
      let portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item'
      });

      let portfolioFilters = select('#portfolio-flters li', true);

      on('click', '#portfolio-flters li', function(e) {
        e.preventDefault();
        portfolioFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        portfolioIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        portfolioIsotope.on('arrangeComplete', function() {
          AOS.refresh()
        });
      }, true);
    }

  });

  /**
   * Initiate portfolio lightbox 
   */
  const portfolioLightbox = GLightbox({
    selector: '.portfolio-lightbox'
  });

  /**
   * Portfolio details slider
   */
  new Swiper('.portfolio-details-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Testimonials slider
   */
  new Swiper('.testimonials-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },

      1200: {
        slidesPerView: 3,
        spaceBetween: 20
      }
    }
  });

  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    })
  });

  /**
   * Initiate Pure Counter 
   */
  new PureCounter();

})()



// /**
// * Template Name: Company - v2.1.0
// * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
// * Author: BootstrapMade.com
// * License: https://bootstrapmade.com/license/
// */
// !(function($) {
//   "use strict";

//   // Smooth scroll for the navigation menu and links with .scrollto classes
//   var scrolltoOffset = $('#header').outerHeight() - 2;
//   $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function(e) {
//     if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
//       var target = $(this.hash);
//       if (target.length) {
//         e.preventDefault();

//         var scrollto = target.offset().top - scrolltoOffset;

//         if ($(this).attr("href") == '#header') {
//           scrollto = 0;
//         }

//         $('html, body').animate({
//           scrollTop: scrollto
//         }, 1500, 'easeInOutExpo');

//         if ($(this).parents('.nav-menu, .mobile-nav').length) {
//           $('.nav-menu .active, .mobile-nav .active').removeClass('active');
//           $(this).closest('li').addClass('active');
//         }

//         if ($('body').hasClass('mobile-nav-active')) {
//           $('body').removeClass('mobile-nav-active');
//           $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
//           $('.mobile-nav-overly').fadeOut();
//         }
//         return false;
//       }
//     }
//   });

//   // Activate smooth scroll on page load with hash links in the url
//   $(document).ready(function() {
//     if (window.location.hash) {
//       var initial_nav = window.location.hash;
//       if ($(initial_nav).length) {
//         var scrollto = $(initial_nav).offset().top - scrolltoOffset;
//         $('html, body').animate({
//           scrollTop: scrollto
//         }, 1500, 'easeInOutExpo');
//       }
//     }
//   });

//   // Mobile Navigation
//   if ($('.nav-menu').length) {
//     var $mobile_nav = $('.nav-menu').clone().prop({
//       class: 'mobile-nav d-lg-none'
//     });
//     $('body').append($mobile_nav);
//     $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
//     $('body').append('<div class="mobile-nav-overly"></div>');

//     $(document).on('click', '.mobile-nav-toggle', function(e) {
//       $('body').toggleClass('mobile-nav-active');
//       $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
//       $('.mobile-nav-overly').toggle();
//     });

//     $(document).on('click', '.mobile-nav .drop-down > a', function(e) {
//       e.preventDefault();
//       $(this).next().slideToggle(300);
//       $(this).parent().toggleClass('active');
//     });

//     $(document).click(function(e) {
//       var container = $(".mobile-nav, .mobile-nav-toggle");
//       if (!container.is(e.target) && container.has(e.target).length === 0) {
//         if ($('body').hasClass('mobile-nav-active')) {
//           $('body').removeClass('mobile-nav-active');
//           $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
//           $('.mobile-nav-overly').fadeOut();
//         }
//       }
//     });
//   } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
//     $(".mobile-nav, .mobile-nav-toggle").hide();
//   }

//   // Intro carousel
//   var heroCarousel = $("#heroCarousel");
//   var heroCarouselIndicators = $("#hero-carousel-indicators");
//   heroCarousel.find(".carousel-inner").children(".carousel-item").each(function(index) {
//     (index === 0) ?
//     heroCarouselIndicators.append("<li data-target='#heroCarousel' data-slide-to='" + index + "' class='active'></li>"):
//       heroCarouselIndicators.append("<li data-target='#heroCarousel' data-slide-to='" + index + "'></li>");
//   });

//   heroCarousel.on('slid.bs.carousel', function(e) {
//     $(this).find('.carousel-content ').addClass('animate__animated animate__fadeInDown');
//   });

//   // Back to top button
//   $(window).scroll(function() {
//     if ($(this).scrollTop() > 100) {
//       $('.back-to-top').fadeIn('slow');
//     } else {
//       $('.back-to-top').fadeOut('slow');
//     }
//   });

//   $('.back-to-top').click(function() {
//     $('html, body').animate({
//       scrollTop: 0
//     }, 1500, 'easeInOutExpo');
//     return false;
//   });

//   // Porfolio isotope and filter
//   $(window).on('load', function() {
//     var portfolioIsotope = $('.portfolio-container').isotope({
//       itemSelector: '.portfolio-item'
//     });

//     $('#portfolio-flters li').on('click', function() {
//       $("#portfolio-flters li").removeClass('filter-active');
//       $(this).addClass('filter-active');

//       portfolioIsotope.isotope({
//         filter: $(this).data('filter')
//       });
//       aos_init();
//     });

//     // Initiate venobox (lightbox feature used in portofilo)
//     $(document).ready(function() {
//       $('.venobox').venobox();
//     });
//   });

//   // Skills section
//   $('.skills-content').waypoint(function() {
//     $('.progress .progress-bar').each(function() {
//       $(this).css("width", $(this).attr("aria-valuenow") + '%');
//     });
//   }, {
//     offset: '80%'
//   });

//   // Portfolio details carousel
//   $(".portfolio-details-carousel").owlCarousel({
//     autoplay: true,
//     dots: true,
//     loop: true,
//     items: 1
//   });

//   // Init AOS
//   function aos_init() {
//     AOS.init({
//       duration: 1000,
//       once: true
//     });
//   }
//   $(window).on('load', function() {
//     aos_init();
//   });

// })(jQuery);