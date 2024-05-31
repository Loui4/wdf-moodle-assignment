<?php

class block_recentcourses extends block_base
{
    function init()
    {
        $this->title = "<h1>" . get_string("pluginname", 'block_recentcourses') . "</h1>";
    }

    function get_content()
    {
        // global $DB;
        if ($this->content !== null) {
            return $this->content;
        }

        $courses = get_courses();
        $display = '';

        foreach ($courses as $course) {
            $display .= $course->idnumber ? $course->fullname . "<br />"  : "";
        }

        $this->content = new stdClass;
        $this->content->text =   "<h5>" . $display . "</h5>";
        $this->content->footer =  "<h4> footer</h4>";
        return $this->content;
    }
}
