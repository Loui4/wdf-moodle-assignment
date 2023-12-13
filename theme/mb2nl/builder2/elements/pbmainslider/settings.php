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
 * @package    local_mb2builder
 * @copyright  2018 Mariusz Boloz, marbol2 <mariuszboloz@gmail.com>
 * @license    Commercial https://themeforest.net/licenses
 */

defined('MOODLE_INTERNAL') || die();


$mb2_settings = array(
	'id' => 'pbmainslider',
	'subid' => 'pbmainslider_item',
	'title' => get_string('pbmainslider', 'local_mb2builder'),
	'icon' => 'fa fa-clone',
	'tabs' => array(
		'general' => get_string('generaltab', 'local_mb2builder'),
		'style' => get_string('styletab', 'local_mb2builder')
	),
	'attr' => array(
		'height'=>array(
			'type'=>'range',
			'section' => 'general',
			'title'=> get_string('height', 'local_mb2builder'),
			'min'=> 100,
			'max' => 1500,
			'default'=> 600,
			'action' => 'style',
			'changemode' => 'input',
			'style_properity' => '--mb2-pb-mainslider-height'
		),
		'mheight'=>array(
			'type'=>'range',
			'section' => 'general',
			'title'=> get_string('mheight', 'local_mb2builder'),
			'min'=> 30,
			'max' => 100,
			'default'=> 85,
			'action' => 'style',
			'changemode' => 'input',
			'style_suffix' => 'none',
			'style_properity' => '--mb2-pb-mainslider-mheight'
		),
		'animtype' => array(
			'type' => 'list',
			'section' => 'general',
			'title'=> get_string('animtype', 'local_mb2builder'),
			'options' => array(
				'slide' => get_string('slide', 'local_mb2builder'),
				'fade' => get_string('fade', 'local_mb2builder')
			),
			'default' => 'slide',
			'action' => 'callback',
			'callback' => 'carousel'
		),
		'autoplay' => array(
			'type' => 'yesno',
			'section' => 'general',
			'title'=> get_string('autoplay', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'default' => 1,
			'action' => 'callback',
			'callback' => 'carousel'
		),
		'animtime'=>array(
			'type'=>'number',
			'section' => 'general',
			'min' => 300,
			'max' => 2000,
			'title'=> get_string('sanimate', 'local_mb2builder'),
			'default' => 800,
			'action' => 'callback',
			'callback' => 'carousel'
		),
		'pausetime'=>array(
			'type'=>'number',
			'section' => 'general',
			'min' => 1000,
			'max' => 20000,
			'title'=> get_string('spausetime', 'local_mb2builder'),
			'default' => 5000,
			'action' => 'callback',
			'callback' => 'carousel'
		),
		'sloop' => array(
			'type' => 'yesno',
			'section' => 'general',
			'title'=> get_string('loop', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'default' => 1,
			'action' => 'callback',
			'callback' => 'carousel'
		),
		'sdots' => array(
			'type' => 'yesno',
			'section' => 'general',
			'title'=> get_string('pagernav', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'default' => 1,
			'action' => 'callback',
			'callback' => 'carousel'
		),
		'snav' => array(
			'type' => 'yesno',
			'section' => 'general',
			'title'=> get_string('dirnav', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'default' => 1,
			'action' => 'callback',
			'callback' => 'carousel'
		),
		'ctnav' => array(
			'type' => 'yesno',
			'section' => 'general',
			'showon' => 'snav:1',
			'title'=> get_string('contentnav', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'default' => 0,
			'action' => 'class',
			'class_remove' => 'ctnav0 ctnav1',
			'class_prefix' => 'ctnav'
		),
		'mt'=>array(
			'type'=>'range',
			'section' => 'style',
			'title'=> get_string('mt', 'local_mb2builder'),
			'min'=> 0,
			'max' => 300,
			'default'=> 0,
			'action' => 'style',
			'changemode' => 'input',
			'style_properity' => 'margin-top'
		),
		'mb'=>array(
			'type'=>'range',
			'section' => 'style',
			'title'=> get_string('mb', 'local_mb2builder'),
			'min'=> 0,
			'max' => 300,
			'default'=> 0,
			'action' => 'style',
			'changemode' => 'input',
			'style_properity' => 'margin-bottom'
		),
		'custom_class'=>array(
			'type'=>'text',
			'section' => 'style',
			'title'=> get_string('customclasslabel', 'local_mb2builder'),
			'desc'=> get_string('customclassdesc', 'local_mb2builder')
		)
	),
	'subelement' => array(
		'tabs' => array(
			'general' => get_string('generaltab', 'local_mb2builder'),
			'content' => get_string('content', 'local_mb2builder'),
			'heroimg' => get_string('heroimg', 'local_mb2builder'),
		),
		'attr' => array(
			'image' => array(
				'type' => 'image',
				'section' => 'general',
				'title'=> get_string('image', 'local_mb2builder'),
				'action' => 'image',
				'selector' => '.theme-slider-img img',
				'parent' => 1,
				'selectorbg' => '.img-cover'
			),
			'ocolor'=>array(
				'type'=>'color',
				'section' => 'general',
				'title'=> get_string('overlaycolor', 'local_mb2builder'),
				'action' => 'color',
				'parent' => 1,
				'style_properity' => 'background-color',
				'selector' => '.pbmainslider-item-inner',
				'default' => ''
			),

			'link'=>array(
				'type'=>'text',
				'section' => 'general',
				'title'=> get_string('link', 'local_mb2builder')
			),
			'link_target'=>array(
				'type'=>'yesno',
				'section' => 'general',
				'title'=> get_string('linknewwindow', 'local_mb2builder'),
				'options' => array(
					1 => get_string('yes', 'local_mb2builder'),
					0 => get_string('no', 'local_mb2builder')
				),
				'action' => 'none',
				'default' => 0
			),

			


			'group_mainslideralign_start' => array('type'=>'group_start', 'section' => 'content', 'title'=> get_string('styletab', 'local_mb2builder')), // ============ GROUP START ============ //
			
			'cwidth'=>array(
				'type'=>'range',
				//'showon' => 'isbg:1',
				'section' => 'content',
				'title'=> get_string('cwidth', 'local_mb2builder'),
				'min'=> 50,
				'max' => 2000,
				'default'=> 750,
				'action' => 'style',
				'parent' => 1,
				'selector' => '.slide-content3',
				'changemode' => 'input',
				'style_properity' => 'width'
			),
			'halign'=>array(
				'type' => 'buttons',
				'section' => 'content',
				'title'=> get_string('alignh', 'local_mb2builder'),
				'options' => array(
					//'none' => get_string('none', 'local_mb2builder'),
					'left' => get_string('left', 'local_mb2builder'),
					'center' => get_string('center', 'local_mb2builder'),
					'right' => get_string('right', 'local_mb2builder')
				),
				'default' => 'left',
				'action' => 'class',
				'selector' => '.pbmainslider-item-inner',
				'parent' => 1,
				'class_remove' => 'halignleft halignright haligncenter',
				'class_prefix' => 'halign'
			),			
			'valign'=>array(
				'type' => 'buttons',
				'section' => 'content',
				'title'=> get_string('alignv', 'local_mb2builder'),
				'options' => array(
					//'none' => get_string('none', 'local_mb2builder'),
					'top' => get_string('top', 'local_mb2builder'),
					'center' => get_string('center', 'local_mb2builder'),
					'bottom' => get_string('bottom', 'local_mb2builder')
				),
				'default' => 'center',
				'action' => 'class',
				'parent' => 1,
				'selector' => '.pbmainslider-item-inner',
				'class_remove' => 'valigntop valignbottom valigncenter',
				'class_prefix' => 'valign'
			),
			'aligntext'=>array(
				'type' => 'buttons',
				'section' => 'content',
				'title'=> get_string('aligntext', 'local_mb2builder'),
				'options' => array(
					'none' => get_string('none', 'local_mb2builder'),
					'left' => get_string('left', 'local_mb2builder'),
					'center' => get_string('center', 'local_mb2builder'),
					'right' => get_string('right', 'local_mb2builder')
				),
				'default' => 'none',
				'action' => 'class',
				'parent' => 1,
				'selector' => '.pbmainslider-item-inner',
				'class_remove' => 'aligntextnone aligntextleft aligntextright aligntextcenter',
				'class_prefix' => 'aligntext'
			),
			'prebg' => array(
				'type' => 'list',
				'section' => 'content',
				'title'=> get_string('prestyle', 'local_mb2builder'),
				'options' => array(
					0 => get_string('none', 'local_mb2builder'),
					'gradient20' => get_string('gradient20', 'local_mb2builder'),
					'gradient40' => get_string('gradient40', 'local_mb2builder'),
					'strip1' => get_string('strip1', 'local_mb2builder'),
					'strip2' => get_string('strip2', 'local_mb2builder'),
					'strip3' => get_string('strip3', 'local_mb2builder'),
					'strip4' => get_string('strip4', 'local_mb2builder')
				),
				'default' => 0,
				'action' => 'class',
				'parent' => 1,
				'selector' => '.pbmainslider-item-inner',
				'class_prefix' => 'pre-bg',
				'class_remove' => 'pre-bggradient20 pre-bggradient40 pre-bgstrip1 pre-bgstrip2 pre-bgstrip3 pre-bgstrip4'
			),
			'bgcolor'=>array(
				'type'=>'color',
				'section' => 'content',
				'title'=> get_string('bgcolor', 'local_mb2builder'),
				'action' => 'color',
				'parent' => 1,
				'style_properity' => 'background-color',
				'selector' => '.slide-content3'
			),			
			'ph'=>array(
				'type'=>'range',
				'section' => 'content',
				'title'=> get_string('phlabel', 'local_mb2builder'),
				'min'=> 0,
				'max' => 300,
				'default'=> 15,
				'action' => 'style',
				'changemode' => 'input',
				'parent' => 1,
				'selector' => '.slide-content3',
				'style_properity' => '--mb2-pb-mainslider-cph',
				'numclass' => 1,
				'sizepref' => 'phsize'
			),
			'pv'=>array(
				'type'=>'range',
				'section' => 'content',
				'title'=> get_string('pvlabel', 'local_mb2builder'),
				'min'=> 0,
				'max' => 300,
				'default'=> 0,
				'action' => 'style',
				'changemode' => 'input',
				'parent' => 1,
				'selector' => '.slide-content3',
				'style_properity' => '--mb2-pb-mainslider-cpv',
				'numclass' => 1,
				'sizepref' => 'pvsize'
			),

			'cmt'=>array(
				'type'=>'range',
				'section' => 'content',
				'title'=> get_string('mt', 'local_mb2builder'),
				'min'=> 0,
				'max' => 300,
				'default'=> 0,
				'action' => 'style',
				'changemode' => 'input',
				'parent' => 1,
				'selector' => '.slide-content3',
				'style_properity' => 'margin-top'
			),
			'cmb'=>array(
				'type'=>'range',
				'section' => 'content',
				'title'=> get_string('mb', 'local_mb2builder'),
				'min'=> 0,
				'max' => 300,
				'default'=> 0,
				'action' => 'style',
				'changemode' => 'input',
				'parent' => 1,
				'selector' => '.slide-content3',
				'style_properity' => 'margin-bottom'
			),


			'group_mainslideralign_end' => array('type'=>'group_end', 'section' => 'content'), // ============ GROUP END ============ //

			
			'group_mainslider_start_1' => array('type'=>'group_start', 'section' => 'content', 'title'=> get_string('title', 'local_mb2builder')), // ============ GROUP START ============ //
		
			//

			'istitle' => array(
				'type' => 'yesno',
				'section' => 'content',
				'title'=> get_string('title', 'local_mb2builder'),
				'options' => array(
					1 => get_string('yes', 'local_mb2builder'),
					0 => get_string('no', 'local_mb2builder')
				),
				'default' => 1,
				'parent' => 1,
				'action' => 'class',
				'selector' => '.pbmainslider-item-inner',
				'class_remove' => 'istitle0 istitle1',
				'class_prefix' => 'istitle',
			),
			'title' => array(
				'type' => 'text',
				'showon' => 'istitle:1',
				'section' => 'content',
				'title'=> get_string('title', 'local_mb2builder'),
				'default' => 'Title text',
				'action' => 'text',
				'parent' => 1,
				'selector' => '.slide-title'
			),
			'tcolor'=>array(
				'type'=>'color',
				'section' => 'content',
				'showon' => 'istitle:1',
				'title'=> get_string('color', 'local_mb2builder'),
				'action' => 'color',
				'parent' => 1,
				'style_properity' => 'color',
				'selector' => '.slide-title'
			),
			'tsize'=>array(
				'type' => 'range',
				'section' => 'content',
				'showon' => 'istitle:1',
				'title'=> get_string('sizelabel', 'local_mb2builder', ''),
				'min'=> 1,
				'max' => 10,
				'step' => 0.01,
				'default'=> 2.4,
				'action' => 'style',
				'style_suffix' => 'none',
				'changemode' => 'input',
				'selector' => '.slide-title',
				'style_properity' => 'font-size',
				'style_suffix' => 'rem',
				'parent' => 1,
				'numclass' => 1,
				'sizepref' => 'hsize'
			),
			'tfweight'=>array(
				'type' => 'buttons',
				'section' => 'content',
				'showon' => 'istitle:1',
				'title'=> get_string('fweight', 'local_mb2builder'),
				'options' => array(
					'global' => get_string('global', 'local_mb2builder'),
					'light' => get_string('fwlight', 'local_mb2builder'),
					'normal' => get_string('normal', 'local_mb2builder'),
					'medium' => get_string('wmedium', 'local_mb2builder'),
					'bold' => get_string('fwbold', 'local_mb2builder')
				),
				'default' => 'global',
				'action' => 'class',
				'parent' => 1,
				'selector' => '.slide-title',
				'class_remove' => 'fwglobal fwlight fwnormal fwmedium fwbold',
				'class_prefix' => 'fw'
			),
			'tlh'=>array(
				'type' => 'buttons',
				'section' => 'content',
				'showon' => 'istitle:1',
				'title'=> get_string('lh', 'local_mb2builder'),
				'options' => array(
					'global' => get_string('global', 'local_mb2builder'),
					'small' => get_string('wsmall', 'local_mb2builder'),
					'normal' => get_string('normal', 'local_mb2builder')
				),
				'default' => 'global',
				'action' => 'class',
				'parent' => 1,
				'selector' => '.slide-title',
				'class_remove' => 'lhglobal lhsmall lhmedium lhnormal',
				'class_prefix' => 'lh'
			),
			'tlspacing'=>array(
				'type'=>'range',
				'section' => 'content',
				'showon' => 'istitle:1',
				'title'=> get_string('lspacing', 'local_mb2builder'),
				'min'=> -10,
				'max' => 30,
				'step' => 1,
				'default'=> 0,
				'parent' => 1,
				'action' => 'style',
				'changemode' => 'input',
				'selector' => '.slide-title',
				'style_properity' => 'letter-spacing'
			),
			'twspacing'=>array(
				'type'=>'range',
				'section' => 'content',
				'showon' => 'istitle:1',
				'title'=> get_string('wspacing', 'local_mb2builder'),
				'min'=> -10,
				'max' => 30,
				'step' => 1,
				'default'=> 0,
				'action' => 'style',
				'changemode' => 'input',
				'parent' => 1,
				'selector' => '.slide-title',
				'style_properity' => 'word-spacing'
			),
			'tupper' => array(
				'type' => 'yesno',
				'section' => 'content',
				'showon' => 'istitle:1',
				'title'=> get_string('uppercase', 'local_mb2builder'),
				'options' => array(
					1 => get_string('yes', 'local_mb2builder'),
					0 => get_string('no', 'local_mb2builder')
				),
				'default' => 0,
				'action' => 'class',
				'parent' => 1,
				'selector' => '.slide-title',
				'class_remove' => 'upper0 upper1',
				'class_prefix' => 'upper',
			),

			'ttcshadow'=>array(
				'type'=>'color',
				'section' => 'content',
				'showon' => 'istitle:1',
				'title'=> get_string('tshadowc', 'local_mb2builder'),
				'action' => 'color',
				'parent' => 1,
				'style_properity' => '--mb2-pb-mainslider-tcshadow',
				'selector' => '.slide-title'
			),

			'tthshadow'=>array(
				'type'=>'range',
				'section' => 'content',
				'showon' => 'istitle:1',
				'title'=> get_string('tshadowh', 'local_mb2builder'),
				'min'=> -2,
				'max' => 2,
				'step' => 0.01,
				'default'=> 0.06,
				'action' => 'style',
				'parent' => 1,
				'style_suffix' => 'em',
				'selector' => '.slide-title',
				'changemode' => 'input',
				'style_properity' => '--mb2-pb-mainslider-thshadow'
			),
			'ttvshadow'=>array(
				'type'=>'range',
				'section' => 'content',
				'showon' => 'istitle:1',
				'title'=> get_string('tshadowv', 'local_mb2builder'),
				'min'=> -2,
				'max' => 2,
				'step' => 0.01,
				'default'=> 0.04,
				'style_suffix' => 'em',
				'action' => 'style',
				'parent' => 1,
				'selector' => '.slide-title',
				'changemode' => 'input',
				'style_properity' => '--mb2-pb-mainslider-tvshadow'
			),
			'ttbshadow'=>array(
				'type'=>'range',
				'section' => 'content',
				'showon' => 'istitle:1',
				'title'=> get_string('tshadowb', 'local_mb2builder'),
				'min'=> 0,
				'max' => 100,
				'default'=> 0,
				'action' => 'style',
				'parent' => 1,
				'selector' => '.slide-title',
				'changemode' => 'input',
				'style_properity' => '--mb2-pb-mainslider-tbshadow'
			),			

			'group_mainslider_end_1' => array('type'=>'group_end', 'section' => 'content'), // ============ GROUP END ============ //

			'group_mainslider_desc_start' => array('type'=>'group_start', 'section' => 'content', 'title'=> get_string('desc', 'local_mb2builder')), // ============ GROUP START ============ //


			
			//

			'isdesc' => array(
				'type' => 'yesno',
				'section' => 'content',
				'title'=> get_string('desc', 'local_mb2builder'),
				'options' => array(
					1 => get_string('yes', 'local_mb2builder'),
					0 => get_string('no', 'local_mb2builder')
				),
				'default' => 1,
				'parent' => 1,
				'action' => 'class',
				'selector' => '.pbmainslider-item-inner',
				'class_remove' => 'isdesc0 isdesc1',
				'class_prefix' => 'isdesc',
			),
			'desc' => array(
				'type' => 'textarea',
				'showon' => 'isdesc:1',
				'section' => 'content',
				'title'=> get_string('desc', 'local_mb2builder'),
				'action' => 'text',
				'parent' => 1,
				'selector' => '.slide-desc'
			),
			'dcolor'=>array(
				'type'=>'color',
				'section' => 'content',
				'showon' => 'isdesc:1',
				'title'=> get_string('color', 'local_mb2builder'),
				'action' => 'color',
				'parent' => 1,
				'style_properity' => 'color',
				'selector' => '.slide-desc'
			),
			'dsize'=>array(
				'type' => 'range',
				'section' => 'content',
				'showon' => 'isdesc:1',
				'title'=> get_string('sizelabel', 'local_mb2builder', ''),
				'min'=> 1,
				'max' => 10,
				'step' => 0.01,
				'default'=> 1,
				'action' => 'style',
				'style_suffix' => 'none',
				'changemode' => 'input',
				'selector' => '.slide-desc',
				'style_properity' => 'font-size',
				'style_suffix' => 'rem',
				'parent' => 1,
				'numclass' => 1,
				'sizepref' => 'textsize'
			),
			'dfweight'=>array(
				'type' => 'buttons',
				'section' => 'content',
				'showon' => 'isdesc:1',
				'title'=> get_string('fweight', 'local_mb2builder'),
				'options' => array(
					'global' => get_string('global', 'local_mb2builder'),
					'light' => get_string('fwlight', 'local_mb2builder'),
					'normal' => get_string('normal', 'local_mb2builder'),
					'medium' => get_string('wmedium', 'local_mb2builder'),
					'bold' => get_string('fwbold', 'local_mb2builder')
				),
				'default' => 'global',
				'action' => 'class',
				'parent' => 1,
				'selector' => '.slide-desc',
				'class_remove' => 'fwglobal fwlight fwnormal fwmedium fwbold',
				'class_prefix' => 'fw'
			),
			'dlh'=>array(
				'type' => 'buttons',
				'section' => 'content',
				'showon' => 'isdesc:1',
				'title'=> get_string('lh', 'local_mb2builder'),
				'options' => array(
					'global' => get_string('global', 'local_mb2builder'),
					'small' => get_string('wsmall', 'local_mb2builder'),
					'normal' => get_string('normal', 'local_mb2builder')
				),
				'default' => 'global',
				'action' => 'class',
				'parent' => 1,
				'selector' => '.slide-desc',
				'class_remove' => 'lhglobal lhsmall lhmedium lhnormal',
				'class_prefix' => 'lh'
			),
			'dlspacing'=>array(
				'type'=>'range',
				'section' => 'content',
				'showon' => 'isdesc:1',
				'title'=> get_string('lspacing', 'local_mb2builder'),
				'min'=> -10,
				'max' => 30,
				'step' => 1,
				'default'=> 0,
				'parent' => 1,
				'action' => 'style',
				'changemode' => 'input',
				'selector' => '.slide-desc',
				'style_properity' => 'letter-spacing'
			),
			'dwspacing'=>array(
				'type'=>'range',
				'section' => 'content',
				'showon' => 'isdesc:1',
				'title'=> get_string('wspacing', 'local_mb2builder'),
				'min'=> -10,
				'max' => 30,
				'step' => 1,
				'default'=> 0,
				'action' => 'style',
				'changemode' => 'input',
				'parent' => 1,
				'selector' => '.slide-desc',
				'style_properity' => 'word-spacing'
			),
			'dupper' => array(
				'type' => 'yesno',
				'section' => 'content',
				'showon' => 'isdesc:1',
				'title'=> get_string('uppercase', 'local_mb2builder'),
				'options' => array(
					1 => get_string('yes', 'local_mb2builder'),
					0 => get_string('no', 'local_mb2builder')
				),
				'default' => 0,
				'action' => 'class',
				'parent' => 1,
				'selector' => '.slide-desc',
				'class_remove' => 'upper0 upper1',
				'class_prefix' => 'upper',
			),

			'dtcshadow'=>array(
				'type'=>'color',
				'section' => 'content',
				'showon' => 'isdesc:1',
				'title'=> get_string('tshadowc', 'local_mb2builder'),
				'action' => 'color',
				'parent' => 1,
				'style_properity' => '--mb2-pb-mainslider-tcshadow',
				'selector' => '.slide-desc'
			),

			'dthshadow'=>array(
				'type'=>'range',
				'section' => 'content',
				'showon' => 'isdesc:1',
				'title'=> get_string('tshadowh', 'local_mb2builder'),
				'min'=> -2,
				'max' => 2,
				'step' => 0.01,
				'default'=> 0.06,
				'style_suffix' => 'em',
				'action' => 'style',
				'parent' => 1,
				'selector' => '.slide-desc',
				'changemode' => 'input',
				'style_properity' => '--mb2-pb-mainslider-thshadow'
			),
			'dtvshadow'=>array(
				'type'=>'range',
				'section' => 'content',
				'showon' => 'isdesc:1',
				'title'=> get_string('tshadowv', 'local_mb2builder'),
				'min'=> -2,
				'max' => 2,
				'step' => 0.01,
				'default'=> 0.04,
				'style_suffix' => 'em',
				'action' => 'style',
				'parent' => 1,
				'selector' => '.slide-desc',
				'changemode' => 'input',
				'style_properity' => '--mb2-pb-mainslider-tvshadow'
			),
			'dtbshadow'=>array(
				'type'=>'range',
				'section' => 'content',
				'showon' => 'isdesc:1',
				'title'=> get_string('tshadowb', 'local_mb2builder'),
				'min'=> 0,
				'max' => 100,
				'default'=> 0,
				'action' => 'style',
				'parent' => 1,
				'selector' => '.slide-desc',
				'changemode' => 'input',
				'style_properity' => '--mb2-pb-mainslider-tbshadow'
			),	

			'dmt'=>array(
				'type'=>'range',
				'section' => 'content',
				'showon' => 'isdesc:1',
				'title'=> get_string('mt', 'local_mb2builder'),
				'min'=> 0,
				'max' => 300,
				'default'=> 15,
				'action' => 'style',
				'parent' => 1,
				'selector' => '.slide-desc',
				'changemode' => 'input',
				'style_properity' => 'margin-top'
			),


			'group_mainslider_desc_end' => array('type'=>'group_end', 'section' => 'content'), // ============ GROUP END ============ //

			//

			//
			


			//

			

			

			

			'group_mainslider_button_start' => array('type'=>'group_start', 'section' => 'content', 'title'=> get_string('button', 'local_mb2builder')), // ============ GROUP START ============ //

			'linkbtn' => array(
				'type' => 'yesno',
				'section' => 'content',
				'title'=> get_string('button', 'local_mb2builder'),
				'options' => array(
					1 => get_string('yes', 'local_mb2builder'),
					0 => get_string('no', 'local_mb2builder')
				),
				'default' => 1,
				'parent' => 1,
				'action' => 'class',
				'selector' => '.pbmainslider-item-inner',
				'class_remove' => 'linkbtn0 linkbtn1',
				'class_prefix' => 'linkbtn',
			),
			

			'btntext'=>array(
				'type'=>'text',
				'section' => 'content',
				'showon' => 'linkbtn:1',
				'title'=> get_string('text', 'local_mb2builder'),
				'action' => 'text',
				'parent' => 1,
				'selector' => '.btn-intext',
				'default' => get_string( 'readmorefp', 'local_mb2builder' )
			),	
	
			'btntype'=>array(
				'type'=>'list',
				'section' => 'content',
				'showon' => 'linkbtn:1',
				'title'=> get_string('type', 'local_mb2builder'),
				'options' => array(
					'default' => get_string('default', 'local_mb2builder'),
					'primary' => get_string('primary', 'local_mb2builder'),
					'secondary' => get_string('secondary', 'local_mb2builder'),
					'success' => get_string('success', 'local_mb2builder'),
					'warning' => get_string('warning', 'local_mb2builder'),
					'info' => get_string('info', 'local_mb2builder'),
					'danger' => get_string('danger', 'local_mb2builder'),
					'inverse' => get_string('inverse', 'local_mb2builder'),
					//'link' => get_string('link', 'local_mb2builder')
				),
				'default' => 'primary',
				'action' => 'class',
				'parent' => 1,
				'selector' => '.mb2-pb-btn,.slide-contentnav',
				'class_remove' => 'typeprimary typesecondary typesuccess typewarning typeinfo typedanger typeinverse typelink',
				'class_prefix' => 'type',
			),

			'btnsize'=>array(
				'type' => 'buttons',
				'section' => 'content',
				'showon' => 'linkbtn:1',
				'title'=> get_string('sizelabel', 'local_mb2builder', ''),
				'options' => array(
					//'xs' => get_string('xsmall', 'local_mb2builder'),
					'sm' => get_string('small', 'local_mb2builder'),
					'normal' => get_string('medium', 'local_mb2builder'),
					'lg' => get_string('large', 'local_mb2builder'),
					'xlg' => get_string('xlarge', 'local_mb2builder')
				),
				'default' => 'normal',
				'action' => 'class',
				'parent' => 1,
				'selector' => '.mb2-pb-btn,.slide-contentnav',
				'class_remove' => 'sizesm sizelg sizexlg sizenormal',
				'class_prefix' => 'size',
			),
			'btnfwcls'=>array(
				'type' => 'buttons',
				'section' => 'content',
				'showon' => 'linkbtn:1',
				'title'=> get_string('fweight', 'local_mb2builder'),
				'options' => array(
					'global' => get_string('global', 'local_mb2builder'),
					'light' => get_string('fwlight', 'local_mb2builder'),
					'normal' => get_string('normal', 'local_mb2builder'),
					'medium' => get_string('wmedium', 'local_mb2builder'),
					'bold' => get_string('fwbold', 'local_mb2builder')
				),
				'default' => 'global',
				'action' => 'class',
				'parent' => 1,
				'selector' => '.mb2-pb-btn,.slide-contentnav',
				'class_remove' => 'fwglobal fwlight fwnormal fwmedium fwbold',
				'class_prefix' => 'fw'
			),
			'btnrounded' => array(
				'type' => 'yesno',
				'section' => 'content',
				'showon' => 'linkbtn:1',
				'title'=> get_string('rounded', 'local_mb2builder'),
				'options' => array(
					1 => get_string('yes', 'local_mb2builder'),
					0 => get_string('no', 'local_mb2builder')
				),
				'default' => 0,
				'action' => 'class',
				'parent' => 1,
				'selector' => '.mb2-pb-btn',
				'class_remove' => 'rounded0 rounded1',
				'class_prefix' => 'rounded',
			),
			'btnborder' => array(
				'type' => 'yesno',
				'section' => 'content',
				'showon' => 'linkbtn:1',
				'title'=> get_string('border', 'local_mb2builder'),
				'options' => array(
					1 => get_string('yes', 'local_mb2builder'),
					0 => get_string('no', 'local_mb2builder')
				),
				'default' => 0,
				'action' => 'class',
				'parent' => 1,
				'selector' => '.mb2-pb-btn',
				'class_remove' => 'btnborder0 btnborder1',
				'class_prefix' => 'btnborder',
			),
			'btnmt'=>array(
				'type'=>'range',
				'section' => 'content',
				'showon' => 'linkbtn:1',
				'title'=> get_string('mt', 'local_mb2builder'),
				'min'=> 0,
				'max' => 300,
				'default'=> 15,
				'action' => 'style',
				'parent' => 1,
				'selector' => '.slide-content3',
				'changemode' => 'input',
				'style_properity' => '--mb2-pb-mainslider-btnmt'
			),

			'group_mainslider_button_end' => array('type'=>'group_end', 'section' => 'content'), // ============ GROUP END ============ //

			///


			'heroimg' => array(
				'type' => 'yesno',
				'section' => 'heroimg',
				'title'=> get_string('heroimg', 'local_mb2builder'),
				'options' => array(
					1 => get_string('yes', 'local_mb2builder'),
					0 => get_string('no', 'local_mb2builder')
				),
				'default' => 0,
				'action' => 'class',
				'parent' => 1,
				'selector' => '.pbmainslider-item-inner',
				'class_prefix' => 'heroimg',
				'class_remove' => 'heroimg0 heroimg1'
			),
			'heroimgurl' => array(
				'type' => 'image',
				'showon' => 'heroimg:1',
				'section' => 'heroimg',
				'parent' => 1,
				'title'=> get_string('image', 'local_mb2builder'),
				'action' => 'image',
				'selector' => '.slidehero-img'
			),
			'herov'=>array(
				'type' => 'buttons',
				'section' => 'heroimg',
				'showon' => 'heroimg:1',
				'title'=> get_string('alignv', 'local_mb2builder'),
				'options' => array(
					'top' => get_string('top', 'local_mb2builder'),
					'center' => get_string('center', 'local_mb2builder'),
					'bottom' => get_string('bottom', 'local_mb2builder')
				),
				'default' => 'center',
				'action' => 'class',
				'parent' => 1,
				'selector' => '.pbmainslider-item-inner',
				'class_remove' => 'herovtop herovcenter herovbottom',
				'class_prefix' => 'herov'
			),
			'heroonsmall' => array(
				'type' => 'yesno',
				'section' => 'heroimg',
				'showon' => 'heroimg:1',
				'title'=> get_string('smallscreen', 'local_mb2builder'),
				'options' => array(
					1 => get_string('yes', 'local_mb2builder'),
					0 => get_string('no', 'local_mb2builder')
				),
				'default' => 1,
				'action' => 'class',
				'parent' => 1,
				'selector' => '.pbmainslider-item-inner',
				'class_prefix' => 'heroonsmall',
				'class_remove' => 'heroonsmall0 heroonsmall1'
			),
			'herow' => array(
				'type'=>'range',
				'section' => 'heroimg',
				'showon' => 'heroimg:1',
				'title'=> get_string('widthlabel', 'local_mb2builder'),
				'min'=> 50,
				'max' => 2000,
				'default'=> 1200,
				'action' => 'style',
				'parent' => 1,
				'changemode' => 'input',
				'selector' => '.slidehero-img-wrap3',
				'style_properity' => 'width'
			),
			'herohpos' => array(
				'type' => 'buttons',
				'section' => 'heroimg',
				'showon' => 'heroimg:1',
				'title'=> get_string('hpos', 'local_mb2builder'),
				'options' => array(
					'left' => get_string('left', 'local_mb2builder'),
					'right' => get_string('right', 'local_mb2builder')
				),
				'default' => 'left',
				'action' => 'setting',
				'parent' => 1,
				'setting' => 'heroml'
			),
			'heroml' => array(
				'type'=>'range',
				'section' => 'heroimg',
				'showon' => 'heroimg:1',
				'title'=> get_string('hpospercentage', 'local_mb2builder'),
				'min'=> -99,
				'max' => 99,
				'default'=> 0,
				'action' => 'style',
				'parent' => 1,
				'changemode' => 'input',
				'selector' => '.slidehero-img-wrap3',
				'style_properity' => 'left',
				'style_suffix' => '%'
			),
			'heromt' => array(
				'type'=>'range',
				'section' => 'heroimg',
				'showon' => 'heroimg:1',
				'title'=> get_string('toppixel', 'local_mb2builder'),
				'min'=> -500,
				'max' => 500,
				'default'=> 0,
				'action' => 'style',
				'parent' => 1,
				'changemode' => 'input',
				'selector' => '.slidehero-img-wrap3',
				'style_properity' => 'margin-top'
			),
			'herogradl' => array(
				'type' => 'yesno',
				'section' => 'heroimg',
				'showon' => 'heroimg:1',
				'title'=> get_string('herogradl', 'local_mb2builder'),
				'options' => array(
					1 => get_string('yes', 'local_mb2builder'),
					0 => get_string('no', 'local_mb2builder')
				),
				'default' => 0,
				'action' => 'class',
				'parent' => 1,
				'selector' => '.pbmainslider-item-inner',
				'class_prefix' => 'herogradl',
				'class_remove' => 'herogradl0 herogradl1'
			),
			'herogradr' => array(
				'type' => 'yesno',
				'section' => 'heroimg',
				'showon' => 'heroimg:1',
				'title'=> get_string('herogradr', 'local_mb2builder'),
				'options' => array(
					1 => get_string('yes', 'local_mb2builder'),
					0 => get_string('no', 'local_mb2builder')
				),
				'default' => 0,
				'action' => 'class',
				'parent' => 1,
				'selector' => '.pbmainslider-item-inner',
				'class_prefix' => 'herogradr',
				'class_remove' => 'herogradr0 herogradr1'
			),

			// 'heroimg' => array(
			// 	'type' => 'yesno',
			// 	'section' => 'heroimg',
			// 	'title'=> get_string('heroimg', 'local_mb2builder'),
			// 	'options' => array(
			// 		1 => get_string('yes', 'local_mb2builder'),
			// 		0 => get_string('no', 'local_mb2builder')
			// 	),
			// 	'default' => 0,
			// 	'action' => 'class',
			// 	'parent' => 1,
			// 	'class_prefix' => 'heroimg',
			// 	'class_remove' => 'heroimg0 heroimg1'
			// ),
			// 'heroimgurl' => array(
			// 	'type' => 'image',
			// 	'showon' => 'heroimg:1',
			// 	'section' => 'heroimg',
			// 	'parent' => 1,
			// 	'title'=> get_string('image', 'local_mb2builder'),
			// 	'action' => 'image',
			// 	'selector' => '.slidehero-img'
			// ),
			// 'herov'=>array(
			// 	'type' => 'buttons',
			// 	'section' => 'heroimg',
			// 	'showon' => 'heroimg:1',
			// 	'title'=> get_string('alignv', 'local_mb2builder'),
			// 	'options' => array(
			// 		'top' => get_string('top', 'local_mb2builder'),
			// 		'center' => get_string('center', 'local_mb2builder'),
			// 		'bottom' => get_string('bottom', 'local_mb2builder')
			// 	),
			// 	'default' => 'center',
			// 	'action' => 'class',
			// 	'parent' => 1,
			// 	'class_remove' => 'herovtop herovcenter herovbottom',
			// 	'class_prefix' => 'herov'
			// ),
			// 'herow' => array(
			// 	'type'=>'range',
			// 	'section' => 'heroimg',
			// 	'showon' => 'heroimg:1',
			// 	'title'=> get_string('widthlabel', 'local_mb2builder'),
			// 	'min'=> 50,
			// 	'max' => 2000,
			// 	'default'=> 1200,
			// 	'action' => 'style',
			// 	'changemode' => 'input',
			// 	'parent' => 1,
			// 	'selector' => '.slidehero-img-wrap3',
			// 	'style_properity' => 'width'
			// ),
			// 'heroml' => array(
			// 	'type'=>'range',
			// 	'section' => 'heroimg',
			// 	'showon' => 'heroimg:1',
			// 	'title'=> get_string('leftpercentage', 'local_mb2builder'),
			// 	'min'=> -99,
			// 	'max' => 99,
			// 	'default'=> 0,
			// 	'action' => 'style',
			// 	'changemode' => 'input',
			// 	'parent' => 1,
			// 	'selector' => '.slidehero-img-wrap3',
			// 	'style_properity' => 'left',
			// 	'style_suffix' => '%'
			// ),
			// 'herogradl' => array(
			// 	'type' => 'yesno',
			// 	'section' => 'heroimg',
			// 	'showon' => 'heroimg:1',
			// 	'title'=> get_string('herogradl', 'local_mb2builder'),
			// 	'options' => array(
			// 		1 => get_string('yes', 'local_mb2builder'),
			// 		0 => get_string('no', 'local_mb2builder')
			// 	),
			// 	'default' => 0,
			// 	'action' => 'class',
			// 	'parent' => 1,
			// 	'class_prefix' => 'herogradl',
			// 	'class_remove' => 'herogradl0 herogradl1'
			// ),
			// 'herogradr' => array(
			// 	'type' => 'yesno',
			// 	'section' => 'heroimg',
			// 	'showon' => 'heroimg:1',
			// 	'title'=> get_string('herogradr', 'local_mb2builder'),
			// 	'options' => array(
			// 		1 => get_string('yes', 'local_mb2builder'),
			// 		0 => get_string('no', 'local_mb2builder')
			// 	),
			// 	'default' => 0,
			// 	'action' => 'class',
			// 	'parent' => 1,
			// 	'class_prefix' => 'herogradr',
			// 	'class_remove' => 'herogradr0 herogradr1'
			// )
		)
	)
);


define('LOCAL_MB2BUILDER_SETTINGS_PBMAINSLIDER', base64_encode( serialize( $mb2_settings ) ));
