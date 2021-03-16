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

      var swiper = new Swiper('.swiper-container', {
        slidesPerView: 6,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
      });

    }
  };

} (jQuery, Drupal));
