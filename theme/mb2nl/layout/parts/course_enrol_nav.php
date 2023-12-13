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

$layout = theme_mb2nl_enrol_layout();
$reviews = theme_mb2nl_is_review_plugin();
$settings = theme_mb2nl_enrolment_options();
$ecinstructor = theme_mb2nl_theme_setting( $PAGE,'ecinstructor' );
$onepagenav = theme_mb2nl_is_eopn();
$mb2section = theme_mb2nl_mb2fields_filed('mb2section');
$tabalt = theme_mb2nl_mb2fields_filed('mb2tabalt') ? theme_mb2nl_mb2fields_filed('mb2tabalt') : theme_mb2nl_theme_setting($PAGE,'tabalt');
$tabcls = $tabalt ? ' tabalt' : '';
$activecls = $onepagenav ? '' : ' active';
$reviewlist = '';
$reviewsummary = '';
$courserating = '';
$navcol = '9 enrol-contentcol';

if ( $layout == 1 || $layout == 2 )
{
    $navcol = 12;
}

if ( $reviews )
{
	if ( ! class_exists( 'Mb2reviewsHelper' ) )
	{
		require_once( $CFG->dirroot . '/local/mb2reviews/classes/helper.php' );
	}

	$reviewlist = Mb2reviewsHelper::review_list();
	$reviewsummary = Mb2reviewsHelper::review_summary();
	$courserating = Mb2reviewsHelper::course_rating($COURSE->id);
}

if ( $onepagenav )
{
	$PAGE->requires->js_call_amd( 'theme_mb2nl/enrol','onePageNav' );
    
}
else 
{
	$PAGE->requires->js_call_amd( 'theme_mb2nl/enrol','contentTabs' );
}

?>
<?php if ( $onepagenav ) : ?>
<div class="enrol-course-nav-replace"></div>
<?php endif; ?>
<div class="enrol-course-nav position-relative<?php echo $tabcls; ?>">
    <div class="container-fluid">
	    <div class="row">
		    <div class="col-lg-<?php echo $navcol; ?>">
			    <ul class="enrol-course-nav-list<?php echo theme_mb2nl_bsfcls(2,'row','','center'); ?>">
				    <li class="enrol-course-navitem<?php echo $activecls; ?>"><button class="themereset" aria-controls="course_nav_desc_content"><?php echo get_string('overview', 'theme_mb2nl'); ?></button></li>
					<?php if ( $mb2section ) : ?>
					    <li class="enrol-course-navitem"><button class="themereset" aria-controls="course_nav_mb2section_content"><?php	echo theme_mb2nl_mb2sectionfiledname(); ?></button></li>
					<?php endif; ?>
					<?php if ( $settings->elrollsections && theme_mb2nl_course_sections_accordion() ) : ?>
					    <li class="enrol-course-navitem"><button class="themereset" aria-controls="course_nav_sections_content"><?php echo get_string( 'headingsections', 'theme_mb2nl' ); ?></button></li>
					<?php endif; ?>
					<?php if ( $ecinstructor ) : ?>
					    <li class="enrol-course-navitem"><button class="themereset" aria-controls="course_nav_instructors_content"><?php echo get_string( 'headinginstructors', 'theme_mb2nl' ); ?></button></li>
					<?php endif; ?>
					<?php if ( $reviewsummary || $reviewlist ) : ?>
					    <li class="enrol-course-navitem"><button class="themereset" aria-controls="course_nav_reviews_content">
						    <?php echo get_string( 'reviews', 'theme_mb2nl' ); ?>
								<?php if ( $courserating ) : ?>
									<?php echo Mb2reviewsHelper::rating_stars($COURSE->id, false, 'xs'); ?><span class="course-rating"><?php echo $courserating; ?></span>
							    <?php endif; ?>
							</button></li>
					<?php endif; ?>
			    </ul>
		    </div>
	    </div>
    </div>
</div>