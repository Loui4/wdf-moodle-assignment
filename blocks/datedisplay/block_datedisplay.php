<?php

class block_datedisplay extends block_base
{
    function init()
    {
        $this->title = "<h1>" . get_string("pluginname", 'block_datedisplay') . "</h1>";
    }

    function get_content()
    {

        global $USER;
        if ($this->content !== null) {
            return $this->content;
        }


        $hmtlContent = $USER->firstname . ' ' . $USER->lastname . ' ' . $USER->email;

        $this->content = new stdClass;
        $this->content->text =   "<h5>" . $hmtlContent . "</h5>";
        $this->content->footer =  "<h4> footer</h4>";
        return $this->content;
    }
}
