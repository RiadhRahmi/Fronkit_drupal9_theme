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
      $(window).scroll(function () {
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
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        on: {
          init: function (s) {
            startAnimation(s);
          },
          slideChangeTransitionStart: function (s) {
            stopAnimation(s);
          },
          slideChangeTransitionEnd: function (s) {
            startAnimation(s);
          },
        }
      });

      function startAnimation(s) {
        var currentSlide = $(s.slides[s.activeIndex]);
        currentSlide.find('.display-5').addClass('animate__animated animate__fadeInLeft visible');
        currentSlide.find('.field--name-field-description').addClass('animate__animated animate__fadeInLeft visible');
        currentSlide.find('.btn').addClass('animate__animated animate__fadeInLeft visible');
      }

      function stopAnimation(s) {
        var currentSlide = $(s.slides[s.activeIndex]);
        currentSlide.find('.display-5').removeClass('animate__animated animate__fadeInLeft visible');
        currentSlide.find('.field--name-field-description').removeClass('animate__animated animate__fadeInLeft visible');
        currentSlide.find('.btn').removeClass('animate__animated animate__fadeInLeft visible');
      }

      // home team slider
      new Swiper('.team-swiper-container', {
        spaceBetween: 30,
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
            slidesPerView: 4,
            slidesPerGroup: 4,
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
