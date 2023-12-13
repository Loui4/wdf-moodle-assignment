<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode( 'mb2pb_animnum', 'mb2_shortcode_mb2pb_animnum' );
mb2_add_shortcode( 'mb2pb_animnum_item', 'mb2_shortcode_mb2pb_animnum_item' );

function mb2_shortcode_mb2pb_animnum ( $atts, $content = null ){

	global $PAGE;

	$atts2 = array(
		'id' => 'animnum',
		'columns' => 4, // max 5
		'mt' => 0,
		'mb' => 0, // 0 because box item has margin bottom 30 pixels
		//'pv' => 30,
		'gutter' => 'normal',
		'icon' => 0,
		'center'=> 1,
		'size_number' => 3,
		'size_icon' => 3,
		'size_title' => 1.4,
		'color_icon' => '',
		'color_number' => '',
		'nmt' => 0,
		'nmb' => 8,
		'nfstyle' => 'normal',
		//'fw_number' => 600,
		//'fweight_title' => 600,
		//'lh_title' => 1.2,
		'nfwcls' => 'global',
		'tfwcls' => 'global',
		'tlhcls' => 'global',
		'color_title' => '',
		'color_subtitle' => '',
		'color_bg' => '',
		'subtitle' => 0,
		'nopadding' => 0,
		'custom_class' => '',
		'aspeed' => 10000,
		'height' => 0,
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$cls = '';
	$style = '';
	$GLOBALS['size_number'] = $size_number;
	$GLOBALS['size_title'] = $size_title;
	//$GLOBALS['size_icon'] = $size_icon;
	$GLOBALS['color_icon'] = $color_icon;
	$GLOBALS['color_number'] = $color_number;
	$GLOBALS['color_title'] = $color_title;
	$GLOBALS['color_subtitle'] = $color_subtitle;
	$GLOBALS['color_bg'] = $color_bg;
	//$GLOBALS['animnumpv'] = $pv;
	$GLOBALS['nfwcls'] = $nfwcls;
	$GLOBALS['tlhcls'] = $tlhcls;
	$GLOBALS['tfwcls'] = $tfwcls;
	$GLOBALS['height'] = $height;
	$GLOBALS['nfstyle'] = $nfstyle;
	$GLOBALS['nmt'] = $nmt;
	$GLOBALS['nmb'] = $nmb;
	//$GLOBALS['animnufw_number'] = $fw_number;
	//$GLOBALS['fweight_title'] = $fweight_title;
	//$GLOBALS['lh_title'] = $lh_title;

	$cls .= ' gutter-' . $gutter;
	$cls .= ' subtitle' . $subtitle;
	$cls .= ' theme-col-' . $columns;
	$cls .= ' center' . $center;
	$cls .= ' nopadding' . $nopadding;
	$cls .= ' icon' . $icon;	
	$cls .= $custom_class ? ' ' . $custom_class : '';
	$templatecls = $template ? ' mb2-pb-template-animnum' : '';

	//if ( $mt || $mb )
	//{
		$style .= ' style="';
		$style .= $mt ? 'margin-top:' . $mt . 'px;' : '';
		$style .= $mb ? 'margin-bottom:' . $mb . 'px;' : '';
		$style .= '--mb2-b-anum-sizei:' . $size_icon . 'rem';
		$style .= '"';
	//}

	$content = $content;

	if ( ! $content )
	{
		for (  $i = 1; $i <= 4; $i++ )
		{
			$content .= '[mb2pb_animnum_item number="125" ]Box content here.[/mb2pb_animnum_item]';
		}
	}

	$output .= '<div class="mb2-pb-element mb2-pb-animnum' . $templatecls . '"' . $style . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 )  . '>';
	$output .= '<div class="element-helper"></div>';
	$output .= theme_mb2nl_page_builder_el_actions( 'element', 'animnum' );
	$output .= '<div class="mb2-pb-element-inner theme-boxes' . $cls . '">';
	$output .= '<div class="mb2-pb-sortable-subelements">';

	$output .= mb2_do_shortcode( $content );

	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';

	//$PAGE->requires->js_call_amd( 'theme_mb2nl/animnum','animnumInit' );

	return $output;

}




function mb2_shortcode_mb2pb_animnum_item ( $atts, $content = null ){

	$atts2 = array(
		'id' => 'animnum_item',
		'number' => 125,
		'icon' => 'fa fa-graduation-cap',
		'title' => 'Title here',
		'color_icon' => '',
		'color_number' => '',
		'color_title' => '',
		'color_subtitle' => '',
		'color_bg' => '',
		'subtitle' => 'Subtitle here',
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$size_number = isset( $GLOBALS['size_number'] ) ? $GLOBALS['size_number'] : 3;
	//$size_icon = isset( $GLOBALS['size_icon'] ) ? $GLOBALS['size_icon'] : 3;
	$color_icon_style = '';
	$number_style = '';
	$color_title_style = '';
	$color_subtitle_style = '';
	$color_bg_style = '';
	$tcls = '';
	$ncls = '';

	$ncls .= ' fw' . $GLOBALS['nfwcls'];
	$ncls .= ' fs' . $GLOBALS['nfstyle'];
	$tcls .= ' fw' . $GLOBALS['tfwcls'];
	$tcls .= ' lh' . $GLOBALS['tlhcls'];

	if ( $color_icon || $GLOBALS['color_icon'] )
	{
		$color = $color_icon ? $color_icon : $GLOBALS['color_icon'];
		$color_icon_style = 'color:' . $color . ';';
	}

	
	$number_style .= ' style="';
	$number_style .= 'font-size:' . $size_number . 'rem;' ;
	$num_color = $color_number ? $color_number : $GLOBALS['color_number'];
	$number_style .= $num_color ? 'color:' . $num_color . ';' : '';
	$number_style .= 'margin-top:' . $GLOBALS['nmt'] . 'px;';
	$number_style .= 'margin-bottom:' . $GLOBALS['nmb'] . 'px;';
	$number_style .= '"';

	//style="font-size:' . $size_number . 'rem;' . $number_style . '"
	// if ( $color_number || $GLOBALS['color_number'] )
	// {
	// 	$color = $color_number ? $color_number : $GLOBALS['color_number'];
	// 	$number_style = 'color:' . $color . ';';
	// }

	if ( $color_title || $GLOBALS['color_title'] || $GLOBALS['size_title'] )
	{
		$color = $color_title ? $color_title : $GLOBALS['color_title'];
		$color_title_style .= ' style="';
		$color_title_style .= 'color:' . $color . ';';
		$color_title_style .= 'font-size:' . $GLOBALS['size_title'] . 'rem;';
		//$color_title_style .= 'font-weight:' . $GLOBALS['fweight_title'] . ';';
		//$color_title_style .= 'line-height:' . $GLOBALS['lh_title'] . ';';
		$color_title_style .= '"';
	}

	if ( $color_subtitle || $GLOBALS['color_subtitle'] )
	{
		$color = $color_subtitle ? $color_subtitle : $GLOBALS['color_subtitle'];
		$color_subtitle_style = ' style="color:' . $color . ';"';
	}

	//if ( $color_bg || $GLOBALS['color_bg'] || $GLOBALS['animnumpv'] )
	//{
		$color = $color_bg ? $color_bg : $GLOBALS['color_bg'];

		$color_bg_style .= ' style="';
		$color_bg_style .= $color ? 'background-color:' . $color . ';' : '';

		// if ( $GLOBALS['animnumpv'] )
		// {
		// 	$color_bg_style .= 'padding-top:' . $GLOBALS['animnumpv'] . 'px;';
		// 	$color_bg_style .= 'padding-bottom:' . $GLOBALS['animnumpv'] . 'px;';
		// }

		$color_bg_style .= 'min-height:' . $GLOBALS['height'] . 'px;';

		$color_bg_style .= '"';
	//}

	$output .= '<div class="mb2-pb-subelement mb2-pb-animnum_item theme-box"' . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 )  . '>';
	$output .= theme_mb2nl_page_builder_el_actions( 'subelement' );
	$output .= '<div class="subelement-helper"></div>';
	$output .= '<div class="mb2-pb-subelement-inner">';
	$output .= '<div class="pbanimnum-item"' . $color_bg_style . '>';

	$output .= '<div class="pbanimnum-icon" style="' . $color_icon_style . '">';
	$output .= '<i class="' . $icon . '"></i>';
	$output .= '</div>';
	$output .= '<div class="pbanimnum-number' . $ncls . '"' . $number_style . '>0</div>';

	$output .= '<div class="pbanimnum-text">';
	$output .= '<h4 class="pbanimnum-title' . $tcls . '"' . $color_title_style . '>' . $title . '</h4>';
	$output .= '<span class="pbanimnum-subtitle"' . $color_subtitle_style . '>' . $subtitle . '</span>';
	$output .= '</div>';

	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;

}
