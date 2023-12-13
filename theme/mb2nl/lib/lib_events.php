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
 * Method to set events layout template
 *
 */
function theme_mb2nl_events_template($events, $opts)
{
	$output = '';
	$cls = '';
	$carouselcls = '';

	$cls .= $opts['layout'] == 2 ? ' theme-box' : '';
	$cls .= $opts['layout'] == 3 ? ' swiper-slide' : '';

	$lazycls = $opts['lazy'] ? ' class="lazy"' : '';
	$lazysrc = $opts['lazy'] ? 'src="' . theme_mb2nl_lazy_plc() . '" data-src' : 'src';

	if ( empty( $events) )
	{
		return '<div class="theme-box">' . get_string( 'nothingtodisplay' ) . '</div>';
	}

	foreach ( $events as $event )
	{
		if ( ! theme_mb2nl_event_cansee( $event ) )
		{
			continue;
		}

		$eventimage = theme_mb2nl_get_event_image( $event );

		$output .= '<div class="event-item event-' . $event->id . $cls . '" data-id="' . $event->id . '">';
		$output .= '<a href="#mb2-pb-events-modal" class="event-show event-item-inner">';
		
		if ( $eventimage && $opts['layout'] != 1 )
		{
			$output .= '<div class="event-image" aria-hidden="true">';
			$output .= '<img' . $lazycls . ' ' . $lazysrc . '="' . $eventimage . '" alt="' . $event->name . '">';
			$output .= '</div>'; // event-image
		}
		
		$output .= '<div class="event-date" aria-hidden="true">' . theme_mb2nl_events_date($event->timestart) . '</div>';		
		$output .= '<div class="event-content">';
		//$output .= '<span class="sr-only">' . theme_mb2nl_events_duration($event->timestart, $event->timeduration) . '</span>';
		$output .= '<div class="event-duration" aria-hidden="true">';			
		$output .= theme_mb2nl_events_duration($event->timestart, $event->timeduration, false, true);
		$output .= '</div>'; // event-duration
		$output .= '<h4 class="event-name">';
		$output .= $event->name;
		$output .= '</h4>';		
		$output .= '</div>'; // event-content
		$output .= '</a>'; // event-item-inner
		$output .= '</div>'; // item-inner
	}

	return $output;

}




/*
 *
 * Method to get date format
 *
 */
function theme_mb2nl_events_date($time)
{
	$date = userdate( $time, get_string('eventdateshort', 'theme_mb2nl') );
	$date = str_replace('.','',$date);
	
	return $date;
	
}





/*
 *
 * Method to get get event duration
 *
 */
function theme_mb2nl_events_duration($time, $duration, $modal = false, $icon = false)
{
	$to = '';
	$formatfrom = $modal ? get_string('eventhourdate', 'theme_mb2nl') : get_string('eventdaydate', 'theme_mb2nl');	
	$tostrdays = $modal ? get_string('modal_eventdaydate', 'theme_mb2nl') : get_string('eventdaydate', 'theme_mb2nl');
	$tostrhours = get_string('eventhourdate', 'theme_mb2nl');
	$days = theme_mb2nl_events_nextdays($time, $duration);
	$isicon = $icon ? '<i class="ri-signal-tower-line"></i>' : '';

	if ( $days )
	{
		$to = ' - ' . userdate($time + $duration, $tostrdays );
	}
	elseif ( $duration > 0 && ! $days )
	{
		$to = ' - ' . userdate($time + $duration, $tostrhours );
	}

	return $isicon . userdate( $time, $formatfrom ) . $to;

}




/*
 *
 * Method to get check if event duration is more tha one day
 *
 */
function theme_mb2nl_events_nextdays($time, $duration)
{

	$daystart = userdate($time, '%d');
	$dayend = userdate($time+$duration, '%d');

	if ( $daystart < $dayend )
	{
		return true;
	}

	return false;

}



/*
 *
 * Method to get event list
 *
 */
function theme_mb2nl_get_events( $opt = array() )
{

	global $DB;

	$params = array();
	$sqlwhere = ' WHERE 1=1';
	$sqlorder = '';
	$sql = '';
	$sort = 'e.timestart ASC';
	$sqlorder .= ' ORDER BY ' . $sort;

	$sql .= 'SELECT DISTINCT e.* FROM {event} e';

	// Get only visible events
	$sqlwhere .= ' AND e.visible=1';
	
	// Get only upcoming events
	if ( $opt['upcoming'] )
	{		
		$sqlwhere .= ' AND (e.timestart>?)';
		$params[] = theme_mb2nl_get_user_date();
	}

	// Get only site type events
	if ( $opt['type'] == 1 )
	{		
		$sqlwhere .= ' AND ' . $DB->sql_like('e.eventtype', '?');
		$params[] = 'site';
	}
	else
	{
		// Get all accepted event types
		list( $eventypes, $priceparams ) = $DB->get_in_or_equal( theme_mb2nl_event_types() );
		$params = array_merge( $params, $priceparams );
		$sqlwhere .= ' AND e.eventtype ' . $eventypes;
	}

	return $DB->get_records_sql( $sql . $sqlwhere . $sqlorder, $params, 0 , $opt['limit'] );

}





/*
 *
 * Method to get event list
 *
 */
function theme_mb2nl_get_event( $eventid )
{

	global $DB;

	return $DB->get_record( 'event', array( 'id' => $eventid ), '*', MUST_EXIST );

}






/*
 *
 * Method to get evant hrml template
 *
 */
function theme_mb2nl_event_details( $eventid )
{

	$output = '';

	$event = theme_mb2nl_get_event($eventid);	
	$image = theme_mb2nl_get_event_image($event);
	$desc = theme_mb2nl_event_desc($event);
	$imgstyle = $image ? ' style="background-image:url(\'' . $image . '\');"' : '';
	$imgcls = $image ? ' isimage' : ' noimage';

	$output .= '<div class="event-modal-item event-item-' . $event->id . ' eventtype-' . $event->eventtype . '">';	
	$output .= '<div class="event-image' . $imgcls . '"' . $imgstyle . '>';
	$output .= ! $image ? '<i class="ri-image-fill"></i>' : '';
	$output .= '</div>'; // event-image
	
	$output .= '<div class="event-content">';
	$output .= '<h4 class="event-title">' . $event->name . '</h4>';
	$output .= '<div class="event-desc">';
	$output .= $desc;
	$output .= '</div>'; // event-desc

	$output .= '<div class="event-details">';
	$output .= '<div class="event-detail detail-date"><i class="ri-calendar-check-fill"></i><div>' . 
	userdate($event->timestart, get_string('modal_eventdate', 'theme_mb2nl')) . '</div></div>';
	$output .= '<div class="event-detail detail-time"><i class="ri-time-fill"></i><div>' . 
	theme_mb2nl_events_duration($event->timestart, $event->timeduration, true) . '</div></div>';
	$output .= $event->location ? 
	'<div class="event-detail detail-location"><i class="ri-map-pin-2-fill"></i><div>' . $event->location . '</div></div>' : '';
	$output .= '</div>'; // event-details

	$output .= '</div>'; // event-content
	$output .= '</div>'; // event-modal-item

	return $output;

}




/*
 *
 * Method to check if user can see event details
 *
 */
function theme_mb2nl_event_cansee( $event )
{
	global $USER;

	// Admin/manager users
	$hassystemcap = has_capability('moodle/calendar:manageentries', context_system::instance());

	// Course events
	$courseobjs = enrol_get_my_courses();
	$mycourses = array_keys($courseobjs);

	// Group events
	$mygroups = groups_get_my_groups();
	$mygroups = array_keys($mygroups);

	// Category events
	$categories = theme_mb2nl_user_categories();

	if ( $hassystemcap || $event->eventtype === 'site' ) // Site event type or user can manage events
	{
		return true;
	}
	elseif ( $event->eventtype === 'user' && $USER->id == $event->userid ) // User type event
	{
		return true;
	}
	elseif ( $event->eventtype === 'course' && in_array( $event->courseid, $mycourses ) ) // Course type event
	{
		return true;
	}
	elseif ( $event->eventtype === 'group' && in_array( $event->groupid, $mygroups ) ) // Group event type
	{
		return true;
	}
	elseif ( $event->eventtype === 'category' && in_array( $event->categoryid, $categories ) ) // Category even type
	{
		return true;
	}
	
	return false;	

}




/*
 *
 * Method to get user categries
 *
 */
function theme_mb2nl_event_types()
{

	return array(
		'site',
		'user',
		'course',
		'group',
		'category'
	);

}





/*
 *
 * Method to get user categries
 *
 */
function theme_mb2nl_user_categories()
{
	$categories = array();
	$parents = array();
	$courseobjs = enrol_get_my_courses();

	if ( ! count( $courseobjs ) )
	{
		return $categories;
	}

	foreach( $courseobjs as $course )
	{
		$categories[] = $course->category;
	}

	foreach( $categories as $cat )
	{
		$categoryobj = theme_mb2nl_get_category_record($cat, 'path');
		$parentscats = theme_mb2nl_path_categories($categoryobj->path);

		if ( ! count( $parentscats ) )
		{
			continue;
		}

		foreach( $parentscats as $parent )
		{
			$parents[] = $parent;
		}
	}

	// Merge arrays
	$categories = array_merge( $categories, $parents );

	// Make categories array uniq
	// We don't want duplicate category ID's
	$categories = array_unique($categories);

	return $categories;

}





/*
 *
 * Method to get user parent categries
 *
 */
function theme_mb2nl_path_categories($path)
{

	$path = explode('/', $path);

	array_shift( $path );	// Remove first array item, it's empty .../1/2/3
	array_pop( $path ); 	// Remove last array item, it's requested category

	return $path;

}





/*
 *
 * Method to get image event description
 *
 */
function theme_mb2nl_get_event_image($event)
{
	global $CFG, $PAGE, $OUTPUT, $USER;

	$eventplch = theme_mb2nl_theme_setting( $PAGE, 'eventsplaceholder', '', true );
	//$url = $eventplch ? $eventplch : $OUTPUT->image_url('events-default','theme');
	$url = $eventplch ? $eventplch : '';

	if ( ! theme_mb2nl_is_user($event->userid) )
	{
		return $url;
	}

	$context = context_user::instance( $event->userid );

	if ( $event->categoryid )
	{
		$context = context_coursecat::instance( $event->categoryid );
	}
	elseif ( $event->courseid )
	{
		$context = context_course::instance( $event->courseid );
	}
	
	require_once($CFG->libdir . '/filelib.php');
	$fs = get_file_storage();
	$files = $fs->get_area_files( $context->id, 'calendar', 'event_description', $event->id );

	foreach ( $files as $f )
	{
		if ( $f->is_valid_image() )
		{
			return moodle_url::make_pluginfile_url(
				$f->get_contextid(), $f->get_component(), $f->get_filearea(), $f->get_itemid(), $f->get_filepath(), $f->get_filename(), false);
		}
	}

	return $url;

}




function theme_mb2nl_is_user($userid)
{

	global $DB;

	$params = array('id'=>$userid, 'deleted'=>0);
	$sqlwhere = ' WHERE 1=1';

	$sql = 'SELECT id FROM {user} WHERE id=:id AND deleted=:deleted';

	if ( $DB->record_exists_sql($sql, $params) )
	{
		return true;
	}

	return false;

}



/**
 *
 * Method to update get course description
 *
 */
function theme_mb2nl_event_desc( $event )
{
	global $CFG;

	if ( ! theme_mb2nl_is_user($event->userid) )
	{
		return;
	}
	
	require_once( $CFG->libdir . '/filelib.php' );	
	$context = context_user::instance( $event->userid );

	if ( $event->categoryid )
	{
		$context = context_coursecat::instance( $event->categoryid );
	}
	elseif ( $event->courseid )
	{
		$context = context_course::instance( $event->courseid );
	}
	
	$desc = file_rewrite_pluginfile_urls( $event->description, 'pluginfile.php', $context->id, 'calendar', 'event_description', $event->id );
	$desc = format_text( $desc, FORMAT_HTML );

	// Remove first image and empty paragraphs
	$desc = theme_mb2nl_desc_no1img($desc);

	return $desc;

}
