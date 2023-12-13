<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode( 'social', 'mb2_shortcode_social' );

function mb2_shortcode_social( $atts, $content = null ){
	global $OUTPUT, $PAGE;

	$atts2 = array(
		'id' => 'social',
		'mt' => 0,
		'mb' => 30,
		'type' => 1,
		'size' => 'normal',
		'space' => 6,
		'rounded' => 'normal',
		//
		'color' => '',
		'bgcolor' => '',
		'borcolor' => '',
		'hcolor' => '',
		'hbgcolor' => '',
		'hborcolor' => '',
		//
		'custom_class' => '',
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$elstyle = '';
	$cls = '';
	$cls .= ' size' . $size;
	$cls .= ' rounded' . $rounded;

	$elstyle .= ' style="';
	$elstyle .= 'margin-top:' .  $mt . 'px;';
	$elstyle .= 'margin-bottom:' .  $mb . 'px;';
	$elstyle .= '--mb2-social-space:' .  $space . 'px;';
	$elstyle .= $color ? '--mb2-social-color:' .  $color . ';' : '';
	$elstyle .= $bgcolor ? '--mb2-social-bgcolor:' .  $bgcolor . ';' : '';
	$elstyle .= $borcolor ? '--mb2-social-borcolor:' .  $borcolor . ';' : '';
	$elstyle .= $hcolor ? '--mb2-social-hcolor:' .  $hcolor . ';' : '';
	$elstyle .= $hbgcolor ? '--mb2-social-hbgcolor:' .  $hbgcolor . ';' : '';
	$elstyle .= $hborcolor ? '--mb2-social-hborcolor:' .  $hborcolor . ';' : '';
	$elstyle .= '"';

	$socialtt = theme_mb2nl_theme_setting($PAGE, 'socialtt') == 1 ? 'top' : '';

	$cls .= ' type' . $type;
	$cls .= $custom_class ? ' ' . $custom_class : '';

	$output .= '<div class="mb2-pb-social' . $cls . '"' . $elstyle . '>';
	$output .= theme_mb2nl_social_icons(true, array( 'pos'=>'footer', 'tt'=>$socialtt ));
	$output .= '</div>';

	return $output;

}
