/**
 *
 * @package   theme_mb2nl
 * @copyright 2017 - 2022 Mariusz Boloz (https://mb2themes.com)
 * @license   Commercial https://themeforest.net/licenses
*/ define(["jquery","core/modal_events"],function(a,t){var s=function(t){var s=t.keyCode?t.keyCode:t.which,e='a,button,[type="submit"],input,textarea,.nav-link';a(""+e).focus(function(){"true"!==a("body").attr("data-keydown")||a("body").hasClass("pagelayout-mb2builder")||9!=s||a(this).addClass("themefocused"),a("body").attr("data-keydown","false")}),a(""+e).focusout(function(){a(this).removeClass("themefocused")})},e=function(t){var s=a('.acsb-button[data-id="'+t+'"]');if(!s.hasClass("active"))return null;s.removeClass("active"),a("html").removeClass("acsb_"+t),"readingmask"===t&&a(".acsb_mask").remove(),("contrastdark"===t||"contrastlight"===t)&&v(),"readingguide"===t&&a(".acsb_readinguide-el").remove(),M.util.set_user_preference("acsb_"+t,0)},c=function(t){a('.acsb-button[data-id="'+t+'"]').addClass("active"),a("html").addClass("acsb_"+t),"readingmask"===t&&i(),"readingguide"===t&&n(),M.util.set_user_preference("acsb_"+t,1);var s=a('.acsb-button[data-id="'+t+'"]').attr("data-disable").split(",");if(s.length)for(var c=0;c<s.length;c++)e(s[c]);("contrastdark"===t||"contrastlight"===t)&&f()},i=function(){var t="";o(),t+='<div class="acsb_mask acsb_masktop"></div>',t+='<div class="acsb_mask acsb_maskbottom"></div>',a("body").append(t)},n=function(){var t="";r(),t+='<div class="acsb_readinguide-el"></div>',a("body").append(t)},o=function(){var t=a(window);t.mousemove(function(s){a(".acsb_masktop").css("height",s.clientY-60),a(".acsb_maskbottom").css("height",t.height()-s.clientY-60)})},r=function(){a(window).mousemove(function(t){a(".acsb_readinguide-el").css("top",t.clientY+3),a(".acsb_readinguide-el").css("left",t.clientX-400)})},l=function(){a(".acsb-reset").click(function(){b(),a(".acsb-button").each(function(){e(a(this).attr("data-id"))})})},b=function(){a(".acsb-profile-item").each(function(){var t=a(this),s=t.attr("data-acsb").split(",");if(!t.hasClass("active"))return null;for(var c=0;c<s.length;c++)e(s[c]);t.removeClass("active"),M.util.set_user_preference("acsb_"+t.attr("data-id"),0)})},d=function(){var t=0;return a(".acsb-button").each(function(){a(this).hasClass("active")&&(t=1)}),t},u=function(){a(".acsb-block").removeClass("visible");var t=a(".acsb-trigger");d()&&!t.hasClass("active")?(t.addClass("active"),M.util.set_user_preference("acsb_trigger",1)):!d()&&t.hasClass("active")&&(t.removeClass("active"),M.util.set_user_preference("acsb_trigger",0),b())},h=function(a,t){for(var s=a,i=s.attr("data-acsb").split(","),n=0,o=0;o<i.length;o++)t?c(i[o]):e(i[o]);t?s.addClass("active"):s.removeClass("active"),t&&(n=1),M.util.set_user_preference("acsb_"+s.attr("data-id"),n)},f=function(){var t=m();a(t.join()).addClass("mb2scsb-contrast")},v=function(){a(".mb2scsb-contrast").removeClass("mb2scsb-contrast")},m=function(){var t=a(".acsb-block").attr("data-selectors").split(",");return a("html").hasClass("acsb_contrastdark")?t.concat([".mb2-pb-row.light .mb2-pb-row-inner",]):a("html").hasClass("acsb_contrastlight")?t.concat([".mb2-pb-row.dark .mb2-pb-row-inner",]):void 0};return{focusClass:function(){a(window).keydown(function(t){a("body").attr("data-keydown","true"),s(t)})},acsbTools:function(){a(".acsb-trigger").click(function(){var t=a(".acsb-block");t.hasClass("visible")||t.addClass("visible")}),a(".acsb-block-close").click(function(){u()}),a("body").on("click",function(t){var s=a(t.target);s.closest(".acsb-block").length||s.closest(".acsb-trigger").length||u()}),a(".acsb-profile-item").each(function(){a(this).click(function(){a(this).hasClass("active")?h(a(this),0):(b(),h(a(this),1))})}),a(".acsb-button").each(function(){var t=a(this).attr("data-id");a(this).click(function(){a(this).hasClass("active")?e(t):c(t)})}),a("html").hasClass("acsb_readingmask")&&i(),a("html").hasClass("acsb_readingguide")&&n(),(a("html").hasClass("acsb_contrastdark")||a("html").hasClass("acsb_contrastlight"))&&(f(),a(document).on(t.shown,".modal",function(){a(document).ajaxComplete(function(){setTimeout(function(){f()},600)})})),l()}}});