<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode( 'mb2page', 'mb2_shortcode_mb2page' );

function mb2_shortcode_mb2page( $atts, $content = null ){

	global $PAGE, $CFG;

	extract( mb2_shortcode_atts( array(
		'pageid' => '',
		'democontent' => 0
	), $atts) );

	if ( theme_mb2nl_check_builder() != 2 )
	{
		return;
	}

	// Get page api file
	require_once( $CFG->dirroot . '/local/mb2builder/classes/pages_api.php' );

	if ( ! Mb2builderPagesApi::is_pageid( $pageid ) )
	{
		return get_string( 'pagenoexists', 'local_mb2builder', array( 'id' => $pageid ) );
	}

	// If user editing page we don't want to show builder code
	if ( $PAGE->user_is_editing() )
	{
		return '[mb2page pageid="' . $pageid . '"]';
	}	

	// Check if page builder supports cache
	// TODO: remove this condition after some time (1023.07.24)
	if ( ! file_exists( $CFG->dirroot . '/local/mb2builder/db/caches.php' ) )
	{
		return '<p style="text-align:center;"><b>Please, update page builder plugin to the latest version.</b></p>';
	}

	$cache = cache::make('local_mb2builder', 'pagedata');

	if ( ! $cache->get($pageid) )
	{
		// Get page record
		$page = Mb2builderPagesApi::get_record( $pageid );
		$cache->set( $page->id, array( 'content' => $page ) );
	}
	
	$pagedata = $cache->get($pageid)['content']->content;	

	// Sometimes we want to show democontent instead of content
	if ( $democontent )
	{
		$pagedata = $cache->get($pageid)['content']->democontent;
	}
	
	return theme_mb2nl_page_builder_content( json_decode( $pagedata ) );

}
