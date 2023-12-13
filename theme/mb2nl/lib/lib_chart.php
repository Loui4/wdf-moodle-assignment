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
 * Method to set chart settings
 *
 */
function theme_mb2nl_chart_settings($opts)
{

	$settings = array();
	
	$settings['chart']['id'] = $opts['id'];
	$settings['chart']['type'] = $opts['type'];
	$settings['chart']['labels'] = $opts['labels'];
	$settings['chart']['dataset'] = $opts['dataset'];
	$settings['chart']['fontsize'] = 13;

	return $settings;

}






/*
 *
 * Method to set chart
 *
 */
function theme_mb2nl_chart($opts = array())
{
	
	global $PAGE;

	$output = '';

	// Set chart ID
	$opts['id'] = uniqid('chart_');

	$settings = theme_mb2nl_chart_settings($opts);

	$output .= '<div style="max-width:273px;margin: 0 auto;"><canvas id="' . $opts['id'] . '" class="aw_chart"></canvas></div>';

	$PAGE->requires->js_call_amd('theme_mb2nl/chart','dashboardChart', $settings);

	return $output;

}
