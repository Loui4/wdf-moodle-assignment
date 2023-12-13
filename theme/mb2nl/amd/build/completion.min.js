/**
 *
 * @package   theme_mb2nl
 * @copyright 2017 - 2022 Mariusz Boloz (https://mb2themes.com)
 * @license   Commercial https://themeforest.net/licenses
 */ define(["jquery","core/ajax","core/notification"],function(n,o,c){return{manualCompletion:function(){n('[data-action="toggle-manual-completion"]').click(function(){setTimeout(function(){o.call([{methodname:"theme_mb2nl_course_completion",args:{courseid:1345},done:function(n){console.log(n)},fail:c.exception}])},400)})}}});