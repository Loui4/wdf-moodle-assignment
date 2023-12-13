/**
 *
 * @package   theme_mb2nl
 * @copyright 2017 - 2022 Mariusz Boloz (https://mb2themes.com)
 * @license   Commercial https://themeforest.net/licenses
 */ define(["jquery"],function(t){var e=function(e){if(!1===e&&null===n())return null;if(!1===e){var c="course-nav-"+n(),l=t(".course-nav-list-container");if(!t("#"+c).length)return null}else var c=e.attr("aria-controls"),l=e.closest(".course-nav-list-container");var i=t("#"+c);t(".course-nav-button").removeClass("active"),t(".course-nav-section").removeClass("active"),t('[aria-controls="'+c+'"]').addClass("active"),i.addClass("active"),l.each(function(){t(this).hasClass("layout-hor")&&a(t(this),0)}),s(i),o()},n=function(){var t=window.location.href;if(!t.includes("#custom_section-"))return null;var e=t.substring(t.indexOf("#"));return e.replace("#custom_","")},o=function(){t(".toggle-content-button").each(function(){var e=t(this),n=e.parent(),o=e.prev(),s=o.find(">div"),a=e.attr("data-height");s.outerHeight()>Math.ceil(2*a)?(n.addClass("toggle-content"),o.addClass("content")):(n.removeClass("toggle-content"),o.removeClass("content"))})},s=function(e){if(!e.length)return null;var n=t(window),o=e.offset().top,s=Math.ceil(o-t(".course-contentcol").attr("data-top")-10);s>0&&n.scrollTop()>o&&t("html, body").stop().animate({scrollTop:s},600)},a=function(e,n){0==e?t(".course-nav-list-container.layout-hor").removeClass("open"):e.removeClass("open"),n&&M.util.set_user_preference("course-nav-list-menu-state","close")},c=function(e,n){0==e?t(".course-nav-list-container.layout-hor").addClass("open"):e.addClass("open"),n&&M.util.set_user_preference("course-nav-list-menu-state","open")};return{sectionTabs:function(){t(".course-nav-button").each(function(){t(this).click(function(){e(t(this))})}),e(!1)},sectionsToggle:function(){t(".course-nav-list-container").hasClass("layout-hor")&&t("body").on("click",function(e){t(e.target).closest(".course-nav-list-ccontent").length||a(0,0)}),t(document).on("click",".course-nav-list-item-toggle",function(){var e=t(this).closest(".course-nav-list-container"),n=t(this).closest(".layout-hor").length?0:1;e.hasClass("open")?a(e,n):c(e,n)})},toggleCategory:function(){t(".toggle-list-btn").each(function(){t(this).click(function(){var e=t(this).closest(".filter-form-field");e.hasClass("active")?e.removeClass("active"):e.addClass("active")})})}}});