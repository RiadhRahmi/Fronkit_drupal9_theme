/**
 * @file
 * fronkit behaviors.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Behavior description.
   */
  Drupal.behaviors.fronkit = {
    attach: function (context, settings) {

      // fancybox Modal
      $(".fancybox").fancybox();

      // initiate wow for animations
      new WOW().init();

      // Navbar Fixed Top
      $(window).scroll(function() {
        if ($('.navbar').offset().top > 50) {
          $('.fixed-top').addClass('shadow-sm');
        } else {
          $('.fixed-top').removeClass('shadow-sm');
        }
      });

      // home carrousel
      new Swiper('.carrousel-swiper-container', {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        // autoplay: {
        //   delay: 5000,
        //   disableOnInteraction: false,
        // },
      });

      // home team slider
      new Swiper('.team-swiper-container', {
        slidesPerView: 1,
        slidesPerGroup: 1,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        breakpoints: {
          576: {
            slidesPerView: 2,
            slidesPerGroup: 2,
          },
          992: {
            slidesPerView: 3,
            slidesPerGroup: 3,
          },
        },
      });

      // home partners slider
      new Swiper('.partners-swiper-container', {
        slidesPerView: 2,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        breakpoints: {
          768: {
            slidesPerView: 3,
          },
          992: {
            slidesPerView: 4,
          },
          1200: {
            slidesPerView: 5,
          },
          1400: {
            slidesPerView: 6,
          },
        },
      });

      // Back to top button
      window.onscroll = function () {
        if (document.getElementById('btn-back-to-top') != null) {
          if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
            document.getElementById("btn-back-to-top").style.display = "block";
          } else {
            document.getElementById("btn-back-to-top").style.display = "none";
          }
        }
      };


    }
  };

}(jQuery, Drupal));
