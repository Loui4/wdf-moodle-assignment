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


$temp = new admin_settingpage('theme_mb2nlchild_settingsnav',  get_string('settingsnav', 'theme_mb2nl'));


$setting = new admin_setting_configmb2start('theme_mb2nlchild/startnavgeneral', get_string('mainmenu','theme_mb2nl'));
$temp->add($setting);

	$name = 'theme_mb2nlchild/headernav';
	$title = get_string('headernav','theme_mb2nl');
	$setting = new admin_setting_configcheckbox($name, $title, '', 1);
	$temp->add($setting);

	$name = 'theme_mb2nlchild/navalign';
	$title = get_string('navalign','theme_mb2nl');
	$setting = new admin_setting_configselect($name, $title, '', 'right', array(
		'left'=>get_string('left', 'theme_mb2nl'),
		'center'=>get_string('center', 'theme_mb2nl'),
		'justify'=>get_string('justify', 'theme_mb2nl'),		
		'right'=>get_string('right', 'theme_mb2nl')
	));
	$temp->add($setting);

	$name = 'theme_mb2nlchild/stickynav';
	$title = get_string('stickynav','theme_mb2nl');
	$setting = new admin_setting_configcheckbox($name, $title, '', 1);
	$temp->add($setting);	

	$name = 'theme_mb2nlchild/navddwidth';
	$title = get_string('navddwidth','theme_mb2nl');
	$desc = '';
	$setting = new admin_setting_configtext($name, $title, $desc, '200');
	$setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($setting);	

	$temp->add(new admin_setting_configmb2spacer('theme_mb2nlchild/navspacer_7ea'));


	/* =========================== */

	global $DB;

	$dbman = $DB->get_manager();
	$table_menus = new xmldb_table( 'local_mb2megamenu_menus' );
	$menus = array( 0 => get_string('none', 'theme_mb2nl') );

	if ( $dbman->table_exists( $table_menus ) )
	{
		$sqlquery = 'SELECT id, name FROM {local_mb2megamenu_menus} WHERE enable=1';
		$records = $DB->get_records_sql( $sqlquery, array() );

		if ( count( $records ) )
		{
			foreach ( $records as $f )
			{
				$menus[$f->id] = $f->name;
			}
		}
	}

	/* =========================== */


	$name = 'theme_mb2nlchild/navforusers';
	$title = get_string('navforusers','theme_mb2nl');
	$setting = new admin_setting_configselect( $name, $title, '', 0, $menus );
	$temp->add( $setting );

	$name = 'theme_mb2nlchild/mycinmenu2';
	$title = get_string('mycinmenu','theme_mb2nl');
	$setting = new admin_setting_configcheckbox($name,$title,'',0);
	$temp->add($setting);

	$name = 'theme_mb2nlchild/mychidden';
	$title = get_string('mychidden','theme_mb2nl');
	$setting = new admin_setting_configcheckbox($name,$title,'',0);
	$temp->add($setting);

	$name = 'theme_mb2nlchild/mycexpierd';
	$title = get_string('expiredcourses','theme_mb2nl');
	$setting = new admin_setting_configcheckbox($name,$title,'',0);
	$temp->add($setting);

	$name = 'theme_mb2nlchild/myclimit';
	$title = get_string('myclimit','theme_mb2nl');
	$setting = new admin_setting_configtext($name,$title,'',6);
	$temp->add($setting);
	
	$temp->add(new admin_setting_configmb2spacer('theme_mb2nlchild/navspacer1'));

	$name = 'theme_mb2nlchild/navbarbgcolor';
	$title = get_string('navbarbgcolor','theme_mb2nl');
	$setting = new admin_setting_configmb2color($name, $title, '', '');
	$temp->add($setting);

	$name = 'theme_mb2nlchild/navcolor';
	$title = get_string('navcolor','theme_mb2nl');
	$setting = new admin_setting_configmb2color($name, $title, '', '');
	$temp->add($setting);

	$name = 'theme_mb2nlchild/navsubcolor';
	$title = get_string('navsubcolor','theme_mb2nl');
	$setting = new admin_setting_configmb2color($name, $title, '', '');
	$temp->add($setting);	

	$temp->add(new admin_setting_configmb2spacer('theme_mb2nlchild/navspacer2'));

	$name = 'theme_mb2nlchild/navhcolor';
	$title = get_string('navhcolor','theme_mb2nl');
	$setting = new admin_setting_configmb2color($name, $title, '', '');
	$temp->add($setting);	

	$name = 'theme_mb2nlchild/navsubhcolor';
	$title = get_string('navsubhcolor','theme_mb2nl');
	$setting = new admin_setting_configmb2color($name, $title, '', '');
	$temp->add($setting);	

	$name = 'theme_mb2nlchild/navhbgcolor';
	$title = get_string('navhbgcolor','theme_mb2nl');
	$setting = new admin_setting_configmb2color($name, $title, '', '');
	$temp->add($setting);

$setting = new admin_setting_configmb2end('theme_mb2nlchild/endnavgeneral');
$temp->add($setting);


$setting = new admin_setting_configmb2start('theme_mb2nlchild/starttopmenu', get_string('topmenu','theme_mb2nl'));
$temp->add($setting);


	$name = 'theme_mb2nlchild/topmenu';
	$title = get_string('topmenu','theme_mb2nl');
	$setting = new admin_setting_configtextarea($name, $title, get_string('topmenudesc','theme_mb2nl'), '');
	$temp->add($setting);


$setting = new admin_setting_configmb2end('theme_mb2nlchild/endtopmenu');
$temp->add($setting);



$setting = new admin_setting_configmb2start('theme_mb2nlchild/startnavicon', get_string('navicon','theme_mb2nl'));
$temp->add($setting);

	$name = 'theme_mb2nlchild/navicons';
	$title = get_string('links','theme_mb2nl');
	$setting = new admin_setting_configtextarea($name, $title, get_string('naviconsdesc','theme_mb2nl'), '');
	$temp->add($setting);

$setting = new admin_setting_configmb2end('theme_mb2nlchild/endnavicon');
$temp->add($setting);


$ADMIN->add('theme_mb2nlchild', $temp);
