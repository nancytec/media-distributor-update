(function ($){
    'use strict';
    jQuery(document).ready(function () {
        //  preloader
        $(window).on("load",function() {
            $("#loading").delay(2000).fadeOut(500);
        });
        // lightcase
        $('a[data-rel^=lightcase]').lightcase();

        // counter up
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });

        //swiper initaial js
        var clientContainer1 = new Swiper('.client-container1', {
            slidesPerView: 4,
            grabCursor: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },
            loop: true,
            spaceBetween: 50,
            breakpoints: {
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                990: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0
                }
            }
        });



        var clientContainer2 = new Swiper('.client-container2', {
            slidesPerView: 5,
            grabCursor: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },
            loop: true,
            spaceBetween: 50,
            breakpoints: {
                990: {
                    slidesPerView: 4,
                    spaceBetween: 30
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                400: {
                    slidesPerView: 1,
                    spaceBetween: 0
                }
            }
        });

        // about slider
        var aboutSlideContainer = new Swiper('.bz-about-slide-container', {
            slidesPerView: 3,
            spaceBetween: 30,
            centeredSlides: true,
            grabCursor: true,
            autoplay: {
                delay: 205500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: '.about-slide-next-btn',
                prevEl: '.about-slide-prev-btn'
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'fraction'
            },
            loop: true
        });


        // post thumb slider
        var recentPostContainer = new Swiper('.recent-post-container', {
            grabCursor: true,
            autoplay: {
                delay: 205500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: '.recent-post-next-btn',
                prevEl: '.recent-post-prev-btn'
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            loop: true
        });


        // working process slider
        var workingProcessContainer = new Swiper('.bz-working-process-container', {
            slidesPerView: 3,
            spaceBetween: 20,
            slidesOffsetBefore: 1,
            autoplay: {
                delay: 15500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: '.process-slide-next-btn',
                prevEl: '.process-slide-prev-btn'
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'progressbar'
            },
            breakpoints: {
                990: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                550: {
                    slidesPerView: 1,
                    spaceBetween: 10
                }
            }
        });


        // team member slider
        var teamMemberContainer = new Swiper('.team-member-container', {
            slidesPerView: 4,
            spaceBetween: 0,
            grabCursor: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },
            breakpoints: {
                990: {
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 2
                },
                550: {
                    slidesPerView: 1
                }
            }
        });


        // working process slider
        var scContainer = new Swiper('.bz-sc-container', {
            slidesPerView: 1,
            spaceBetween: 20,
            grabCursor: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: '.about-slide-next-btn',
                prevEl: '.about-slide-prev-btn'
            }
        });

        // thumb slider
        var thumbSliderContainer = new Swiper('.thumb-slider-container', {
            slidesPerView: 1,
            spaceBetween: 20,
            grabCursor: true
        });

        // banner slider
        var bannerSliderContainer = new Swiper('.bz-banner-slider-container', {
            slidesPerView: 1,
            effect: 'fade',
            loop: true,
            autoplay: {
                delay: 15500,
                disableOnInteraction: true
            },
            navigation: {
                nextEl: '.banner-slide-next-btn',
                prevEl: '.banner-slide-prev-btn'
            }
        });


        // about slider
        var imageSliderContainer = new Swiper('.image-slider-container', {
            grabCursor: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: '.image-slide-next-btn',
                prevEl: '.image-slide-prev-btn'
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'progressbar'
            }
        });


        //portfolio-thumb slider
        var portfolioThumbContainer = new Swiper('.portfolio-thumb-container', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: '.portfolio-thumb-next-btn',
                prevEl: '.portfolio-thumb-prev-btn'
            }
        });


        // testimonial
        var galleryThumbs = new Swiper('.testimonial-thumbs', {
            spaceBetween: 0,
            grabCursor: true,
            slidesPerView: 3,
            // centeredSlides: true,
            // loop: true,
            // freeMode: true,
            loopedSlides: 2, //looped slides should be the same
            watchSlidesVisibility: true,
            watchSlidesProgress: true
        });
        var galleryTop = new Swiper('.testimonial-massage', {
            spaceBetween: 0,
            grabCursor: true,
            // loop:true,
            loopedSlides: 2, //looped slides should be the same
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            thumbs: {
                swiper: galleryThumbs
            },
        });



        var daTestimonialContainer1 = new Swiper('.da-portfolio-swiper-container', {
            loop: true,
            spaceBetween: 60,
            observer: true,
            observeParents: true,
            centeredSlides: true,
            centerSlide: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + '</span>';
                }
            },
            navigation: {
                nextEl: '.portfolio-next-btn',
                prevEl: '.portfolio-prev-btn'
            }
        });


        var portfolioSwiperContainer1 = new Swiper('.ca-portfolio-swiper-container', {
            loop: true,
            spaceBetween: 20,
            observer: true,
            observeParents: true,
            centerSlide: true,
            navigation: {
                nextEl: '.portfolio-button-next',
                prevEl: '.portfolio-button-prev'
            }
        });


        var appScreenshotContainer = new Swiper('.app-screenshot-container1', {
            loop: true,
            spaceBetween: 50,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '"><span>0' + (index + 1) + '</span><span></span></span>';
                }
            }
        });



        var datestimonialContainer = new Swiper('.app-testimonial-container1', {
            spaceBetween: 10,
            slidesPerView: 2,
            loop: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },
            breakpoints: {
                768: {
                    slidesPerView: 1,
                    spaceBetween: 0
                }
            }
        });

        var daclientlogoContainer = new Swiper('.da-client-logo-container1', {
            spaceBetween: 30,
            slidesPerView: 5,
            loop: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },
            breakpoints: {
                990: {
                    slidesPerView: 4,
                    spaceBetween: 10
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 10
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                400: {
                    slidesPerView: 1,
                    spaceBetween: 0
                }
            }
        });


        var datestimonialContainer = new Swiper('.da-testimonial-container1', {
            spaceBetween: 10,
            slidesPerView: 2,
            loop: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },
            breakpoints: {
                768: {
                    slidesPerView: 1,
                    spaceBetween: 0
                }
            }
        });


        //banner slider
        var bhbannerSliderContainer2 = new Swiper('.bh-banner-slider-container2', {
            slidesPerView: 1,
            spaceBetween: 0,
            grabCursor: true,
            loop: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: '.banner2-slide-next-btn',
                prevEl: '.banner2-slide-prev-btn'
            }
        });


        // hottest post js initiate
        var bhhottestPostContainer1 = new Swiper('.bh-hottest-post-container1', {
            slidesPerView: 1,
            spaceBetween: 50,
            grabCursor: true,
            loop: true,
            navigation: {
                nextEl: '.hottest-slide-next-btn',
                prevEl: '.hottest-slide-prev-btn'
            },
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + '</span>';
                }
            }
        });


        // popular post js initiate
        var bhpopularPostContainer1 = new Swiper('.bh-popular-post-container1', {
            slidesPerView: 3,
            spaceBetween: 30,
            grabCursor: true,
            loop: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: '.popular-slide-next-btn',
                prevEl: '.popular-slide-prev-btn'
            },
            breakpoints: {
                1200: {
                    slidesPerView: 2
                },
                768: {
                    slidesPerView: 1
                }
            }
        });



        //banner slider
        var bannerSliderContainer2 = new Swiper('.banner-slider-container2', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            freeMode: true,
            autoplay: {
                delay: 10500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: '.banner2-slide-next-btn',
                prevEl: '.banner2-slide-prev-btn'
            }
        });








        // init Isotope
        jQuery(window).on('load',function() {
            var $grid = $('.post-filter-container').isotope({
                itemSelector: '.post-element',
                layoutMode: 'fitRows',
                getSortData: {
                    name: '.name',
                    symbol: '.symbol',
                    number: '.number parseInt',
                    category: '[data-category]',
                    weight: function( itemElem ) {
                        var weight = $( itemElem ).find('.weight').text();
                        return parseFloat( weight.replace( /[\(\)]/g, '') );
                    }
                }
            });

            // filter functions
            var filterFns = {
                // show if number is greater than 50
                numberGreaterThan50: function() {
                    var number = $(this).find('.number').text();
                    return parseInt( number, 10 ) > 50;
                },
                // show if name ends with -ium
                ium: function() {
                    var name = $(this).find('.name').text();
                    return name.match( /ium$/ );
                }
            };

            // bind filter button click
            $('#filters').on( 'click', 'li', function() {
                var filterValue = $( this ).attr('data-filter');
                // use filterFn if matches value
                filterValue = filterFns[ filterValue ] || filterValue;
                $grid.isotope({ filter: filterValue });
            });


            // change is-checked class on buttons
            $('.button-group').each( function( i, buttonGroup ) {
                var $buttonGroup = $( buttonGroup );
                $buttonGroup.on( 'click', 'li', function() {
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    $( this ).addClass('is-checked');
                });
            });

        });




        // init Isotope
        jQuery(window).on('load',function() {
            var $grid = $('.bz-project-container').isotope({
                itemSelector: '.element-item',
                layoutMode: 'fitRows',
                getSortData: {
                    name: '.name',
                    symbol: '.symbol',
                    number: '.number parseInt',
                    category: '[data-category]',
                    weight: function( itemElem ) {
                        var weight = $( itemElem ).find('.weight').text();
                        return parseFloat( weight.replace( /[\(\)]/g, '') );
                    },
                }
            });

            $('.bz-project-container').isotope({
                itemSelector: '.element-item',
                percentPosition: true,
                masonry: {
                    // use outer width of grid-sizer for columnWidth
                    columnWidth: '.project-container-sizer'
                }
            });

            // filter functions
            var filterFns = {
                // show if number is greater than 50
                numberGreaterThan50: function() {
                    var number = $(this).find('.number').text();
                    return parseInt( number, 10 ) > 50;
                },
                // show if name ends with -ium
                ium: function() {
                    var name = $(this).find('.name').text();
                    return name.match( /ium$/ );
                }
            };

            // bind filter button click
            $('#filters').on( 'click', 'li', function() {
                var filterValue = $( this ).attr('data-filter');
                // use filterFn if matches value
                filterValue = filterFns[ filterValue ] || filterValue;
                $grid.isotope({ filter: filterValue });
            });


            // change is-checked class on buttons
            $('.button-group').each( function( i, buttonGroup ) {
                var $buttonGroup = $( buttonGroup );
                $buttonGroup.on( 'click', 'li', function() {
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    $( this ).addClass('is-checked');
                });
            });

        });


        //menu
        $('.menu-bar').on("click", function(){
            $('body').toggleClass('open-mobile-menu');
        });
        $('.close-bar').on("click", function(){
            $('body').removeClass('open-mobile-menu');
        });
        $('.close-button').on("click", function(){
            $('body').removeClass('open-mobile-menu');
        });


        new WOW().init();



        // search
        $('.search-option').on("click", function(){
            $('body').addClass('search-open');
        })
        $('.close-search').on("click", function(){
            $('body').removeClass('search-open');
        })

        // mobile menu javascript
        $('.mobile-menu>ul>li>a,.mobile-menu ul.mobile-submenu>li>a').on('click', function(e) {
            var element = $(this).parent('li');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.find('li').removeClass('open');
                element.find('ul').slideUp(1500,"swing");
            }
            else {
                element.addClass('open');
                element.children('ul').slideDown(1500,"swing");
                element.siblings('li').children('ul').slideUp(1500,"swing");
                element.siblings('li').removeClass('open');
                element.siblings('li').find('li').removeClass('open');
                element.siblings('li').find('ul').slideUp(1500,"swing");
            }
        });
        $('.dropdown>a').on('click', function(e){
            e.preventDefault();
        })

        // fixed menu
        $(window).on("scroll",function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 100) {
                $(".main-menu-area").addClass("fixed-menu slideInDown");
            } else {
                $(".main-menu-area").removeClass("fixed-menu slideInDown");
            }
        });






        // fixed menu app home page
        $(window).on("scroll",function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 100) {
                $(".app-main-menu-area").addClass("fixed-totop animate slideInDown");
            } else {
                $(".app-main-menu-area").removeClass("fixed-totop  animate slideInDown");
            }
        });



        // fixed menu
        $(window).on("scroll",function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 500) {
                $(".to-top").addClass("fixed-totop");
            } else {
                $(".to-top").removeClass("fixed-totop");
            }
        });


        // countdown or date & time
        $('#countdown').countdown({
            date: '10/22/2020 17:00:00',
            offset: +2,
            day: 'Day',
            days: 'Days'
        });


        $(".flip-card").flip({
            axis: 'x',
            trigger: 'hover'
        });


        /* ===================================
            Mouse parallax
        ====================================== */

        if($(window).width() > 780) {
            $('.da-banner-section,.da-working-process-section').mousemove(function (e) {
                $('[data-depth]').each(function () {
                    var depth = $(this).data('depth');
                    var amountMovedX = (e.pageX * -depth / 4);
                    var amountMovedY = (e.pageY * -depth / 4);

                    $(this).css({
                        'transform': 'translate3d(' + amountMovedX + 'px,' + amountMovedY + 'px, 0)',
                    });
                });
            });
        }
    });
})(jQuery);



(function ($){
    'use strict';
    jQuery(document).ready(function () {

        var image = document.getElementsByClassName('thumbnail');
        new simpleParallax(image);

    });
})(jQuery);
