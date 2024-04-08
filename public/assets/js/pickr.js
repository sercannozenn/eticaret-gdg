// npm package: @simonwep/pickr
// github link: https://github.com/Simonwep/pickr

$(function() {
  'use strict';

  // Simple example, see optional options for more configuration.
  // Pickr1
  const pickr1 = Pickr.create({
    el: '#pickr_1',
    theme: 'classic', // or 'monolith', or 'nano',
    default: '#6571ff',

    swatches: [
      'rgba(244, 67, 54, 1)',
      'rgba(233, 30, 99, 0.95)',
      'rgba(156, 39, 176, 0.9)',
      'rgba(103, 58, 183, 0.85)',
      'rgba(63, 81, 181, 0.8)',
      'rgba(33, 150, 243, 0.75)',
      'rgba(3, 169, 244, 0.7)',
      'rgba(0, 188, 212, 0.7)',
      'rgba(0, 150, 136, 0.75)',
      'rgba(76, 175, 80, 0.8)',
      'rgba(139, 195, 74, 0.85)',
      'rgba(205, 220, 57, 0.9)',
      'rgba(255, 235, 59, 0.95)',
      'rgba(255, 193, 7, 1)'
    ],

    components: {

      // Main components
      preview: true,
      opacity: true,
      hue: true,

      // Input / output Options
      interaction: {
          hex: true,
          rgba: true,
          hsla: true,
          hsva: true,
          cmyk: true,
          input: true,
          clear: true,
          save: true
      }
    }
  });


  // Pickr2
  const pickr2 = Pickr.create({
    el: '#pickr_2',
    theme: 'classic',
    default: '#05a34a',

    swatches: [
      'rgba(244, 67, 54, 1)',
      'rgba(233, 30, 99, 0.95)',
      'rgba(156, 39, 176, 0.9)'
    ],

    components: {
      preview: true,
      opacity: true,
      hue: true,
      interaction: {
        hex: true,
        rgba: true,
        input: true,
        clear: true,
        save: true
      }
    }
  });


  // Pickr3
  const pickr3 = Pickr.create({
    el: '#pickr_3',
    theme: 'classic',
    default: '#66d1d1',

    components: {
      preview: true,
      opacity: true,
      hue: true,
      interaction: {
        rgba: true,
        input: true,
        clear: true,
        save: true
      }
    }
  });

});