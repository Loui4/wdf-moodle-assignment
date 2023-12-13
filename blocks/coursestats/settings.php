<?php
$settings->add(new admin_setting_heading(
    'block_coursestats_heading',
    get_string('settings_heading', 'block_coursestats'),
    get_string('settings_content', 'block_coursestats')
));


$settings->add(new admin_setting_configtext(
    'block_coursestats/Label',
    get_string('label', 'block_coursestats'),
    get_string('label_desc', 'block_coursestats'),
    '',
    PARAM_TEXT
));
