import "slick-carousel";

export class Plugins {
  init() {
    this.HeroSlider();
    this.BrandSlider();
    this.AboutSlider();
    this.TestimonialSlider();
    this.MediaSlider();
  }
  HeroSlider() {
    $(document).ready(function () {
      $(".hero-main-slider").slick({
        dots: true,
        infinite: false,
        arrows: false,
        fade: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
      });
    });
  }

  BrandSlider() {
    $(".brand-slider").slick({
      dots: false,
      infinite: true,
      arrows: false,
      speed: 300,
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed:2000,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }

  AboutSlider(){
    $('.about-us-slider').slick({
      dots: false,
      infinite: false,
      arrows: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });	
  }

  TestimonialSlider(){
    $('.testimonial-slider').slick({
      dots: false,
      infinite: false,
      arrows: true,
      prevArrow: '.testimonial-section .prev-arrow',
      nextArrow: '.testimonial-section .next-arrow',
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      fade:true,
    });	
  }

  MediaSlider(){
    $(document).ready(function(){
      $('.full-media-slider').slick({
          dots: false,
          infinite: false,
          speed: 300,
          slidesToShow: 1,
          slidesToScroll: 1,
          fade:true,
          arrows:true,
          prevArrow:'.full-media-slider-section .prev-arrow',
          nextArrow:'.full-media-slider-section .next-arrow',
      });
  });
  }
}
