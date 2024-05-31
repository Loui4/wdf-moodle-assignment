<?php
defined('MOODLE_INTERNAL') || die();

function theme_practice_get_main_scss_content($theme)
{
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    if ($filename == 'default.scss') {
                      
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    } else if ($filename == 'plain.scss') {
                      
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/plain.scss');
    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_photo', 'preset', 0, '/', $filename))) {
                   
        $scss .= $presetfile->get_content();
    } else {
                                                                              
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    }
                             
    $pre = file_get_contents($CFG->dirroot . '/theme/practice/scss/pre.scss');                
    $post = file_get_contents($CFG->dirroot . '/theme/practice/scss/post.scss');     

    return $pre . "\n" . $scss . "\n" . $post;
}
