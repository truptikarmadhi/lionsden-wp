export class Header{

    init() {
        this.HeaderFixed();
        this.BurgerMenu();
    }

    HeaderFixed() {
        // header fixed js
        var prevScrollPos = window.pageYOffset || document.documentElement.scrollTop;
        $(window).scroll(function () {
            var sticky = $(".header"),
                scroll = $(window).scrollTop();
            if (scroll >= 50) {
                sticky.addClass("header-fixed");
                sticky.removeClass("header-fixed-os");
            }
            else {
                sticky.removeClass("header-fixed");
                sticky.addClass("header-fixed-os");
            }
            var currentScrollPos = window.pageYOffset || document.documentElement.scrollTop;
            if (prevScrollPos > currentScrollPos || currentScrollPos === 0) {
                $(".header").removeClass("hidden");
            } else {
                $(".header").addClass("hidden");
            }
            prevScrollPos = currentScrollPos;
        });
    }

    BurgerMenu(){
        $('.burger-menu').click(function () {
            const isActive = $(this).hasClass('activate');

            if (!isActive) {
                // Open the burger menu
                $(this).addClass('activate');
                $('.header').addClass('header-active');
                $('.nav').removeClass('d-none');
                $('.button').removeClass('d-none');
                $('body').addClass('overflow-hidden');
                $('html').addClass('overflow-hidden');
            } else {
                // Close the burger menu
                $(this).removeClass('activate');
                $('.header').removeClass('header-active');
                $('.nav').addClass('d-none');
                $('.button').addClass('d-none');
                $('body').removeClass('overflow-hidden');
                $('html').removeClass('overflow-hidden');
            }
        });
    }
}
