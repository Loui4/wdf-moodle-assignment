<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode( 'mb2pb_heading', 'mb2_shortcode_mb2pb_heading' );

function mb2_shortcode_mb2pb_heading( $atts, $content = null ){

	global $PAGE;

	$atts2 = array(
		'id' => 'heading',
		'tag'=> 'h4',
		'size' => 1.33,
		'align' =>'none',
		'btext' => '',
		'atext' => '',
		'fwcls' => 'global',
		'lhcls' => 'global',
		'lspacing' => 0,
		'wspacing' => 0,
		'upper' => 0,
		'nline' => 0,
		'mt' => 0,
		'mb' => 30,
		'width' => 2000,
		'color' => '',
		'acolor' => '',
		'bcolor' => '',
		'afwcls' => 'global',
		'bfwcls' => 'global',
		'custom_class'=> '',
		//
		'thshadow' => 0.06,
		'tvshadow' => 0.04,
		'tbshadow' => 0,
		'tcshadow' => '',
		//
		'link' => 0,
		'linkurl' => '#',
		'linktarget' => 0,
		'linktext' => get_string( 'viewall', 'local_mb2builder' ),
		//
		'typed' => 0,
		'typespeed' => 50,
		'backspeed' => 50,
		'backdelay' => 1500,
		'typedtext' => 'first word|second word|third word',
		//
		//'lh' => 1,
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$style = '';
	$elstyle = '';
	$astyle = '';
	$bstyle = '';
	$textstyle = '';
 	$cls = '';
	$acls = '';
	$bcls = '';
	$textcls = '';
	$typedid = uniqid('typed_');
	$linktext = $linktext ? $linktext : get_string( 'viewall', 'local_mb2builder' );

	$cls .= ' heading-' . $align;
	$cls .= ' ' . $tag;
	$cls .= ' upper' . $upper;
	$cls .= ' lh' . $lhcls;
	$cls .= ' link' . $link;
	$cls .= ' ' . theme_mb2nl_heading_cls( $size );
	$cls .= $custom_class !== '' ? ' ' . $custom_class : '';

	$acls .= ' fw' . $afwcls;
	$bcls .= ' fw' . $bfwcls;

	$textcls .= ' fw' . $fwcls;
	$textcls .= ' nline' . $nline;

	$tmplcls = $template ? ' mb2-pb-template-heading' : '';

	$style .= ' style="';
	$style .= 'margin-top:' . $mt . 'px;';
	$style .= 'margin-bottom:' . $mb . 'px;';
	$style .= 'max-width:' . $width . 'px;margin-left:auto;margin-right:auto;';
	$style .= '"';

	// Style for heading element
	$elstyle .= ' style="';
	//$elstyle .= $color ? 'color:' . $color . ';' : '';
	//$elstyle .= $fweight ? 'font-weight:' . $fweight . ';' : '';
	$elstyle .= $lspacing != 0 ? 'letter-spacing:' . $lspacing . 'px;' : '';
	$elstyle .= $wspacing != 0 ? 'word-spacing:' . $wspacing . 'px;' : '';
	$elstyle .= $size ? 'font-size:' . $size . 'rem;' : '';
	$elstyle .= '--mb2-pb-heading-thshadow:' . $thshadow . 'em;';
	$elstyle .= '--mb2-pb-heading-tvshadow:' . $tvshadow . 'em;';
	$elstyle .= '--mb2-pb-heading-tbshadow:' . $tbshadow . 'px;';
	$elstyle .= $tcshadow ? '--mb2-pb-heading-tcshadow:' . $tcshadow . ';' : '--mb2-pb-heading-tcshadow:transparent;';
	//$elstyle .= $lh ? 'line-height:' . $lh . ';' : '';
	$elstyle .= '"';

	// Style for after heading element
	$astyle .= ' style="';
	$astyle .= $acolor ? 'color:' . $acolor . ';' : '';
	$astyle .= '"';

	// Style for before heading element
	$bstyle .= ' style="';
	$bstyle .= $bcolor ? 'color:' . $bcolor . ';' : '';
	$bstyle .= '"';

	// Style for text heading element
	$textstyle .= ' style="';
	$textstyle .= $color ? 'color:' . $color . ';' : '';
	$textstyle .= '"';

	$content = $content ? $content : 'Heading text here';
	$atts2['content'] = $content;
	$opts = theme_mb2nl_page_builder_2arrays( $atts, $atts2 );

	$output .= '<div class="mb2-pb-element mb2-pb-heading' . $tmplcls . '"' . $style . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 ) . '>';
	$output .= '<div class="element-helper"></div>';
	$output .= theme_mb2nl_page_builder_el_actions( 'element', 'heading' );
	$output .= '<h4 id="' . $typedid . '" class="heading' . $cls . '"' . $elstyle . '>';
	$output .= '<span class="btext' . $bcls . '"' . $bstyle . '>' . $btext . '</span>';
	$output .= '<span class="headingtext' . $textcls . '"' . $textstyle . '>';
	$output .= $typed ? theme_mb2nl_typed_content( urldecode( $content ), $typedtext ) : urldecode( $content );
	$output .= '</span>';
	$output .= '<span class="atext' . $acls . '"' . $astyle . '>' . $atext . '</span>';
	$output .= '<span class="heading-more"' . $textstyle . '><span class="heading-more-text">' . $linktext . '</span><i class="fa fa-arrow-right"' . $astyle . '></i></span>';
	$output .= '</h4>';
	$output .= '</div>';

	return $output;

}
