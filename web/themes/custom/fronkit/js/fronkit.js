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

      /**
       * home carrousel
       */
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
      });

      /**
       * home team slider
       */
      new Swiper('.team-swiper-container', {
        slidesPerView: 3,
        slidesPerGroup: 3,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
      });

      /**
       * home partners slider
       */
      new Swiper('.partners-swiper-container', {
        slidesPerView: 6,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
      });

      /**
       * Back to top button
       */
      window.onscroll = function () {
        if (document.getElementById('to-top') != null) {
          if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
            document.getElementById("to-top").style.display = "block";
          } else {
            document.getElementById("to-top").style.display = "none";
          }
        }
      };

      /**
       * fancybox Modal
       */
      $(".fancybox").fancybox();

      /**
       * initiate wow for animations
       */
      new WOW().init();

    }
  };

}(jQuery, Drupal));
