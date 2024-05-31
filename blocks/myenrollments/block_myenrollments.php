<?php


class block_myenrollments extends block_base
{
    function init()
    {
        $this->title = "<h4>" . get_string("pluginname", 'block_myenrollments') . "</h4>";
    }
    function get_content()
    {

        global $USER;
        global $DB;

        if ($this->content !== null) {
            return $this->content;
        }

        // $results = $DB->get_records_sql("select * from mdl_user_enrolments as ue inner join mdl_enrol e on ue.enrolid=e.id where ue.userid=" . $USER->id);
        $results  =enrol_get_my_courses();
        $enroll=enrol_get_users_courses($USER->id);
        // echo "<pre>";
        // print_r($enroll);
        // echo "</pre>";

        // die();

        $display = "<ul>";
        foreach ($results as $result) {
         
            $display .= "<li>" . $result->fullname . "</li>";
        }
        $display .= "<ul>";


        $this->content = new stdClass;
        $this->content->text =   $display;
        // $this->content->footer = "<h4> footer</h4>";
        return $this->content;
    }
}
