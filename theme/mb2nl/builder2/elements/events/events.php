<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode('mb2pb_events', 'mb2_shortcode_mb2pb_events');

function mb2_shortcode_mb2pb_events($atts, $content= null) {

	global $PAGE;

	$atts2 = array(
		'id' => 'events',
		'type' => 0,// 0 = all, 1 = site events
		'upcoming' => 0,
		'limit' => 8,
		'image' => 0,
		//
		'color1' => '',
		'color2' => '',
		//'carousel' => 0,
		'columns' => 3,
		'sloop' => 0,
		'snav' => 1,
		'sdots' => 0,
		'autoplay' => 0,
		'pausetime' => 5000,
		'animtime' => 450,
		//
		'layout' => 1, //1 - list, 2 - columns, 3 - carousel
		'gutter' => 'normal',
		'custom_class' => '',
		'mt' => 0,
		'mb' => 30,
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$cls = '';
	$list_cls = '';
	$style = '';
	$sliderid = $template ? '' : uniqid('swiper_');
	$modalid = uniqid();

	$cls .= $custom_class ? ' ' . $custom_class : '';

	$options = theme_mb2nl_page_builder_2arrays( $atts, $atts2 );
	$options['lazy'] = 0;
	$events = theme_mb2nl_get_events( $options );
	$eventtmpl =theme_mb2nl_events_template( $events, $options );

	// Carousel layout
	$list_cls .= $layout == 3 ? ' swiper-wrapper' : '';
	$list_cls .= $layout == 2 ? ' theme-boxes theme-col-' . $columns : '';
	$list_cls .= ' gutter-' . $gutter;
	$list_cls .= ' layout' . $layout;

	$super_cls = ' gutter-' . $gutter;

	$container_cls = $layout == 3 ? ' swiper' : '';

	//
	// $cls .= ' prestyle' . $prestyle;
	$cls .= $template ? ' mb2-pb-template-events' : '';
	//
	$style .= ' style="';
	$style .= 'margin-top:' . $mt . 'px;';
	$style .= 'margin-bottom:' . $mb . 'px;';
	$style .= $color1 ? '--mb2-pb-color1:' . $color1 . ';'  : '';
	$style .= $color2 ? '--mb2-pb-color2:' . $color2 . ';'  : '';
	$style .= '"';

	
	//
	$output .= '<div class="mb2-pb-content mb2-pb-element mb2-pb-events clearfix' . $cls . '"' . $style . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 ) . '>';
	$output .= '<div class="element-helper"></div>';
	$output .= theme_mb2nl_page_builder_el_actions( 'element', 'events' );
	$output .= '<div id="' . $sliderid . '" class="mb2-pb-content-inner mb2-pb-element-inner clearfix' . $container_cls . '">';
	$output .= theme_mb2nl_shortcodes_swiper_nav($sliderid);
	$output .= '<div class="mb2-pb-content-list' . $list_cls . '">';
	$output .= $eventtmpl;
	$output .= '</div>'; // mb2-pb-content-list
	$output .= theme_mb2nl_shortcodes_swiper_pagenavnav();
	$output .= '</div>'; // mb2-pb-content-inner
	//$output .= theme_mb2nl_events_modal($modalid);
	$output .= '</div>'; // mb2-pb-events

	//if ( $layout == 3 )
	//{
		// Init carousel
		//$PAGE->requires->js_call_amd( 'local_mb2builder/carousel','carouselInit', array($sliderid) );
	//}

	return $output;

}
