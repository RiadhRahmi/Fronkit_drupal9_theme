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

      // new Swiper('.carrousel-swiper-container', {
      //   navigation: {
      //     nextEl: '.swiper-button-next',
      //     prevEl: '.swiper-button-prev',
      //   },
      //   pagination: {
      //     el: '.swiper-pagination',
      //     clickable: true,
      //   },
      // });
      //
      //
      // new Swiper('.team-swiper-container', {
      //   slidesPerView: 3,
      //   spaceBetween: 30,
      //   pagination: {
      //     el: '.swiper-pagination',
      //     clickable: true,
      //   },
      // });

      new Swiper('.partners-swiper-container', {
        slidesPerView: 6,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
      });

    }
  };

}(jQuery, Drupal));
