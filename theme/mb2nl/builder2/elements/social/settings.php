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
	'id' => 'social',
	'subid' => '',
	'title' => get_string('social', 'local_mb2builder'),
	'icon' => 'fa fa-users',
	'footer' => 1,
	'tabs' => array(
		'general' => get_string('generaltab', 'local_mb2builder'),
		'style' => get_string('styletab', 'local_mb2builder')
	),
	'attr' => array(
		'type'=>array(
			'type'=>'list',
			'section' => 'general',
			'title'=> get_string('type', 'local_mb2builder'),
			'options' => array(
				1 => get_string( 'typen', 'local_mb2builder', array( 'type' => 1 ) ),
				2 => get_string( 'typen', 'local_mb2builder', array( 'type' => 2 ) )
			),
			'default' => 1,
			'action' => 'class',
			'class_remove' => 'type1 type2',
			'class_prefix' => 'type'
		),
		'size'=>array(
			'type' => 'buttons',
			'section' => 'general',
			'title'=> get_string('sizelabel', 'local_mb2builder', ''),
			'options' => array(
				//'xs' => get_string('xsmall', 'local_mb2builder'),
				//'sm' => get_string('small', 'local_mb2builder'),
				'normal' => get_string('medium', 'local_mb2builder'),
				'l' => get_string('large', 'local_mb2builder'),
				'xl' => get_string('xlarge', 'local_mb2builder'),
				'xxl' => get_string('xxlarge', 'local_mb2builder')
			),
			'default' => 'normal',
			'action' => 'class',
			'class_remove' => 'sizenormal sizel sizexl sizexxl',
			'class_prefix' => 'size',
		),
		'space'=>array(
			'type'=>'range',
			'section' => 'general',
			'title'=> get_string('elpacing', 'local_mb2builder'),
			'min'=> 0,
			'max' => 60,
			'default'=> 6,
			'action' => 'style',
			'changemode' => 'input',
			'style_properity' => '--mb2-social-space'
		),
		'rounded' => array(
			'type' => 'buttons',
			'section' => 'general',
			'title'=> get_string('rounded', 'local_mb2builder'),
			'options' => array(
				0 => get_string('global', 'local_mb2builder'),
				1 => get_string('yes', 'local_mb2builder'),				
				-1 => get_string('no', 'local_mb2builder'),
			),
			'default' => 0,
			'action' => 'class',
			'class_remove' => 'rounded0 rounded1 rounded-1',
			'class_prefix' => 'rounded',
		),	

		'group_social_start_1' => array(
		'type'=>'group_start', 'section' => 'style', 'title'=> get_string('normal', 'local_mb2builder')), // ============ GROUP START ============ //

		'color'=>array(
			'type'=>'color',
			'section' => 'style',
			'title'=> get_string('color', 'local_mb2builder'),
			'action' => 'color',
			'cssvariable' => '--mb2-social-color'
		),
		'bgcolor'=>array(
			'type'=>'color',
			'section' => 'style',
			'title'=> get_string('bgcolor', 'local_mb2builder'),
			'action' => 'color',
			'cssvariable' => '--mb2-social-bgcolor'
		),
		'borcolor'=>array(
			'type'=>'color',
			'section' => 'style',
			'title'=> get_string('bordercolor', 'local_mb2builder'),
			'action' => 'color',
			'cssvariable' => '--mb2-social-borcolor'
		),
		
		'group_social_end_1' => array('type'=>'group_end', 'section' => 'style'), // ============ GROUP END ============ //



		'group_social_start_2' => array(
		'type'=>'group_start', 'section' => 'style', 'title'=> get_string('hover_active', 'local_mb2builder')), // ============ GROUP START ============ //
			
		'hcolor'=>array(
			'type'=>'color',
			'section' => 'style',
			'title'=> get_string('color', 'local_mb2builder'),
			'action' => 'color',
			'cssvariable' => '--mb2-social-hcolor'
		),
		'hbgcolor'=>array(
			'type'=>'color',
			'section' => 'style',
			'title'=> get_string('bgcolor', 'local_mb2builder'),
			'action' => 'color',
			'cssvariable' => '--mb2-social-hbgcolor'
		),
		'hborcolor'=>array(
			'type'=>'color',
			'section' => 'style',
			'title'=> get_string('bordercolor', 'local_mb2builder'),
			'action' => 'color',
			'cssvariable' => '--mb2-social-hborcolor'
		),		
			
		'group_social_end_2' => array('type'=>'group_end', 'section' => 'style'), // ============ GROUP END ============ //


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
			'default'=> 30,
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
	)
);


define('LOCAL_MB2BUILDER_SETTINGS_SOCIAL', base64_encode( serialize( $mb2_settings ) ));
