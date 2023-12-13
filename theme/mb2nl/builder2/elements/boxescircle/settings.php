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
 * @copyright  2018 - 2020 Mariusz Boloz (mb2moodle.com/)
 * @license   Commercial https://themeforest.net/licenses
 */

defined('MOODLE_INTERNAL') || die();



$mb2_settings = array(
	'id' => 'boxescircle',
	'subid' => 'boxescircle_item',
	'title' => get_string('boxescircle', 'local_mb2builder'),
	'icon' => 'fa fa-circle-o',
	'type'=> 'general',
	'tabs' => array(
		'general' => get_string('generaltab', 'local_mb2builder'),
		'style' => get_string('styletab', 'local_mb2builder')
	),
	'attr' => array(
		'type'=>array(
			'type'=>'buttons',
			'section' => 'general',
			'title'=> get_string('type', 'local_mb2builder'),
			'options' => array(
				1 => get_string( 'typen', 'local_mb2builder', array( 'type' => 1 ) ),
				//2 => get_string( 'typen', 'local_mb2builder', array( 'type' => 2 ) ),
				//3 => get_string( 'typen', 'local_mb2builder', array( 'type' => 3 ) ),
			),
			'default' => 1,
			'action' => 'class',
			'selector' => '.mb2-pb-element-inner',
			'class_remove' => 'type-1 type-2 type-3',
			'class_prefix' => 'type-',
		),
		'size'=>array(
			'type'=>'range',
			'section' => 'general',
			'title'=> get_string('sizelabel', 'local_mb2builder', ' (px)'),
			'min'=> 100,
			'max' => 700,
			'default'=> 200,
			'action' => 'style',
			'changemode' => 'input',
			'style_properity' => '--mb2-pb-bcrcle-s'
		),
		'gap'=>array(
			'type'=>'range',
			'section' => 'general',
			'title'=> get_string('gap', 'local_mb2builder'),
			'min'=> 0,
			'max' => 80,
			'default'=> 20,
			'action' => 'style',
			'changemode' => 'input',
			'style_properity' => '--mb2-pb-bcrcle-gap'
		),
		'bors'=>array(
			'type'=>'range',
			'section' => 'general',
			'title'=> get_string('borderw', 'local_mb2builder'),
			'min'=> 0,
			'max' => 20,
			'default'=> 3,
			'action' => 'style',
			'changemode' => 'input',
			'style_properity' => '--mb2-pb-bcrcle-bors'
		),	
		'desc'=>array(
			'type'=>'yesno',
			'section' => 'general',
			'title'=> get_string('content', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'action' => 'class',
			'selector' => '.mb2-pb-element-inner',
			'class_remove' => 'desc0 desc1',
			'class_prefix' => 'desc',
			'default' => 1
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
			'default'=> 10,
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
			'style' => get_string('styletab', 'local_mb2builder')
		),
		'attr' => array(
			'image'=>array(
				'type'=>'image',
				'section' => 'general',
				'title'=> get_string('image', 'local_mb2builder'),
				'action' => 'image',
				'selector' => '.theme-boxcircle',
				'style_properity' => 'background-image'
			),
			'title'=>array(
				'type'=>'text',
				'section' => 'general',
				'title'=> get_string('title', 'local_mb2builder'),
				'action' => 'text',
				'selector' => '.box-title-text'
			),
			'text'=>array(
				'type'=>'textarea',
				'section' => 'general',
				'title'=> get_string('text', 'local_mb2builder'),
				'action' => 'text',
				'selector' => '.box-desc-text'
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
			'group_boxcircle_start1' => array(
				'type'=>'group_start', 
				'section' => 'style', 
				'title'=> get_string('normal', 'local_mb2builder')), // ============ GROUP START ============ //
			'color'=>array(
				'type'=>'color',
				'section' => 'style',
				'title' => get_string('bgcolor', 'local_mb2builder'),
				'action' => 'color',
				'changemode' => 'input',
				'selector' => '.theme-boxcircle',
				'style_properity' => '--mb2-pb-bcrcle-color'
			),
			'bgcolor'=>array(
				'type'=>'color',
				'section' => 'style',
				'title' => get_string('bgcolor', 'local_mb2builder'),
				'action' => 'color',
				'changemode' => 'input',
				'selector' => '.theme-boxcircle',
				'style_properity' => '--mb2-pb-bcrcle-bgcolor'
			),
			'borcolor'=>array(
				'type'=>'color',
				'section' => 'style',
				'title' => get_string('bordercolor', 'local_mb2builder'),
				'action' => 'color',
				'changemode' => 'input',
				'selector' => '.theme-boxcircle',
				'style_properity' => '--mb2-pb-bcrcle-borcolor'
			),			
			'group_boxcircle_end1' => array('type'=>'group_end', 'section' => 'style'), // ============ GROUP END ============ //
			'group_boxcircle_start2' => array(
				'type'=>'group_start', 
				'section' => 'style', 
				'title'=> get_string('hover_active', 'local_mb2builder')), // ============ GROUP START ============ //
			'hcolor'=>array(
				'type'=>'color',
				'section' => 'style',
				'title' => get_string('bgcolor', 'local_mb2builder'),
				'action' => 'color',
				'changemode' => 'input',
				'selector' => '.theme-boxcircle',
				'style_properity' => '--mb2-pb-bcrcle-hcolor'
			),
			'hbgcolor'=>array(
				'type'=>'color',
				'section' => 'style',
				'title' => get_string('bgcolor', 'local_mb2builder'),
				'action' => 'color',
				'changemode' => 'input',
				'selector' => '.theme-boxcircle',
				'style_properity' => '--mb2-pb-bcrcle-hbgcolor'
			),
			'hborcolor'=>array(
				'type'=>'color',
				'section' => 'style',
				'title' => get_string('bordercolor', 'local_mb2builder'),
				'action' => 'color',
				'changemode' => 'input',
				'selector' => '.theme-boxcircle',
				'style_properity' => '--mb2-pb-bcrcle-hborcolor'
			),			
			'group_boxcircle_end2' => array('type'=>'group_end', 'section' => 'style'), // ============ GROUP END ============ //
		)
	)
);





		


define('LOCAL_MB2BUILDER_SETTINGS_BOXESCIRCLE', base64_encode( serialize( $mb2_settings ) ));
