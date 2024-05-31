<?php


defined('MOODLE_INTERNAL') || die();
$THEME->name ='malawi';
$THEME->sheets ='';
$THEME->editor_sheets = [];
$THEME->parents=['boost'];
$THEME->enable_dock=false;
$THEME->yuicssmodules=array();
$THEME->rendererfactory='theme_overridden_renderer_factory';
$THEME->requiredblocks='';
$THEME->addblockposition='BLOCK_ADDBLOCK_POSITION_FLATNAV';
$THEME->haseditswitch= true;
$THEME->scss = function($theme){
    return theme_malawi_get_main_scss_content($theme);
};


