<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode('boxescircle', 'mb2_shortcode_boxescircle');
mb2_add_shortcode('boxescircle_item', 'mb2_shortcode_boxescircle_item');

function mb2_shortcode_boxescircle( $atts, $content = null ){
	extract( mb2_shortcode_atts( array(
		'type' => 1,
		'desc' => 1,
		'size' => 200,
		'gap' => 20,
		'bors' => 3,
		'mt' => 0,
		'mb' => 10, // 10 because box item has margin bottom 20 pixels
		'custom_class' => '',
	), $atts ) );

	$output = '';
	$style = '';
	$cls = '';
	$GLOBALS['crcl_desc'] = $desc;

	$cls .= ' type-' . $type;
	$cls .= ' desc' . $desc;
	$cls .= $custom_class ? ' ' . $custom_class : '';
	
	$style .= ' style="';
	$style .= 'margin-top:' . $mt . 'px;';
	$style .= 'margin-bottom:' . $mb . 'px;';
	$style .= '--mb2-pb-bcrcle-s:' . $size . 'px;';
	$style .= '--mb2-pb-bcrcle-gap:' . $gap . 'px;';
	$style .= '--mb2-pb-bcrcle-bors:' . $bors . 'px';
	$style .= '"';

	$output .= '<div class="mb2-pb-boxescircle' . $cls . '"' . $style . '>';
	$output .= '<div class="boxescircle-list">';
	$output .= mb2_do_shortcode( $content );
	$output .= '</div>';
	$output .= '</div>';

	unset( $GLOBALS['crcl_desc'] );

	return $output;

}




function mb2_shortcode_boxescircle_item( $atts, $content = null ){
	extract( mb2_shortcode_atts( array(
		'image' => theme_mb2nl_page_builder_demo_image( '1600x944' ),
		'title' => 'Box title here',
		'link' => '',
		'color' => '',
		'hcolor' => '',
		'bgcolor' => '',
		'borcolor' => '',
		'hbgcolor' => '',
		'hborcolor' => '',
		'link_target' => 0,
	), $atts ) );

	$output = '';
	$style = '';

	$style .= ' style="';
	//$style .= 'background-image:url(\'' . $image . '\');';
	$style .= $color ? '--mb2-pb-bcrcle-color:' . $color . ';' : '';
	$style .= $hcolor ? '--mb2-pb-bcrcle-hcolor:' . $hcolor . ';' : '';
	$style .= $bgcolor ? '--mb2-pb-bcrcle-bgcolor:' . $bgcolor . ';' : '';
	$style .= $borcolor ? '--mb2-pb-bcrcle-borcolor:' . $borcolor . ';' : '';
	$style .= $hbgcolor ? '--mb2-pb-bcrcle-hbgcolor:' . $hbgcolor . ';' : '';
	$style .= $hborcolor ? '--mb2-pb-bcrcle-hborcolor:' . $hborcolor . ';' : '';
	$style .= '"';	

	$target = $link_target ? ' target="_blank"' : '';
	$link_start = $link ? 'a href="' . $link . '"' . $target : 'div';
	$link_end = $link ? 'a' : 'div';

	$output .= '<' . $link_start . ' class="theme-boxcircle lazy"' . $style . ' data-bg="' . $image . '">';
	$output .= '<div class="box-content">';
	$output .= '<h4 class="box-title"><span class="box-title-text">' . format_text( $title, FORMAT_HTML ) . '</span></h4>';	
	$output .= $GLOBALS['crcl_desc'] ? '<div class="box-desc-text">' . urldecode( $content ) . '</div>' : '';
	$output .= '</div>'; // box-content
	$output .= '</' . $link_end . '>'; // theme-boxcircle

	return $output;

}