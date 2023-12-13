<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode('mb2pb_boxescircle', 'mb2_shortcode_mb2pb_boxescircle');
mb2_add_shortcode('mb2pb_boxescircle_item', 'mb2_shortcode_mb2pb_boxescircle_item');

function mb2_shortcode_mb2pb_boxescircle($atts, $content= null){

	$atts2 = array(
		'id' => 'boxescircle',
		'type' => 1,
		'desc' => 1,
		'size' => 200,
		'gap' => 20,
		'bors' => 3,
		'mt' => 0,
		'mb' => 10, // 10 because box item has margin bottom 20 pixels
		'custom_class' => '',
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$style = '';
	$cls = '';

	$cls .= ' type-' . $type;
	$cls .= ' desc' . $desc;
	$cls .= $custom_class ? ' ' . $custom_class : '';
	$templatecls = $template ? ' mb2-pb-template-boxescircle' : '';

	
	$style .= ' style="';
	$style .= 'margin-top:' . $mt . 'px;';
	$style .= 'margin-bottom:' . $mb . 'px;';
	$style .= '--mb2-pb-bcrcle-s:' . $size . 'px;';
	$style .= '--mb2-pb-bcrcle-gap:' . $gap . 'px;';
	$style .= '--mb2-pb-bcrcle-bors:' . $bors . 'px';
	$style .= '"';

	$content = $content;

	if ( ! $content )
	{
		$demoimage = theme_mb2nl_page_builder_demo_image( '200x200' );

		for (  $i = 1; $i <= 3; $i++ )
		{
			$content .= '[mb2pb_boxescircle_item image="' . $demoimage . '" title="Box title here" ]Box content here[/mb2pb_boxescircle_item]';
		}
	}

	$output .= '<div class="mb2-pb-element mb2-pb-boxescircle' . $templatecls . '"' . $style . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 ) . '>';
	$output .= '<div class="element-helper"></div>';
	$output .= theme_mb2nl_page_builder_el_actions( 'element', 'boxescircle' );
	$output .= '<div class="mb2-pb-element-inner' . $cls . '">';
	$output .= '<div class="mb2-pb-sortable-subelements boxescircle-list">';
	//$output .= '<div class="boxescircle-list">';
	$output .= mb2_do_shortcode( $content );
	//$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;

}


function mb2_shortcode_mb2pb_boxescircle_item($atts, $content = null){

	$atts2 = array(
		'id' => 'boxescircle_item',
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
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$style = '';

	$content = ! $content ? 'Box content here' : $content;
	$atts2['text'] = $content;

	$style .= ' style="';
	$style .= 'background-image:url(\'' . $image . '\');';
	$style .= $color ? '--mb2-pb-bcrcle-color:' . $color . ';' : '';
	$style .= $hcolor ? '--mb2-pb-bcrcle-hcolor:' . $hcolor . ';' : '';
	$style .= $bgcolor ? '--mb2-pb-bcrcle-bgcolor:' . $bgcolor . ';' : '';
	$style .= $borcolor ? '--mb2-pb-bcrcle-borcolor:' . $borcolor . ';' : '';
	$style .= $hbgcolor ? '--mb2-pb-bcrcle-hbgcolor:' . $hbgcolor . ';' : '';
	$style .= $hborcolor ? '--mb2-pb-bcrcle-hborcolor:' . $hborcolor . ';' : '';
	$style .= '"';	

	$output .= '<div class="mb2-pb-subelement mb2-pb-boxescircle_item"' . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 ) . '>';
	$output .= theme_mb2nl_page_builder_el_actions( 'subelement' );
	$output .= '<div class="subelement-helper"></div>';
	$output .= '<div class="mb2-pb-subelement-inner">';
	$output .= '<div class="theme-boxcircle"' . $style . '>';
	$output .= '<div class="box-content">';	

	$output .= '<h4 class="box-title"><span class="box-title-text">' . format_text( $title, FORMAT_HTML ) . '</span></h4>';
	
	$output .= '<div class="box-desc-text">' . urldecode( $content ) . '</div>';

	$output .= '</div>'; // box-content
	$output .= '</div>'; // theme-boxcircle
	
	$output .= '</div>';
	$output .= '</div>';


	return $output;

}
