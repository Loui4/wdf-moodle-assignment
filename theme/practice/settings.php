<?php
defined('MOODLE_INTERNAL') || die();

if($ADMIN->fulltree){

    $settings = new theme_boost_admin_settingspage_tabs('themesettingpractice', get_string('configtitle','theme_practice'));
    $page= new admin_settingpage('theme_practice_general', get_string("generalsettings","theme_practice"));
    $name = 'theme_practice/preset';
    $title= get_string('preset','theme_practice');
    $description = get_string('preset_desc','theme_practice');
    $default = 'default.scss';
    $context = context_system::instance();
    $fs= get_file_storage();
    $files = $fs->get_area_files($context->id,'theme_practice','preset',0,'itemid,filepath,filename',false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    $choices['default.scss']='default.scss';
    $choices['plain.scss']='plain.scss';

    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');

    $page->add($setting);
    $name='theme_practice/presetfiles';
    $title=get_string('presetfiles','theme_practice');
    $description=get_string('presetfiles_desc','theme_practice');


    $setting = new admin_setting_configstoredfile($name, $title, $description,'preset',0,array('maxfiles'=>20,'accepted_types'=> array('.scss')));
    $page->add($setting);

    $name='theme_practice/brandcolor';
    $title= get_string("brandcolor","theme_practice");
    $description= get_string("brandcolor_desc","theme_practice");

    $setting = new admin_setting_configcolourpicker($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    $settings->add($page);



    $page= new admin_settingpage('theme_practice_advanced', get_string('advancedsettings','theme_practice'));
    $setting = new admin_setting_configtextarea('theme_practice','scsspre', get_string('rawscsspre', 'theme_practice'),get_string("rawscsspre_desc",'theme_practice'),"",PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $setting = new admin_setting_configtextarea('theme_practice/scsspre', get_string('rawscss', 'theme_practice'),get_string('rawscss_desc','theme_practice'),"",PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    $settings->add($page);

}
