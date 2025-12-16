import $ from 'jquery';
import '@popperjs/core';
import 'bootstrap/dist/js/bootstrap'; 
import '../../node_modules/slick-carousel/slick/slick.js';

import { Fancybox } from "@fancyapps/ui";
import { App } from './parts/app.js'
import { Plugins } from './parts/plugins.js'
import { Parts } from './parts/parts.js'
import { Header } from './parts/header.js';
import { Video } from './parts/video.js';
import WOW from 'wow.js';

window.$ = $;
window.jQuery = jQuery;

$(function () {

  window.windowWidth = $(window).width();
  window.windowHeight = $(window).height();

  window.isiPhone = navigator.userAgent.toLowerCase().indexOf('iphone');
  window.isiPad = navigator.userAgent.toLowerCase().indexOf('ipad');
  window.isiPod = navigator.userAgent.toLowerCase().indexOf('ipod');

  window.app = new App();
  window.app.init();

  window.plugins = new Plugins();
  window.plugins.init();

  window.parts = new Parts();
  window.parts.init();

  window.header = new Header();
  window.header.init();

  window.video = new Video();
  window.video.init();
});


Fancybox.bind("[data-fancybox]", {
Thumbs: false,
      Toolbar: true,
});

new WOW({
  boxClass: 'wow',
  animateClass: 'animated',
  once: true,
  mobile: true,
}).init();