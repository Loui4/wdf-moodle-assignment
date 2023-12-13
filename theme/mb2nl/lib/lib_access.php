<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *
 * @package   theme_mb2nl
 * @copyright 2017 - 2022 Mariusz Boloz (mb2moodle.com)
 * @license   Commercial https://themeforest.net/licenses
 *
 */

defined('MOODLE_INTERNAL') || die();


/*
 *
 * Method to define site access
 *
 */
function theme_mb2nl_site_access( $courseid = NULL )
{

	global $PAGE, $COURSE, $USER;
	$access = 'none';
	$courseid = $courseid ? $courseid : $COURSE->id;

	$context = context_course::instance( $courseid );
	$course_cancreate = has_capability('moodle/course:create',$context);
	$course_canedit = has_capability('moodle/course:update',$context);
	$hidden_activities = has_capability('moodle/course:viewhiddenactivities',$context);
	//$manage_activities = has_capability('moodle/course:manageactivities', $context );
	$coursecat_canmanage = has_capability('moodle/category:manage', $context);
	$enrolled = is_enrolled($context, $USER->id,'',true);
	$site_canconfig = has_capability('moodle/site:config',$context);

	$access_admin = ($site_canconfig && $coursecat_canmanage && $course_canedit && $course_cancreate && $hidden_activities);
	$access_manager = ($coursecat_canmanage && $course_canedit && $course_cancreate && $hidden_activities);
	$access_teacher = ($hidden_activities && $course_canedit);
	$access_noediting_teacher = ($hidden_activities && ! $course_canedit);
	$access_creator = (!$course_canedit && $course_cancreate);
	$access_student = ($enrolled && isloggedin() && !isguestuser() && ! $hidden_activities);
	$access_user = (isloggedin() && !isguestuser());

	if ($access_admin)
	{
		$access = 'admin';
	}
	elseif ($access_manager)
	{
		$access = 'manager';
	}
	elseif ($access_teacher)
	{
		$access = 'editingteacher';
	}
	elseif ($access_noediting_teacher)
	{
		$access = 'teacher';
	}
	elseif ($access_creator)
	{
		$access = 'coursecreator';
	}
	elseif ($access_student)
	{
		$access = 'student';
	}
	elseif ($access_user)
	{
		$access = 'user';
	}

	return $access;

}


/*
 *
 * Method to define skiplinks
 *
 */
function theme_mb2nl_skiplinks()
{
	global $PAGE, $COURSE;

    if ( preg_match('@admin-local-mb2builder@', $PAGE->pagetype ) )
	{
		return;
	}

	$fullscreenmod = theme_mb2nl_full_screen_module();
	$isCourse = ( isset( $COURSE->id ) && $COURSE->id > 1 );
	$cant_see = array( 'none', 'user' );
	$course_access = theme_mb2nl_site_access();
	$can_manage = array('admin','manager','editingteacher','teacher');
	$course_manage_string = in_array( $course_access, $can_manage ) ? get_string('coursemanagement','theme_mb2nl') : get_string('coursedashboard','theme_mb2nl');
	$logintext =  ( isloggedin() && ! isguestuser() ) ? get_string('skiptoprofile','theme_mb2nl') : get_string('skiptologin','theme_mb2nl');

	if ( ! $fullscreenmod )
	{
		$PAGE->requires->skip_link_to( 'main-navigation', get_string('skiptonavigation','theme_mb2nl') );
		$PAGE->requires->skip_link_to( 'themeskipto-mobilenav', get_string('skiptonavigation','theme_mb2nl') );
		$PAGE->requires->skip_link_to( 'themeskipto-search', get_string('skiptosearch','theme_mb2nl') );
		$PAGE->requires->skip_link_to( 'themeskipto-login', $logintext );
	}

	if ( theme_mb2nl_theme_setting( $PAGE,'coursepanel' ) && $isCourse && ! in_array( $course_access, $cant_see ) )
	{
		$PAGE->requires->skip_link_to( 'themeskipto-coursepanel', $course_manage_string );
	}

	if ( ! $fullscreenmod )
	{
		$PAGE->requires->skip_link_to( 'footer', get_string('skiptofooter','theme_mb2nl') );
	}

}






/*
 *
 * Method to get accessibility block
 *
 */
function theme_mb2nl_acsb_profiles()
{

	return array(
		array(
			'id' => 'visualimpairment',
			'acsb' => 'readablefont,textsizelarge,highsaturation,bigblackcursor',
			'icon' => 'ri-eye-line'
		),
		array(
			'id' => 'seizureandepileptic',
			'acsb' => 'lowsaturation,stopanimations',
			'icon' => 'ri-flashlight-fill'
		),	
		array(
			'id' => 'colorvisiondeficiency',
			'acsb' => 'readablefont,highcontrast,highsaturation',
			'icon' => 'ri-contrast-drop-fill'
		),		
		array(
			'id' => 'adhd',
			'acsb' => 'lowsaturation,readingmask,stopanimations',
			'icon' => 'ri-focus-2-fill'
		),
		array(
			'id' => 'learning',
			'acsb' => 'readablefont,textsizenormal,readingguide',
			'icon' => 'ri-book-read-line'
		)		
	);

}


/*
 *
 * Method to get accessibility block
 *
 */
function theme_mb2nl_acsb()
{
	global $PAGE;	

	return array(
			
		array(
			'id' => 'title',
			'text' => get_string('contentadjustments', 'theme_mb2nl')
		),
		array(
			'id' => 'readablefont',
			'icon' => 'ri-font-size'
		),
		array(
			'id' => 'highlighttitles',
			'icon' => 'ri-text'
		),	
		array(
			'id' => 'highlightlinks',
			'icon' => 'ri-link'
		),	
		array(
			'id' => 'stopanimations',
			'disable' => '',
			'icon' => 'ri-stop-line'
		),
		array(
			'id' => 'acsbtextsize',
			'icon' => 'ri-font-size-2',
			'items' => array(
				array(
					'id' => 'textsizenormal',
					'label' => '&#43;',
					'arialabel' => get_string('acsbplus','theme_mb2nl',array('adj'=>get_string('acsbtextsize', 'theme_mb2nl'),'time'=>'1')),
					'disable' => 'textsizelarge,textsizebig',
				),
				array(
					'id' => 'textsizelarge',
					'label' => '&#43; &#43;',
					'arialabel' => get_string('acsbplus','theme_mb2nl',array('adj'=>get_string('acsbtextsize', 'theme_mb2nl'),'time'=>'2')),
					'disable' => 'textsizenormal,textsizebig',
				),
				array(
					'id' => 'textsizebig',
					'label' => '&#43; &#43; &#43;',
					'arialabel' => get_string('acsbplus','theme_mb2nl',array('adj'=>get_string('acsbtextsize', 'theme_mb2nl'),'time'=>'3')),
					'disable' => 'textsizenormal,textsizelarge',
				)
			)
		),
		array(
			'id' => 'acsblineheight',
			'icon' => 'ri-line-height',
			'items' => array(
				array(
					'id' => 'lineheightnormal',
					'label' => '&#43;',
					'arialabel' => get_string('acsbplus','theme_mb2nl',array('adj'=>get_string('acsblineheight', 'theme_mb2nl'),'time'=>'1')),
					'disable' => 'lineheightlarge,lineheightbig',
				),
				array(
					'id' => 'lineheightlarge',
					'label' => '&#43; &#43;',
					'arialabel' => get_string('acsbplus','theme_mb2nl',array('adj'=>get_string('acsblineheight', 'theme_mb2nl'),'time'=>'2')),
					'disable' => 'lineheightnormal,lineheightbig',
				),
				array(
					'id' => 'lineheightbig',
					'label' => '&#43; &#43; &#43;',
					'arialabel' => get_string('acsbplus','theme_mb2nl',array('adj'=>get_string('acsblineheight', 'theme_mb2nl'),'time'=>'3')),
					'disable' => 'lineheightnormal,lineheightlarge',
				)
			)	
		),	
		array(
			'id' => 'textspacing',
			'icon' => 'ri-text-spacing',
			'items' => array(
				array(
					'id' => 'textspacingnormal',
					'label' => '&#43;',
					'arialabel' => get_string('acsbplus','theme_mb2nl',array('adj'=>get_string('textspacing', 'theme_mb2nl'),'time'=>'1')),
					'disable' => 'textspacinglarge,textspacingbig',
				),
				array(
					'id' => 'textspacinglarge',
					'label' => '&#43; &#43;',
					'arialabel' => get_string('acsbplus','theme_mb2nl',array('adj'=>get_string('textspacing', 'theme_mb2nl'),'time'=>'2')),
					'disable' => 'textspacingnormal,textspacingbig',
				),
				array(
					'id' => 'textspacingbig',
					'label' => '&#43; &#43; &#43;',
					'arialabel' => get_string('acsbplus','theme_mb2nl',array('adj'=>get_string('textspacing', 'theme_mb2nl'),'time'=>'3')),
					'disable' => 'textspacingnormal,textspacinglarge',
				)
			)	
		),	
		array(
			'id' => 'title',
			'text' => get_string('coloradjustments', 'theme_mb2nl')
		),
		array(
			'id' => 'contrastdark',
			'icon' => 'ri-moon-fill',
			'disable' => 'contrastlight',
		),
		array(
			'id' => 'contrastlight',
			'icon' => 'ri-sun-fill',
			'disable' => 'contrastdark',
		),		
		array(
			'id' => 'highcontrast',
			'icon' => 'ri-contrast-fill'
		),
		array(
			'id' => 'highsaturation',
			'icon' => 'ri-drop-fill',
			'disable' => 'lowsaturation,monochrome',
		),
		array(
			'id' => 'lowsaturation',
			'icon' => 'ri-contrast-drop-2-line',
			'disable' => 'highsaturation,monochrome',
		),
		array(
			'id' => 'monochrome',
			'icon' => 'ri-contrast-drop-fill',
			'disable' => 'highsaturation,lowsaturation',
		),
		array(
			'id' => 'title',
			'text' => get_string('orientationadjustments', 'theme_mb2nl')
		),
		
		array(
			'id' => 'readingguide',
			'icon' => 'ri-subtract-fill'
		),
		array(
			'id' => 'readingmask',
			'icon' => 'ri-send-backward'
		),
		array(
			'id' => 'bigblackcursor',
			'disable' => 'bigwhitecursor',
			'icon' => 'ri-cursor-fill'
		),
		array(
			'id' => 'bigwhitecursor',
			'disable' => 'bigblackcursor',
			'icon' => 'ri-cursor-line'
		)	
				
	);

}






/*
 *
 * Method to get accessibility block
 *
 */
function theme_mb2nl_acsb_block()
{
	global $PAGE;

	
	if ( ! theme_mb2nl_theme_setting( $PAGE, 'acsboptions' ) )
	{
		return;
	}

	$output = '';
	$items = theme_mb2nl_acsb();
	$profiles = theme_mb2nl_acsb_profiles();
	$svg = theme_mb2nl_svg();
	$datasel = implode(',', theme_mb2nl_acsb_selectors());	

	$output .= '<div id="acsb-menu" class="acsb-block" data-selectors="' . $datasel . '">';

	$output .= '<div class="acsb-block-header">';
	$output .= '<div class="acsb-block-title">' . get_string('acsboptions', 'theme_mb2nl') . '</div>';
	$output .= '<div class="acsb-block-close">';
	$output .= '<button type="button" class="themereset acsb-close" aria-label="' . get_string('closebuttontitle') . '">';
	$output .= $svg['close'];
	$output .= '</button>';
	$output .= '</div>'; // acsb-block-close
	$output .= '</div>'; // acsb-block-header

	$output .= '<div class="acsb-block-inner">';

	$output .= '<div class="acsb-profiles">';
	
	$output .= '<div class="acsb-title">' . get_string('acsbprofiles', 'theme_mb2nl') . '</div>';

	foreach( $profiles as $profile )
	{		
		// Set ajax parameter
		user_preference_allow_ajax_update('acsb_' . $profile['id'], PARAM_INT);
		$cls = get_user_preferences('acsb_' . $profile['id'], 0) ? ' active' : '';

		$output .= '<button type="button" class="acsb-profile-item themereset' . $cls . '" data-id="' . $profile['id'] . '" data-acsb="' . $profile['acsb'] . '">';
		$output .= '<span class="acsb-profile-icon"><i class="' . $profile['icon'] . '"></i></span>';
		$output .= '<span class="acsb-profile-title">' . get_string($profile['id'], 'theme_mb2nl') . '</span>';
		$output .= '</button>';		
	}

	$output .= '</div>'; // acsb-profiles
	

	foreach( $items as $item )
	{

		if ( $item['id'] === 'title' )
		{
			$output .= '<div class="acsb-title">' . $item['text'] . '</div>';
		}
		else 
		{
			$items = isset( $item['items'] ) ? $item['items'] : null;
			$itemcls = $items ? ' acsb-item-group' : '';

			$output .= '<div class="acsb-item' . $itemcls . '">';

			if ( $items )
			{
				$output .= '<div class="acsb-group-title">';
				$output .= isset( $item['icon'] ) ? '<i class="' . $item['icon'] . '"></i>' : '';
				$output .= '<span class="acsb-item-group-title">' . get_string($item['id'], 'theme_mb2nl') . '</span>';
				$output .= '</div>'; // acsb-group-title

				$output .= '<div class="acsb-group-buttons">';

				foreach( $item['items'] as $item )
				{
					$output .= theme_mb2nl_acsb_block_item($item);
				}

				$output .= '</div>'; // acsb-group-buttons
			}
			else 
			{
				$output .= theme_mb2nl_acsb_block_item($item);
			}	
			
			$output .= '</div>'; // acsb-item
		}		
	}	

	$output .= '</div>'; // acsb-block-inner

	$output .= '<div class="acsb-block-footer">';
	$output .= '<button type="button" class="themereset acsb-reset">';
	$output .= '<span class="acsb-reset-icon"><i class="ri-refresh-line"></i></span>';
	$output .= '<span class="acsb-reset-text">' . get_string('resetsettings', 'theme_mb2nl') . '</span>';
	$output .= '</button>';
	$output .= '</div>';

	$output .= '</div>'; // acsb-block

	// Set ajax parameter
	user_preference_allow_ajax_update('acsb_trigger', PARAM_INT);
	$triggercls = get_user_preferences('acsb_trigger', 0) ? ' active' : '';
	
	$output .= '<button type="button" class="acsb-trigger' . $triggercls . '" aria-label="' . get_string('acsboptions', 'theme_mb2nl') . '" tabindex="20">';
	$output .= '<div class="acsb-icon-main">' . $svg['universal-access'] . '</div>';
	$output .= '<div class="acsb-icon-check">' . $svg['circle-check'] . '</div>';
	$output .= '</button>';	

	$PAGE->requires->js_call_amd('theme_mb2nl/access','acsbTools');	

	return $output;

}




/*
 *
 * Method to get accessibility block
 *
 */
function theme_mb2nl_acsb_block_item($item)
{

	$output = '';
	
	// Set ajax parameter
	user_preference_allow_ajax_update('acsb_' . $item['id'], PARAM_INT);
	$cls = get_user_preferences('acsb_' . $item['id'], 0) ? ' active' : '';

	$disable = isset($item['disable']) ? ' data-disable="' . $item['disable'] . '"' : ' data-disable=""';
	
	$text = isset( $item['label'] ) ? $item['label'] : get_string($item['id'], 'theme_mb2nl');
	$arialabel = isset( $item['arialabel'] ) ? ' aria-label="' . $item['arialabel'] . '"' : '';
	$ariahidden = $arialabel ? ' aria-hidden="true"' : '';

	$output .= '<button type="button" data-id="' . $item['id'] . '" class="acsb-button themereset' . $cls . '"' . $disable . $arialabel . '>';			
	$output .= isset( $item['icon'] ) ? '<i class="' . $item['icon'] . '"></i>' : '';
	$output .= '<span class="acsb-item-title"' . $ariahidden . '>' . $text . '</span>';	
	$output .= '</button>';	

	return $output;

}










/*
 *
 * Method to set accessibility classess
 *
 */
function theme_mb2nl_acsb_cls()
{

	global $PAGE;

	$cls = '';
	$items = theme_mb2nl_acsb();

	foreach( $items as $item )
	{
		if ( $item['id'] === 'title' )
		{
			continue;
		}
		
		if ( isset( $item['items'] ) )
		{
			foreach ( $item['items'] as $item )
			{
				if ( get_user_preferences('acsb_' . $item['id'], 0) )
				{
					$cls .= ' acsb_' . $item['id'];
				}
			}
		}
		else 
		{
			if ( get_user_preferences('acsb_' . $item['id'], 0) )
			{
				$cls .= ' acsb_' . $item['id'];
			}
		}		
	}

	return $cls;

}


/*
 *
 * Method to set accessibility style tag
 *
 */
// function theme_mb2nl_acsb_styletag()
// {
// 	global $CFG, $PAGE;

// 	if ( ! theme_mb2nl_theme_setting($PAGE, 'acsboptions') )
// 	{
// 		return;
// 	}

// 	$output = '';

// 	$output .= '<style type="text/css" id="css-mb2-acsb">';
// 	$output .= file_get_contents( $CFG->dirroot . '/theme/mb2nl/style/acsb_block.css' );
// 	$output .= '</style>';

// 	return $output;

// }






function theme_mb2nl_acsb_selectors()
{
	return array(
		'h1','h2','h3','h4','h5','h6',
        '.h1','.h2','.h3','.h4','.h5','.h6',
        // Header
        '#main-header','.top-bar','.master-header-inner',
        '.breadcrumb-item','.breadcrumb-item a',
        // Page
        '#region-main','#page-a','#page-b','.page-breadcrumb','#page-header','.theme-footer',
        '.mb2-pb-date',
		// Slider
		'.slide-contentnav-link',
		// Ani numer
		'.pbanimnum-number','.pbanimnum-icon',
        // Headings
        '.headingtext','.theme-text-text','.theme-text-text *',
        // Text
        '.text','.text-muted','pre','td','th','tr','th a','td a','.theme-table-wrap','.icon','label','.text-truncate','.bg-light','.page-link',
        'dt','dd','.badge','.slide-desc',
        // Boxes image
        '.box-title','.box-title-text',
        '.box-desc','.theme-boxicon-icon','.theme-boxicon-icon i',
        '.boxcontent-desc','.box-desc-text','.theme-header-subtitle',    
		// Events
		'.event-duration','.event-date','.event-date span', 
        // Icon list
        '.iconel i','.list-text','.theme-list li','.theme-list a','.social-list a','.share-list a',
        // Tabs
        '.nav-link','.tab-pane','.tab-pane *',
        // Carousel
        '.theme-slide-title','.theme-slider-desc',
        // Select items
        '.select-items-container','.mb2-pb-select_item',
        // Buttons
        '.mb2-pb-btn','#page button','.btn','#page button i','.btn i','.mb2-pb-btn i','.linkbtn','.fixed-bar button',
        // Video
        '.embed-video-bg i',
        // Blocks
        '.card','.card-body','.day-number',
        // Quick links 
        '.quicklinks-list','.item-link','.static-icon','.static-icon i','.menu-extracontent-content','.quicklinks path',
        // Main menu
        '.mb2mm-action','.mb2mm-mega-action','.mb2mm-heading','.mb2mm-icon','.mb2mm-label','.mb2mm-sublabel','.mb2mm-mega-action','.mb2mm-toggle',
        '.mb2mm-arrow','.link-replace','.mobile-navto','.mobile-navbottom','.menu-extracontent-controls','.menu-extra-controls-btn',
        '.menu-extracontent-controls path','.lang-list a',
        // Admin
        '.admin-region','.theme-links a','.modal-content','.mb2tmpl-acccontent>div','.align-items-center','.mb2megamenu-item-header','.mb2megamenu-item-header .item-label','.mb2megamenu-builder-footer','.dashboard-tabs','.theme-dashboard','.block-item-inner',
        // Forms
        'input','textarea','select','.form-label','.form-control','.col-form-label *','.dropdown-menu','.dropdown-item','.usermenu','.form-description','.mb2-pb-announcements-title','.mb2-pb-announcements-content','.mb2-pb-announcements-item',
        // Footer
        '.footer-tools','.footer-tools a','.footer-content',
        // Alerts
        '.alert',
        // Modal
        '.modal-header','.modal-footer',
        // Course
        '.box','.boxlist a','.boxlist span','.activityiconcontainer.content','.card-footer','.activityname','.activityname a','.instructor-meta *',
        '.course-link-item a', '.course-link-item path','.toggle-icon','.progress-value','.theme-turnediting','.course-nav-list-item-list-container',
        '.course-nav-list-ccontent','.activity','.theme-course-teacher-inner','.info-courses','.info-students','.teacher-info i','.theme-courses-topbar',
        '#fsmod-header','.fsmod-course-sections','.coursetoc-section-tite','.fsmod-section-tools','.fsmod-section','.fsmod-course-content','.coursenav-link',
        '.fsmod-backlink','.fsmod-showhide-sidebar path','.coursenav-link span','.sidebar-inner','.course-slogan','.course-categories-tree','.course-meta1','.course-meta2','.price','.enrol-course-nav','.enrol-course-nav ul','.course-description-item','.children-category a','.cat-image','.cat-image path','.theme-course-filter .field-container input+i','.coursetabs-tablist','.coursetabs-catitem span','.course-custom-fileds','.course-custom-fileds li','.activity-header','.tcolorl','.tcolorn','.course-categories-tree a',
        // Blog
        '.comment-link',
        // Messages
        '.message-app','.drawer-top','.drawer-top a','.drawer-top i','.list-group-item','.bg-white',
        // Notifications
        '.popover-region-container','.popover-region-footer-container','.popover-region-seeall-text'
	);
}