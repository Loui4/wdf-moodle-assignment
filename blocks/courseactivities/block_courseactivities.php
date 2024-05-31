<?php

use core\progress\display;

class block_courseactivities extends block_base
{
    function init()
    {
        $this->title = "<h2>" . get_string("pluginname", 'block_courseactivities') . "</h2>";
    }

    function get_content()
    {
        global $DB;

        if ($this->content !== null) {
            return $this->content;
        }


        // $courseId = "2";
        // mdl_course_module
        // mdl_module
        // $DB->get_records_sql($sql, $params_array, $limitfrom, $limitnum);

        $courses = get_courses();

        $display = '';

        foreach ($courses as $course) {
            // $results = $DB->get_records_sql("select mdl_modules.name as name from mdl_course_modules inner join mdl_modules on mdl_modules.id=mdl_course_modules.module  where course=" . $course->id);
            $results = get_course_mods($course->id);
            $display .= "<h5>" . $course->fullname . "</h5> <ul>";


            if (empty($results)) {
                $display .= "<li><strong>no activities</strong></li>";
            } else {


                // echo "<pre>";
                // print_r($results);
                // echo "</pre>";
                // die();

                foreach ($results as $result) {
                    // echo "<pre>";
                    // print_r($result);
                    // echo "</pre>";
                    // die();
                    $display .= "<li>" . $result->modname . "</li>";
                }
            }

            $display .= "</ul>";
        }


        // $course = get_course($courseId);
        $this->content = new stdClass;
        $this->content->text =   $display;
        $this->content->footer = "<h4> footer</h4>";
        return $this->content;
    }
}
