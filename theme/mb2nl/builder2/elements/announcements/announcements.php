<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode('mb2pb_announcements', 'mb2_shortcode_mb2pb_announcements');

function mb2_shortcode_mb2pb_announcements($atts, $content= null) {

	global $PAGE;

	$atts2 = array(
		'id' => 'announcements',
		'limit' => 8,
		'pinned' => 0,
		'title' => '',
		'custom_class' => '',
		//
		'columns' => 1,
		'sloop' => 1,
		'snav' => 1,
		'sdots' => 0,
		'autoplay' => 1,
		'pausetime' => 4000,
		'animtime' => 350,
		'animtype' => 'slide',	
		//
		'bgcolor' => '',
		'rounded' => 0,
		'cbgcolor' => '',
		'ccolor' => '',
		'border' => 1,
		'height' => 36,
		'twidth' => 180,
		'icon' => 0,
		'mt' => 0,
		'mb' => 30,
		'courseprice' => 1,
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$cls = '';
	$style = '';
	$sliderid = $template ? '' : uniqid('swiper_');
	$titletext = $title ? $title : get_string('sitenews');

	$opts = theme_mb2nl_page_builder_2arrays( $atts, $atts2 );
	$opts['pb'] = 1;
	
	$cls .= $template ? ' mb2-pb-template-announcements ' : '';
	$cls .= ' icon' . $icon;
	$cls .= ' border' . $border;
	$cls .= ' rounded' . $rounded;

	$style .= ' style="';
	$style .= 'margin-top:' . $mt . 'px;';
	$style .= 'margin-bottom:' . $mb . 'px;';
	$style .= '--mb2-pb-ancts-h:' . $height . 'px;';
	$style .= '--mb2-pb-ancts-twidth:' . $twidth . 'px;';
	$style .= $bgcolor ? '--mb2-pb-ancts-bgcolor:' . $bgcolor . ';' : '';
	$style .= $cbgcolor ? '--mb2-pb-ancts-cbgcolor:' . $cbgcolor . ';' : '';
	$style .= $ccolor ? '--mb2-pb-ancts-ccolor:' . $ccolor . ';' : '';	
	$style .= '"';

	$output .= '<div class="mb2-pb-element mb2-pb-announcements clearfix' . $cls . '"' . $style . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 ) . '>';
	$output .= '<div class="element-helper"></div>';
	$output .= theme_mb2nl_page_builder_el_actions( 'element', 'sitenews' );
	$output .= '<div class="mb2-pb-content-inner mb2-pb-element-inner clearfix">';
	$output .= '<div class="mb2-pb-announcements-title">';
	$output .= '<span class="title-text">' . $titletext . '</span>';
	$output .= '<span class="title-icon"><i class="fa fa-bullhorn"></i></span>';
	$output .= '</div>';
	$output .= '<div class="mb2-pb-announcements-content">';
	$output .= '<div id="' . $sliderid . '" class="swiper">';
	$output .= theme_mb2nl_shortcodes_swiper_nav($sliderid);
	$output .= '<div class="mb2-pb-content-list swiper-wrapper">';
	$output .= theme_mb2nl_get_announcements_tmpl( $opts );
	$output .= '</div>'; // swiper-wrapper
	$output .= theme_mb2nl_shortcodes_swiper_pagenavnav();
	$output .= '</div>'; // swiper
	$output .= '</div>'; // mb2-pb-announcements-content
	$output .= '</div>'; // mb2-pb-content-inner
	$output .= '</div>'; // mb2-pb-content


	return $output;

}
