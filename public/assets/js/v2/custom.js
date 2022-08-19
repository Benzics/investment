/*

Template: Hi-soft - IT Solutions and Services Company HTML5 Template
Author: potenzaglobalsolutions
Design and Developed by: potenzaglobalsolutions.com

NOTE: This file contains all scripts for the actual Template.

*/

/*================================================
[  Table of contents  ]
================================================

:: Sticky
:: Secondary Sticky
:: Menu
:: Tooltip
:: Counter
:: Owl Carousel
:: Magnific Popup
:: Countdown
:: SwiperAnimation
:: Typer
:: Search
:: Shuffle
:: Pricing Tabs
:: Back to top

======================================
[ End table content ]
======================================*/
//POTENZA var

(function ($) {
  "use strict";
  var POTENZA = {};

/*************************
  Predefined Variables
*************************/
  var $window = $(window),
    $document = $(document),
    $body = $('body'),
    $countdownTimer = $('.countdown'),
    $counter = $('.counter');
  //Check if function exists
  $.fn.exists = function () {
    return this.length > 0;
  };


/*************************
         Sticky
*************************/
POTENZA.isSticky = function () {
  $(window).on('scroll',function(event) {
        var scroll = $(window).scrollTop();
        if (scroll < 300) {
            $(".stick-top").removeClass("sticky-top");
        }else{
            $(".stick-top").addClass("sticky-top");
        }
    });
};

/*************************
    Secondary Sticky
*************************/
POTENZA.secondarySticky = function () {
  $(window).on('scroll',function(event) {
        var scroll = $(window).scrollTop();
        if (scroll < 500) {
            $(".header-inner-nav").removeClass("page-menu-top");
        }else{
            $(".header-inner-nav").addClass("page-menu-top");
        }
        console.log($('div').hasClass('header-inner-nav'));
        if( $('div').hasClass('header-inner-nav') ) {
          var div_height = 90 + $('.header-inner-nav').height();
          $('.is-sticky').css('top',div_height);
        } else{
          $('.is-sticky').css('top','80px');
        }
    });

	$( document ).on( 'click', '.header-inner-nav .nav-item a', function(){
		$('.header-inner-nav .nav-item a').removeClass('active');
		$(this).addClass('active');
    });
	$( document ).on( 'click', '.header-inner-nav .nav-item a', function(){
        $('html, body').animate({
            scrollTop: $( $(this).attr('href') ).offset().top-120
        }, 1000);
        return false;
    });
};

/*************************
    Menu
*************************/
POTENZA.dropdownmenu = function () {
  if ($('.navbar').exists()) {
    $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
      if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
      }
      var $subMenu = $(this).next(".dropdown-menu");
      $subMenu.toggleClass('show');
      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
        $('.dropdown-submenu .show').removeClass("show");
      });
      return false;
    });
  }
};

/*************************
      Tooltip
*************************/
$('[data-toggle="tooltip"]').tooltip();
$('[data-toggle="popover"]').popover()

/*************************
       Counter
*************************/
  POTENZA.counters = function () {
    var counter = jQuery(".counter");
    if (counter.length > 0) {
      $counter.each(function () {
        var $elem = $(this);
        $elem.appear(function () {
          $elem.find('.timer').countTo();
        });
      });
    }
  };

/*************************
       Owl Carousel
*************************/
  POTENZA.carousel = function () {
    var owlslider = jQuery("div.owl-carousel");
    if (owlslider.length > 0) {
      owlslider.each(function () {
        var $this = $(this),
          $items = ($this.data('items')) ? $this.data('items') : 1,
          $loop = ($this.attr('data-loop')) ? $this.data('loop') : true,
          $navdots = ($this.data('nav-dots')) ? $this.data('nav-dots') : false,
          $navarrow = ($this.data('nav-arrow')) ? $this.data('nav-arrow') : false,
          $autoplay = ($this.attr('data-autoplay')) ? $this.data('autoplay') : true,
          $autospeed = ($this.attr('data-autospeed')) ? $this.data('autospeed') : 5000,
          $smartspeed = ($this.attr('data-smartspeed')) ? $this.data('smartspeed') : 1000,
          $autohgt = ($this.data('autoheight')) ? $this.data('autoheight') : false,
          $space = ($this.attr('data-space')) ? $this.data('space') : 30,
          $animateOut = ($this.attr('data-animateOut')) ? $this.data('animateOut') : false;

        $(this).owlCarousel({
          loop: $loop,
          items: $items,
          responsive: {
            0: {
              items: $this.data('xx-items') ? $this.data('xx-items') : 1
            },
            480: {
              items: $this.data('xs-items') ? $this.data('xs-items') : 1
            },
            768: {
              items: $this.data('sm-items') ? $this.data('sm-items') : 2
            },
            980: {
              items: $this.data('md-items') ? $this.data('md-items') : 3
            },
            1200: {
              items: $items
            }
          },
          dots: $navdots,
          autoplayTimeout: $autospeed,
          smartSpeed: $smartspeed,
          autoHeight: $autohgt,
          margin: $space,
          nav: $navarrow,
          navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
          autoplay: $autoplay,
          autoplayHoverPause: true
        });
      });
    }
  }

  /*************************
      Magnific Popup
  *************************/
  POTENZA.mediaPopups = function () {
    if ($(".popup-single").exists() || $(".popup-gallery").exists() || $('.modal-onload').exists() || $(".popup-youtube, .popup-vimeo, .popup-gmaps").exists()) {
      if ($(".popup-single").exists()) {
        $('.popup-single').magnificPopup({
          type: 'image'
        });
      }
      if ($(".popup-gallery").exists()) {
        $('.popup-gallery').magnificPopup({
          delegate: 'a.portfolio-img',
          type: 'image',
          tLoading: 'Loading image #%curr%...',
          mainClass: 'mfp-img-mobile',
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
          }
        });
      }
      if ($(".popup-youtube, .popup-vimeo, .popup-gmaps").exists()) {
        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,
          fixedContentPos: false
        });
      }
      var $modal = $('.modal-onload');
      if ($modal.length > 0) {
        $('.popup-modal').magnificPopup({
          type: 'inline'
        });
        $(document).on('click', '.popup-modal-dismiss', function (e) {
          e.preventDefault();
          $.magnificPopup.close();
        });
        var elementTarget = $modal.attr('data-target');
        setTimeout(function () {
          $.magnificPopup.open({
            items: {
              src: elementTarget
            },
            type: "inline",
            mainClass: "mfp-no-margins mfp-fade",
            closeBtnInside: !0,
            fixedContentPos: !0,
            removalDelay: 500
          }, 0)
        }, 1500);
      }
    }
  }

/*************************
       Countdown
*************************/
  POTENZA.countdownTimer = function () {
    if ($countdownTimer.exists()) {
      $countdownTimer.downCount({
        date: '12/25/2020 12:00:00', // Month/Date/Year HH:MM:SS
        offset: -4
      });
    }
  }

/*************************
   SwiperAnimation
*************************/
POTENZA.swiperAnimation = function () {
  var siperslider = jQuery(".swiper-container");
  if (siperslider.length > 0) {
    var swiperAnimation = new SwiperAnimation();
        var swiper = new Swiper(".swiper-container", {
          init : true,
          direction: "horizontal",
          effect: "slide",
          loop: true,

          keyboard: {
            enabled: true,
            onlyInViewport: true
          },
            // Navigation arrows
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
          on: {
            init: function() {
              swiperAnimation.init(this).animate();
            },
            slideChange: function() {

              swiperAnimation.init(this).animate();
            }
          }
        });
    }
  }

/*************************
       Typer
*************************/
POTENZA.typer = function () {
  if ($('.typer').exists()) {
    }
};

/*************************
       Search
*************************/
POTENZA.searchbox = function () {
   if (jQuery('.search').exists()) {
      jQuery('.search-btn').on('click', function () {
         jQuery('.search').toggleClass("search-open");
           return false;
          });
       jQuery("html, body").on('click', function (e) {
        if (!jQuery(e.target).hasClass("not-click")) {

             jQuery('.search').removeClass("search-open");
         }
     });
    }
}

/*************************
    Shuffle
*************************/
   POTENZA.shuffle = function () {
    if (jQuery('.my-shuffle-container').exists()) {
    var Shuffle = window.Shuffle;
      var element = document.querySelector('.my-shuffle-container');
      var sizer = element.querySelector('.my-sizer-element');

      var shuffleInstance = new Shuffle(element, {
        itemSelector: '.grid-item',
        sizer: sizer, // could also be a selector: '.my-sizer-element'
        speed: 700,
        columnThreshold: 0
      });
      jQuery(document).ready(function(){
		jQuery( document ).on( 'click', '.btn-filter', function(){
          var data_group = jQuery(this).attr('data-group');
          if( data_group != 'all' ){
            shuffleInstance.filter([data_group]);
          } else {
            shuffleInstance.filter();
          }
        });
      });
    }
 }

/*************************
    Pricing Tabs
*************************/
POTENZA.pricingtabs = function () {
    jQuery('.pricing-tab-switcher').on('click', function() {
      jQuery(this).toggleClass('active');
      jQuery('.pricing-price').toggleClass('change-pricing-price');
    });
  }

/*************************
     Back to top
*************************/
  POTENZA.goToTop = function () {
    var $goToTop = $('#back-to-top');
    $goToTop.hide();
    $window.scroll(function () {
      if ($window.scrollTop() > 100) $goToTop.fadeIn();
      else $goToTop.fadeOut();
    });
    $goToTop.on("click", function () {
      $('body,html').animate({
        scrollTop: 0
      }, 1000);
      return false;
    });
  }


/****************************************************
     POTENZA Window load and functions
****************************************************/

  //Window load functions
  $window.on("load", function () {
    POTENZA.shuffle();
  });

  //Document ready functions
  $document.ready(function () {
    POTENZA.isSticky(),
    POTENZA.secondarySticky(),
    POTENZA.counters(),
    POTENZA.dropdownmenu(),
    POTENZA.goToTop(),
    POTENZA.countdownTimer(),
    POTENZA.mediaPopups(),
    POTENZA.pricingtabs(),
    POTENZA.carousel(),
    POTENZA.swiperAnimation(),
    POTENZA.searchbox(),
    POTENZA.typer();
  });


})(jQuery);
