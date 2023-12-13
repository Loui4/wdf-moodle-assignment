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
 * Method to get courses
 *
 */
function theme_mb2nl_grades()
{
	global $USER;
	$activities = theme_mb2nl_grades_activities(2);
	$sum = 0;
	$count = 0;
	$taller = 0;

//print_r($activities);
	foreach ( $activities as $c )
	{
		$gradebookgrades = theme_mb2nl_mod_grade($USER->id, $c['instance'], $c['type'], $courseid = 2 );

		if ( ! isset( $gradebookgrades ) || ! $gradebookgrades )
		{
			 continue;
		}

		$sum += $gradebookgrades;
		if ( $gradebookgrades > $taller )
		{
			$taller = $gradebookgrades;
		}
		$count++;
		
	}
	//$gradebookgrades = \grade_get_grades($courseid = 3, 'mod', $type = '', $instanceid, $userid);
	print_r(number_format($sum, 2, '.', ''));
	//return $gradebookgrades;
}






/*
 *
 * Method to get courses
 *
 */
function theme_mb2nl_mod_grade( $userid, $instanceid, $type, $courseid )
{

	$gradebookgrades = grade_get_grades($courseid, 'mod', $type, $instanceid, $userid);

	if (isset($gradebookgrades->items)) {
        $gradebookitem = array_shift($gradebookgrades->items);
        if (isset($gradebookitem->grades[$userid])) {
            $grade = $gradebookitem->grades[$userid];
            if (!isset($grade->grade)) {
                return false;
            }
            return $grade->grade;
        }
    }
	
    return false;


}


/*
 *
 * Method to get courses
 *
 */
function theme_mb2nl_grades_activities($ccourse = 0)
{
	global $COURSE;

	$course = $ccourse ? get_course($ccourse) : $COURSE;
	$modinfo = get_fast_modinfo($course);
	$activities = array();

	// Check if user can see hidden activities
	$coursecontext = context_course::instance($COURSE->id);
	$viewhidden = has_capability( 'moodle/course:viewhiddenactivities', $coursecontext );

	foreach ( $modinfo->cms as $cm )
	{	

		if( ! $cm->has_view() )
		{
			continue;
		}

		// Check if activity has graded feature
		//$supportgrades = plugin_supports('mod', $cm->modname, FEATURE_GRADE_HAS_GRADE);

		//print_r( $cm->modname);
		$activities[] = array(
			'type' => $cm->modname,
			'instance' => $cm->instance
		);
	}

	return $activities;

	/*
	'type' => $module,
                    'modulename' => $modulename,
                    'id' => $cm->id,
                    'instance' => $cm->instance,
                    'name' => $cm->name,
                    'expected' => $cm->completionexpected,
                    'section' => $cm->sectionnum,
                    'position' => array_search($cm->id, $sections[$cm->sectionnum]),
                    'url' => method_exists($cm->url, 'out') ? $cm->url->out() : '',
                    'context' => $cm->context,
                    'icon' => $cm->get_icon_url(),
                    'available' => $cm->available,
	*/

}
