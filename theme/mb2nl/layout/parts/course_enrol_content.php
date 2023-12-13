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
$mb2promo = theme_mb2nl_mb2fields_filed('mb2promo');
$skills = $settings->skills ? $settings->skills : theme_mb2nl_mb2fields_filed('mb2skills');
$ecinstructor = theme_mb2nl_theme_setting( $PAGE,'ecinstructor' );
$requirements = theme_mb2nl_mb2fields_filed('mb2requirements');
$mb2section = theme_mb2nl_mb2fields_filed('mb2section');
$actres = theme_mb2nl_get_course_activities($COURSE, true);
$svg = theme_mb2nl_svg();
$showvideo = $layout == 1 || $layout == 2;

$reviewlist = '';
$reviewsummary = '';
$courserating = '';

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

?>
<div id="course_nav_desc_content" class="enrol-course-navcontent active">
	<?php if ( $mb2promo ) : ?>
		<div class="details-section promo">
			<div class="details-content">
				<div class="content-inner"><?php echo $mb2promo; ?></div>
			</div>
		</div>
	<?php endif; ?>
	<?php if ( $showvideo ) : ?>
		<?php echo theme_mb2nl_course_video(); ?>
	<?php endif; ?>
	<div class="details-section aboutcourse">
		<h2 class="details-heading hsize-2"><?php echo get_string( 'headingaboutcourse', 'theme_mb2nl' ); ?></h2>
		<div class="details-content">
			<div class="content-inner"><div><?php echo theme_mb2nl_get_mb2course_description(); ?></div></div>
			<?php echo theme_mb2nl_moreless(); ?>
		</div>
	</div>
	<?php if ( $skills ) : ?>
		<div class="details-section skills">
		<h2 class="details-heading hsize-2"><?php echo get_string( 'headingwhatlearn', 'theme_mb2nl' ); ?></h2>
		<div class="details-content">
			<div class="content-inner"><?php echo theme_mb2nl_sr_list($skills); ?></div>
		</div>
		</div>
	<?php endif; ?>
	<?php if ( $requirements ) : ?>
		<div class="details-section requirements">
			<h2 class="details-heading hsize-2"><?php echo get_string( 'headingrequirements', 'theme_mb2nl' ); ?></h2>
			<div class="details-content">
				<div class="content-inner"><?php echo theme_mb2nl_sr_list( $requirements, false, 999, 2 ); ?></div>
			</div>
		</div>
	<?php endif; ?>
</div>
<?php if ( $mb2section ) : ?>
	<div id="course_nav_mb2section_content" class="enrol-course-navcontent">
		<div id="course-mb2section" class="details-section mb2section">
		<h2 class="details-heading hsize-2"><?php echo theme_mb2nl_mb2sectionfiledname(); ?></h2>
		<div class="details-content">
			<div class="content-inner"><?php echo $mb2section; ?></div>
		</div>
		</div>
	</div>
<?php endif; ?>
<div id="course_nav_sections_content" class="enrol-course-navcontent">
	<?php if ( $settings->elrollsections && theme_mb2nl_course_sections_accordion() ) : ?>
		<div class="details-section sections">
			<h2 class="details-heading hsize-2"><?php echo get_string( 'headingsections', 'theme_mb2nl' ); ?></h2>
			<div class="details-content">								
				<div class="content-inner">
					<div class="block_coursetoc">
						<div class="<?php echo theme_mb2nl_bsfcls(1,'','between','center','sm') . theme_mb2nl_tcls('small','',0,''); ?>">
							<div class="course-content-details mb-2<?php echo theme_mb2nl_bsfcls(1,'','','end'); ?>">						
								<div class="details-item">
									<span class="item-label"><?php echo get_string('sections'); ?>:</span>
									<span class="item-value"><?php echo theme_mb2nl_course_sections_accordion(1); ?></span>
								</div>
								<span class="sep">&#8226;</span>
								<div class="details-item">
									<span class="item-label"><?php echo get_string('activities'); ?>:</span>
									<span class="item-value"><?php echo $actres->activities; ?></span>
								</div>
								<span class="sep">&#8226;</span>
								<div class="details-item">
									<span class="item-label"><?php echo get_string('resources'); ?>:</span>
									<span class="item-value"><?php echo $actres->resources; ?></span>
								</div>
							</div>
							<div class="mb-2<?php echo theme_mb2nl_tcls('','bold',0,''); ?>">
								<button type="button" class="themereset coursetoc-toggleall collapsed enrol-toggleall p-0" data-collapseall="<?php echo get_string('collapseall'); ?>" data-expandall="<?php echo get_string('expandall'); ?>">
									<?php echo get_string('expandall'); ?>
								</button>
							</div>
						</div>
						<?php echo theme_mb2nl_course_sections_accordion(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
<?php if ( $ecinstructor ) : ?>
	<div id="course_nav_instructors_content" class="enrol-course-navcontent">
		<div id="course-instructors" class="details-section instructors">
			<h2 class="details-heading hsize-2"><?php echo get_string( 'headinginstructors', 'theme_mb2nl' ); ?></h2>
			<div class="details-content">
				<div class="content-inner"><?php echo theme_mb2nl_course_teachers_list( $reviews ); ?></div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php if ( $reviewsummary || $reviewlist ) : ?>
	<div id="course_nav_reviews_content" class="enrol-course-navcontent">
		<?php if ( $reviewsummary ) : ?>
			<div id="course-ratings" class="details-section reviews-summary">
				<h2 class="details-heading hsize-2"><?php echo get_string( 'courserating', 'local_mb2reviews' ); ?></h2>
				<?php echo $reviewsummary; ?>
			</div>
		<?php endif; ?>
		<?php if ( $reviewlist ) : ?>
			<div class="details-section reviews">
				<h2 class="details-heading hsize-2"><?php echo get_string( 'reviews', 'local_mb2reviews' ); ?></h2>
				<?php echo $reviewlist; ?>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>