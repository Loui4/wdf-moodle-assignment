<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode('pbmainslider', 'mb2_shortcode_pbmainslider');
mb2_add_shortcode('pbmainslider_item', 'mb2_shortcode_pbmainslider_item');


function mb2_shortcode_pbmainslider($atts, $content= null){

	$atts2 = array(
		'mt' => 0,
		'mb' => 0,
		'width' => '',
		'height' => 600,
		'mheight' => 85,
		'custom_class' => '',
		'columns' => 1,
		'gutter' => 'none',
		'sloop' => 1,
		'snav' => 1,
		'ctnav' => 0,
		'sdots' => 0,
		'autoplay' => 1,
		'pausetime' => 5000,
		'animtime' => 800,
		'animtype' => 'fade'
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$sData = '';
	$style = '';
	$cls = '';
	$sliderid = uniqid('swiper_');
	$GLOBALS['global_ctnav'] = $ctnav;
	$GLOBALS['slideruniqid'] = $sliderid;
	
	$cls .= $custom_class ? ' ' . $custom_class : '';

	//if ( $mt || $mb )
	//{
		$style .= ' style="';
		$style .= 'margin-top:' . $mt . 'px;';
		$style .= 'margin-bottom:' . $mb . 'px;';
		$style .= '--mb2-pb-mainslider-height:' . $height . 'px;--mb2-pb-mainslider-mheight:' . $mheight . ';';	
		$style .= '"';
	//}

	$opts = theme_mb2nl_page_builder_2arrays( $atts, $atts2 );
	$sliderdata = theme_mb2nl_shortcodes_slider_data( $opts );

	$cls .= $sdots == 1 ? ' isdots' : '';

	$output .= '<div class="pbmainslider-wrap mb2-pb-carousel mb2-pb-content' . $cls . '"' . $style . $sliderdata . '>';
	$output .= '<div id="' . $sliderid . '" class="mb2-pb-element-inner swiper">';
	$output .= theme_mb2nl_shortcodes_swiper_nav($sliderid);
	$output .= '<div class="swiper-wrapper">';
	$output .= mb2_do_shortcode($content);
	$output .= '</div>'; // swiper-wrapper
	$output .= theme_mb2nl_shortcodes_swiper_pagenavnav();
	$output .= '</div>'; // mb2-pb-element-inner
	$output .= '</div>'; // pbmainslider-wrap

	unset($GLOBALS['global_ctnav']);
	unset($GLOBALS['slideruniqid']);

	return $output;

}



function mb2_shortcode_pbmainslider_item($atts, $content = null){
	extract(mb2_shortcode_atts( array(
		'title' => 'Title text',
		'isdesc' => 1,
		//
		'tcolor' => '',
		'istitle' => 1,
		'tlh' => 'global',
		'tsize' => 3,
		'tfweight' => 'global',
		'tlspacing' => 0,
		'twspacing' => 0,
		'tupper' => 0,
		'tthshadow' => 0.05,
		'ttvshadow' => 0.05,
		'ttbshadow' => 0,
		'ttcshadow' => '',
		//
		'aligntext' => 'none',
		'valign' => 'center',
		'halign' => 'left',
		//
		'dcolor' => '',
		'dsize' => 1,
		'dlh' => 'global',
		'dfweight' => 'global',
		'dlspacing' => 0,
		'dwspacing' => 0,
		'dupper' => 0,
		'dmt' => 15,
		'dthshadow' => 0.05,
		'dtvshadow' => 0.05,
		'dtbshadow' => 0,
		'dtcshadow' => '',
		//
		'image' => theme_mb2nl_page_builder_demo_image( '1900x750' ),
		'desc' => 'Description text',
		'btntext' => '',
		//
		'bgcolor' => '',
		'prebg' => 0,
		//
		'ph' => 15,
		'pv' => 0,
		'cmt' => 0,
		'cmb' => 0,
		//
		'ocolor' => '',
		'cwidth' => 750,
		//
		'linkbtn' => 0,
		//
		'btntype' => 'primary',
		'btnfwcls' => 'global',
		'btnsize' => 'lg',
		'btnrounded' => 0,
		'btnborder' => 0,
		'btnmt' => 15,
		//
		'heroimg' => 0,
		'heroimgurl' => '',
		'herow' => 1200,
		'heroonsmall' => 1,
		'herov' => 'center',
		'heroml' => 0,
		'herohpos' => 'left',
		'heromt' => 0,
		'herogradl' => 0,
		'herogradr' => 0,
		//
		'link' => '',
		'link_target' => 0,
		), $atts)
	);

	$output = '';
	$cls = '';
	$ccls = '';
	$cstyle = '';
	$tstyle = '';
	$dstyle = '';
	$ctnavcls = '';
	$tcls = '';
	$dcls = '';
	$btncls = '';
	$btnstyle = '';
	$istarget = $link_target ? ' target="_blank"' : '';
	$slidelink = ( ! $linkbtn && $link !== '' );
	$btntext = $btntext ? $btntext : get_string('readmorefp','local_mb2builder');

	$ccls .= ' ' . theme_mb2nl_heading_cls( $ph, 'phsize-', false );
	$ccls .= ' ' . theme_mb2nl_heading_cls( $pv, 'pvsize-', false );

	$tcls .= ' ' . theme_mb2nl_heading_cls( $tsize );
	$tcls .= ' fw' . $tfweight;
	$tcls .= ' lh' . $tlh;
	$tcls .= ' upper' . $tupper;

	$dcls .= ' ' . theme_mb2nl_heading_cls( $dsize, 'textsize-' );
	$dcls .= ' fw' . $dfweight;
	$dcls .= ' lh' . $dlh;
	$dcls .= ' upper' . $dupper;

	$cls .= ' halign' . $halign;
	$cls .= ' valign' . $valign;
	$cls .= ' aligntext' . $aligntext;
	$cls .= ' isdesc' . $isdesc;
	$cls .= ' istitle' . $istitle;
	$cls .= ' linkbtn' . $linkbtn;		
	$cls .= ' heroimg' . $heroimg;
	$cls .= ' herov' . $herov;
	$cls .= ' herogradl' . $herogradl;
	$cls .= ' herogradr' . $herogradr;
	$cls .= ' heroonsmall' . $heroonsmall;
	$cls .= ' pre-bg' . $prebg;

	$btncls .= ' type' . $btntype;
	$btncls .= ' size' . $btnsize;
	$btncls .= ' fw' . $btnfwcls;
	$btncls .= ' rounded' . $btnrounded;
	$btncls .= ' btnborder' . $btnborder;

	// $btnstyle .= ' style="';
	// $btnstyle .= 'margin-top:' . $btnmt . 'px;';
	// $btnstyle .= '"';

	$ctnavcls .= ' fw' . $btnfwcls;
	$ctnavcls .= ' size' . $btnsize;
	$ctnavcls .= ' type' . $btntype;
	

	$cstyle .= ' style="';
	$cstyle .= 'width:' . $cwidth . 'px;max-width:100%;';
	$cstyle .= $bgcolor ? 'background-color:' . $bgcolor . ';' : '';
	$cstyle .= '--mb2-pb-mainslider-cph:' . $ph . 'px;';
	$cstyle .= '--mb2-pb-mainslider-cpv:' . $pv . 'px;';
	$cstyle .= '--mb2-pb-mainslider-btnmt:' . $btnmt . 'px;';
	// $cstyle .= 'padding-left:' . $ph . 'px;';
	// $cstyle .= 'padding-right:' . $ph . 'px;';
	// $cstyle .= 'padding-top:' . $pv . 'px;';
	// $cstyle .= 'padding-bottom:' . $pv . 'px;';
	$cstyle .= 'margin-top:' . $cmt . 'px;';
	$cstyle .= 'margin-bottom:' . $cmb . 'px;';
	$cstyle .= '"';

	$tstyle .= ' style="';
	$tstyle .= $tcolor ? 'color:' . $tcolor . ';' : '';
	$tstyle .= 'font-size:' . $tsize . 'rem;';
	$tstyle .= 'letter-spacing:' . $tlspacing . 'px;';
	$tstyle .= 'word-spacing:' . $twspacing . 'px;';
	$tstyle .= '--mb2-pb-mainslider-thshadow:' . $tthshadow . 'em;';
	$tstyle .= '--mb2-pb-mainslider-tvshadow:' . $ttvshadow . 'em;';
	$tstyle .= '--mb2-pb-mainslider-tbshadow:' . $ttbshadow . 'px;';
	$tstyle .= $ttcshadow ? '--mb2-pb-mainslider-tcshadow:' . $ttcshadow . ';' : '--mb2-pb-mainslider-tcshadow:transparent;';
	$tstyle .= '"';

	$dstyle .= ' style="';
	$dstyle .= $dcolor ? 'color:' . $dcolor . ';' : '';
	$dstyle .= 'font-size:' . $dsize . 'rem;';
	$dstyle .= 'letter-spacing:' . $dlspacing . 'px;';
	$dstyle .= 'word-spacing:' . $dwspacing . 'px;';
	$dstyle .= 'margin-top:' . $dmt . 'px;';
	$dstyle .= '--mb2-pb-mainslider-thshadow:' . $dthshadow . 'em;';
	$dstyle .= '--mb2-pb-mainslider-tvshadow:' . $dtvshadow . 'em;';
	$dstyle .= '--mb2-pb-mainslider-tbshadow:' . $dtbshadow . 'px;';
	$dstyle .= $dtcshadow ? '--mb2-pb-mainslider-tcshadow:' . $dtcshadow . ';' : '--mb2-pb-mainslider-tcshadow:transparent;';
	$dstyle .= '"';	

	$colorstyle = $bgcolor ? ' style="background-color:' . $bgcolor . ';"' : '';

	$innerstyle = ' style="';
	$innerstyle .= $ocolor ? 'background-color:' . $ocolor . ';' : '';
	$innerstyle .= '"';	

	$output .= '<div class="mb2-pb-carousel-item swiper-slide">';
	$output .= $slidelink ? '<a href="' . $link . '"' . $istarget . '>' : '';
	$output .= '<div class="pbmainslider-item-inner1">';
	$output .= '<div class="pbmainslider-item-inner' . $cls . '"' . $innerstyle . '>';
	$output .= '<div class="slide-content1">';
	$output .= '<div class="slide-content2">';
	$output .= '<div class="slide-content3' . $ccls . '"' . $cstyle . '>';
	$output .= '<div class="slide-content4">';
	$output .= '<h2 class="slide-title' . $tcls . '"' . $tstyle . '>';
	$output .= urldecode( $title );
	$output .= '</h2>';
	$output .= '<div class="slide-desc' . $dcls . '"' . $dstyle . '>';
	$output .= urldecode( $desc );
	$output .= '</div>';

	if ( $linkbtn && $link !== '' && $GLOBALS['global_ctnav'] == 0 )
	{		
		$output .= '<div class="slide-readmore">';
		$output .= '<a href="' . $link . '" class="mb2-pb-btn' . $btncls . '"' . $btnstyle . $istarget . '><span class="btn-intext">' . urldecode( $btntext ) . '</span></a>';
		$output .= '</div>';
	}

	$output .= $GLOBALS['global_ctnav'] ? theme_mb2nl_shortcodes_swiper_descnav($GLOBALS['slideruniqid'], array('btnlink'=>$link,'btntext'=>urldecode( $btntext ),'link_target'=>$istarget,'cls'=>$ctnavcls)) : '';
	
	$output .= '</div>'; // slide-content4
	$output .= '</div>'; // slide-content3
	$output .= '</div>'; // slide-content2
	$output .= '<div class="slide-descbg"' . $colorstyle . '></div>'; // theme-slide-content2
	$output .= '</div>'; // slide-content1

	if ( $heroimgurl )
	{
		$output .= '<div class="slidehero-img-wrap">';
		$output .= '<div class="slidehero-img-wrap2">';
		$output .= '<div class="slidehero-img-wrap3" style="width:' . $herow . 'px;' . $herohpos . ':' . $heroml . '%;margin-top:' . $heromt . 'px;">';
		$output .= '<img class="slidehero-img lazy" data-src="' . $heroimgurl . '" alt="' .	$title . '">';
		$output .= '<div class="slidehero-img-grad grad-left" style="background-image:linear-gradient(to right,' . $ocolor . ',rgba(255,255,255,0)); "></div>';
		$output .= '<div class="slidehero-img-grad grad-right" style="background-image:linear-gradient(to right,rgba(255,255,255,0),' . $ocolor . '); "></div>';
		$output .= '</div>'; // hero-img-wrap23
		$output .= '</div>'; // hero-img-wrap2
		$output .= '</div>'; // hero-img-wrap
	}	

	$output .= '</div>'; // pbmainslider-item-inner1
	$output .= '</div>'; // pbmainslider-item-inner
	$output .= '<div class="theme-slider-img"><img class="lazy" data-src="' . $image . '" alt="' .	$title . '"><div class="img-cover lazy" data-bg="' . $image . '"></div></div>';
	$output .= $slidelink ? '</a>' : '';
	$output .= '</div>'; // mb2-pb-carousel-item

	return $output;

}