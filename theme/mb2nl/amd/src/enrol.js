/**
 *
 * @package   theme_mb2nl
 * @copyright 2017 - 2022 Mariusz Boloz (https://mb2themes.com)
 * @license   Commercial https://themeforest.net/licenses
 */ define(["jquery"],function(t){var e=function(e,o,a){var n=t(window),s=t("body"),r=t(".enrol-course-nav"),c=t(".enrol-course-nav-replace"),l=c.offset().top;if(!s.hasClass("eopn1"))return null;n.scrollTop()>l+(o-e)?(c.css("height",o),r.addClass("sticky-cel"),a&&r.removeClass("tabalt")):(r.removeClass("sticky-cel"),a&&r.addClass("tabalt"),c.css("height",0))},o=function(e){t(".enrol-course-navitem").removeClass("active"),t(".enrol-course-navcontent").removeClass("active"),t('button[aria-controls="'+e.attr("aria-controls")+'"]').closest(".enrol-course-navitem").addClass("active"),t("#"+e.attr("aria-controls")).addClass("active")},a=function(e,o){var a=t(window),n=t(".enrol-course-navcontent"),s=n.length,r=0;n.each(function(){r++;var n=t(this).offset().top,c=t(this).outerHeight(),l=n-o-e,i=t('button[aria-controls="'+t(this).attr("id")+'"]').closest(".enrol-course-navitem").addClass("active"),u=r==s?l+.33*c:l+c;a.scrollTop()>=l&&a.scrollTop()<=u?i.addClass("active"):i.removeClass("active")})};return{contentTabs:function(){t(".enrol-course-navitem button,.out-navitem").each(function(){t(this).click(function(e){e.preventDefault(),o(t(this))})})},onePageNav:function(){var o=t(".enrol-course-nav"),n=t(".enrol-course-nav").outerHeight(),s=t(".enrol-course-nav").outerHeight(!0),r=s-n,c=t(".details-section").outerHeight(!0)-t(".details-section").outerHeight(),l=!!o.hasClass("tabalt");t(".enrol-course-navitem button,.out-navitem").each(function(){t(this).click(function(e){e.preventDefault(),t("html, body").stop().animate({scrollTop:t("#"+t(this).attr("aria-controls")).offset().top-r-.3*c},1200)})}),e(n,s,l),a(n,c),t(window).on("scroll",function(){e(n,s,l),a(n,c)})}}});