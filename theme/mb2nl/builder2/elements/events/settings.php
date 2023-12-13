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
	'id' => 'events',
	'subid' => '',
	'title' => get_string('events', 'local_mb2builder'),
	'icon' => 'fa fa-calendar',
	'tabs' => array(
		'general' => get_string('generaltab', 'local_mb2builder'),
		'layouttab' => get_string('layouttab', 'local_mb2builder'),
		'carousel' => get_string('carouseltab', 'local_mb2builder'),
		'style' => get_string('styletab', 'local_mb2builder')
	),
	'attr' => array(

		'type' => array(
			'type' => 'buttons',
			'section' => 'general',
			'title'=> get_string('type', 'local_mb2builder'),
			'options' => array(
				0 => get_string('all', 'local_mb2builder'),
				1 => get_string('siteevents', 'local_mb2builder')
			),
			'default' => 0,
			'action' => 'ajax'
		),
		'upcoming' => array(
			'type' => 'yesno',
			'section' => 'general',
			'title'=> get_string('upcomingevents', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'default' => 0,
			'action' => 'ajax'
		),	
		'limit'=>array(
			'type'=>'number',
			'section' => 'general',
			'min' => 1,
			'max' => 99,
			'title'=> get_string('itemsperpage', 'local_mb2builder'),
			'default' => 4,
			'action' => 'ajax'
		),
		'layout' => array(
			'type' => 'list',
			'section' => 'layouttab',
			'title'=> get_string('layouttab', 'local_mb2builder'),
			'options' => array(
				1 => get_string('list', 'local_mb2builder'),
				2 => get_string('columns', 'local_mb2builder'),
				3 => get_string('carousel', 'local_mb2builder')
				//3 => get_string('carousel', 'local_mb2builder')
			),
			'default' => 2,
			'action' => 'ajax',
			'class_remove' => 'layout-1 layout-2',
			'class_prefix' => 'layout-',
			'advlayout' => 1
		),
		'columns'=>array(
			'type'=>'range',
			'section' => 'layouttab',
			'showon' => 'layout:2|3',
			'min' => 1,
			'max' => 5,
			'title'=> get_string('columns', 'local_mb2builder'),
			'default' => 4,
			'changemode' => 'input',
			'action' => 'class',
			'class_remove' => 'theme-col-1 theme-col-2 theme-col-3 theme-col-4 theme-col-5',
			'class_prefix' => 'theme-col-',
			'selector' => '.mb2-pb-content-list'
		),
		'gutter' => array(
			'type' => 'buttons',
			'section' => 'layouttab',
			'showon' => 'layout:2|3',
			'title'=> get_string('grdwidth', 'local_mb2builder'),
			'options' => array(
				'normal' => get_string('normal', 'local_mb2builder'),
				'thin' => get_string('thin', 'local_mb2builder'),
				'none' => get_string('none', 'local_mb2builder')
			),
			'default' => 'normal',
			'action' => 'callback',
			'callback' => 'carousel',
			'class_remove' => 'gutter-normal gutter-thin gutter-none',
			'class_prefix' => 'gutter-',
			'selector' => '.mb2-pb-content-list',
			'selector2' => '.superpost'
		),
		'animtime'=>array(
			'type'=>'number',
			'section' => 'carousel',
			'min' => 300,
			'max' => 2000,
			'title'=> get_string('sanimate', 'local_mb2builder'),
			'default' => 450,
			'action' => 'callback',
			'callback' => 'carousel'
		),
		'pausetime'=>array(
			'type'=>'number',
			'section' => 'carousel',
			'min' => 1000,
			'max' => 20000,
			'title'=> get_string('spausetime', 'local_mb2builder'),
			'default' => 5000,
			'action' => 'callback',
			'callback' => 'carousel'
		),
		'sloop' => array(
			'type' => 'yesno',
			'section' => 'carousel',
			'title'=> get_string('loop', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'default' => 0,
			'action' => 'callback',
			'callback' => 'carousel'
		),
		'autoplay' => array(
			'type' => 'yesno',
			'showon' => 'sloop:1',
			'section' => 'carousel',
			'title'=> get_string('autoplay', 'local_mb2builder'),
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
			'section' => 'carousel',
			'title'=> get_string('pagernav', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'default' => 0,
			'action' => 'callback',
			'callback' => 'carousel'
		),
		'snav' => array(
			'type' => 'yesno',
			'section' => 'carousel',
			'title'=> get_string('dirnav', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'default' => 1,
			'action' => 'callback',
			'callback' => 'carousel'
		),
		'color1'=>array(
			'type'=>'color',
			'section' => 'style',
			'title'=> get_string('color', 'local_mb2builder') . ' 1',
			'action' => 'color',
			'cssvariable' => '--mb2-pb-color1'
		),
		'color2'=>array(
			'type'=>'color',
			'section' => 'style',
			'title'=> get_string('color', 'local_mb2builder') . ' 2',
			'action' => 'color',
			'cssvariable' => '--mb2-pb-color2'
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


define('LOCAL_MB2BUILDER_SETTINGS_EVENTS', base64_encode( serialize( $mb2_settings ) ));
