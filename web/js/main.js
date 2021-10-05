/* ---------------------------------------------- /*
 * Preloader
 /* ---------------------------------------------- */
(function () {
    $(window).on('load', function () {
        $('.loader').fadeOut();
        $('.page-loader').delay(300).fadeOut('slow');
    });

    $(document).ready(function () {

        function initLazy() {
            $(function () {
                $('.lazy').Lazy({
                    scrollDirection: 'vertical',
                    effect: 'fadeIn',
                    effectTime: 1000,
                    enableThrottle: true,
                    throttle: 250
                });
            });
        }

        /* ---------------------------------------------- /*
         * Scroll top
         /* ---------------------------------------------- */

        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.scroll-up').fadeIn();
            } else {
                $('.scroll-up').fadeOut();
            }
        });

        $('a[href="#totop"]').click(function () {
            $('html, body').animate({scrollTop: 0}, 'slow');
            return false;
        });

        initLazy();

        /* ---------------------------------------------- /*
         * Initialization General Scripts for all pages
         /* ---------------------------------------------- */

        var homeSection = $('.home-section'),
            navbar = $('.navbar-custom'),
            navHeight = navbar.height(),
            worksgrid = $('#works-grid'),
            width = Math.max($(window).width(), window.innerWidth),
            mobileTest = false;

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            mobileTest = true;
        }

        buildHomeSection(homeSection);
        navbarAnimation(navbar, homeSection, navHeight);
        navbarSubmenu(width);
        hoverDropdown(width, mobileTest);

        $(window).resize(function () {
            var width = Math.max($(window).width(), window.innerWidth);
            buildHomeSection(homeSection);
            hoverDropdown(width, mobileTest);
        });

        $(window).scroll(function () {
            effectsHomeSection(homeSection, this);
            navbarAnimation(navbar, homeSection, navHeight);
        });

        /* ---------------------------------------------- /*
         * Set sections backgrounds
         /* ---------------------------------------------- */

        var module = $('.home-section, .module, .module-small, .side-image');
        module.each(function (i) {
            if ($(this).attr('data-background')) {
                $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
            }
        });

        /* ---------------------------------------------- /*
         * Home section height
         /* ---------------------------------------------- */

        function buildHomeSection(homeSection) {
            if (homeSection.length > 0) {
                if (homeSection.hasClass('home-full-height')) {
                    homeSection.height($(window).height());
                } else {
                    homeSection.height($(window).height() * 0.85);
                }
            }
        }


        /* ---------------------------------------------- /*
         * Home section effects
         /* ---------------------------------------------- */

        function effectsHomeSection(homeSection, scrollTopp) {
            if (homeSection.length > 0) {
                var homeSHeight = homeSection.height();
                var topScroll = $(document).scrollTop();
                if ((homeSection.hasClass('home-parallax')) && ($(scrollTopp).scrollTop() <= homeSHeight)) {
                    homeSection.css('top', (topScroll * 0.55));
                }
                if (homeSection.hasClass('home-fade') && ($(scrollTopp).scrollTop() <= homeSHeight)) {
                    var caption = $('.caption-content');
                    caption.css('opacity', (1 - topScroll / homeSection.height() * 1));
                }
            }
        }

        /* ---------------------------------------------- /*
         * Transparent navbar animation
         /* ---------------------------------------------- */

        function navbarAnimation(navbar, homeSection, navHeight) {
            var topScroll = $(window).scrollTop();
            if (navbar.length > 0 && homeSection.length > 0) {
                if (topScroll >= navHeight) {
                    navbar.removeClass('navbar-transparent');
                } else {
                    navbar.addClass('navbar-transparent');
                }
            }
        }

        /* ---------------------------------------------- /*
         * Navbar submenu
         /* ---------------------------------------------- */

        function navbarSubmenu(width) {
            if (width > 767) {
                $('.navbar-custom .navbar-nav > li.dropdown').hover(function () {
                    var MenuLeftOffset = $('.dropdown-menu', $(this)).offset().left;
                    var Menu1LevelWidth = $('.dropdown-menu', $(this)).width();
                    if (width - MenuLeftOffset < Menu1LevelWidth * 2) {
                        $(this).children('.dropdown-menu').addClass('leftauto');
                    } else {
                        $(this).children('.dropdown-menu').removeClass('leftauto');
                    }
                    if ($('.dropdown', $(this)).length > 0) {
                        var Menu2LevelWidth = $('.dropdown-menu', $(this)).width();
                        if (width - MenuLeftOffset - Menu1LevelWidth < Menu2LevelWidth) {
                            $(this).children('.dropdown-menu').addClass('left-side');
                        } else {
                            $(this).children('.dropdown-menu').removeClass('left-side');
                        }
                    }
                });
            }
        }

        /* ---------------------------------------------- /*
         * Navbar hover dropdown on desctop
         /* ---------------------------------------------- */

        function hoverDropdown(width, mobileTest) {
            if ((width > 767) && (mobileTest !== true)) {
                $('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').removeClass('open');
                var delay = 0;
                var setTimeoutConst;
                $('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').hover(function () {
                        var $this = $(this);
                        setTimeoutConst = setTimeout(function () {
                            $this.addClass('open');
                            $this.find('.dropdown-toggle').addClass('disabled');
                        }, delay);
                    },
                    function () {
                        clearTimeout(setTimeoutConst);
                        $(this).removeClass('open');
                        $(this).find('.dropdown-toggle').removeClass('disabled');
                    });
            } else {
                $('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').unbind('mouseenter mouseleave');
                $('.navbar-custom [data-toggle=dropdown]').not('.binded').addClass('binded').on('click', function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    $(this).parent().siblings().removeClass('open');
                    $(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('open');
                    $(this).parent().toggleClass('open');
                });
            }
        }

        /* ---------------------------------------------- /*
         * Navbar collapse on click
         /* ---------------------------------------------- */

        $(document).on('click', '.navbar-collapse.in', function (e) {
            if ($(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle') {
                $(this).collapse('hide');
            }
        });

        $('nav li.dropdown-submenu ul').addClass('dropdown-menu');

        $('ul#w3 li a').addClass('more-padding');

        var $c = $("#category");

        var category = $c.text().trim();
        var type = $c.attr("data-type");

        if (category) {
            var $item = $("#w2 li a").filter(function () {
                if ($(this).text() === category) {
                    return $(this);
                }
                return null;
            });

            $item.parent('li').addClass('active');
            var text = $item.text();
            var href = $item.attr('href');

            if (type === 0) {
                $("li#category_nav a").first().attr("href", href).text(text).parent('li').addClass('active');
            }

            if (type === 1) {
                $("li#sport_nav a").first().attr("href", href).text(text).parent('li').addClass('active');
            }

        }

        var $verify = $('#ageVerify');

        if ($verify.length) {
            $verify.modal({
                backdrop: 'static',
                keyboard: false
            });

            $verify.data('bs.modal').$backdrop.addClass('dark-modal');
        }


        var options = {
            url: function (phrase) {
                return "/site/json?phrase=" + encodeURIComponent(phrase);
            },
            getValue: function (element) {
                return element.name;
            },
            list: {
                onClickEvent: function () {
                    var value = $("input#search").getSelectedItemData().link;

                    window.location = value;
                }
            },
            template: {
                type: "custom",
                method: function (title, item) {

                    if (item.type == 'country') {
                        return '<strong>' + item.name + '</strong>' + ' <small><i>(' + item.count + ') pics</i></small>';
                    } else {
                        return item.name;
                    }
                }
            },
            highlightPhrase: true,
            requestDelay: 300
        };

        $("input#search").easyAutocomplete(options);


    });
})(jQuery);

// $(document).on("click", "ul.product-gallery li a", function (e) {
//     e.preventDefault();
//     var scr = $(this).find('img').data('original-size');
//     $('img#product').attr('src', scr);
//
//     $('ul.product-gallery li').removeClass('li-gallery-border');
//     $(this).parent().addClass('li-gallery-border');
//
//     var url = $(this).find('img').data('url');
//     if (url) {
//         if (typeof (history.pushState) != "undefined") {
//             window.history.pushState("object or string", "Title", url);
//         }
//     }
//
//
//     return false;
// });

function openLink(url, target = '_blank') {
    window.open(url, target);
}

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$(document).on('click', 'i.fa-heart.like', function () {
    let url = $(this).data('url');
    let like = this;
    let tooltip = $(this).next('div.tooltip');

    $.ajax({
        type: "POST",
        url: url,
        success: function (response) {
            if (response.status === 'ok' && response.action === 'create') {
                $(like).addClass('liked');
                $(tooltip).find('.tooltip-inner').text(response.image.short_likes);
            }

            if (response.status === 'ok' && response.action === 'delete') {
                $(like).removeClass('liked');
                $(tooltip).find('.tooltip-inner').text(response.image.short_likes);
            }

            $('span.full-likes').text(response.image.likes);
        }
    });
});

$(document).on('click', 'span.not-sexy-button', function () {
    let url = $(this).data('url');
    let not_sexy = this;

    $.ajax({
        type: "POST",
        url: url,
        success: function (response) {
            if (response.status === 'ok') {
                $(not_sexy).fadeOut("slow");
            }
        }
    });

});

$(document).ready(function () {
    $(document).on('click', 'a.vote', function (event) {
        event.preventDefault();

        let url = $(this).attr('href');
        let element = this;
        let comment_id = $(this).parent().data('model');
        let voteUp = $('#voteUp' + comment_id);
        let voteDown = $('#voteDown' + comment_id);

        $.ajax({
            type: "POST",
            url: url,
            success: function (response) {
                if (response.status === 'ok') {

                    $(voteUp).removeClass('active');
                    $(voteDown).removeClass('active');

                    if (response.type !== 'delete') {
                        $(element).addClass('active');
                    }

                    $(voteUp).find('span').text(response.votes.up)
                    $(voteDown).find('span').text(response.votes.down)
                }
            }
        });
    });
});

jQuery(document).ready(function() {
    jQuery("time.timeago").timeago();
});