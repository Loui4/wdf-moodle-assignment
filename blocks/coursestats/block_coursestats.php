<?php

class block_coursestats extends block_base
{
    function init()
    {
        global $CFG, $USER, $DB;
        $this->title = get_string('coursestats', 'block_coursestats');
    }

    public function get_content()
    {
        global $CFG, $USER, $DB;
        if ($this->content !== null) {
            return $this->content;
        }
        $this->content = new stdClass;

        $sql = "SELECT * FROM mdl_course";
        $result = $DB->get_records_sql($sql);

        // echo "<pre>";
        // print_r($result);

        $table = "<table class='table'><tbody>";
        $table .= "<tr>
        <th>Sr No</th>
        <th>Course Name</th>
        <th>Course ID</th>
        </tr>";

        $counter = 1;
        foreach ($result as $course) {
            $table .= "<tr>
            <td>" . $counter++ . "</td>
            <td>" . $course->fullname . "</td>
            <td>" . $course->idnumber . "</td>
            </tr>";
        }

        $table .= "</tbody></table>";

        $this->content->text = $table;
        $this->content->footer = 'footer';
        return $this->content;
    }
}
