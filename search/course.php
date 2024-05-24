<?php

require_once "../conn.php";

if(!isset($_REQUEST['search'])) json_response([]);

$search = "%{$_REQUEST['search']}%";

$data = get_records("
    select * from ekcd_course where 
        fullname            like ? or 
        shortname           like ? or
        category in (select id from ekcd_course_categories where name like ?)
", [$search, $search, $search]);

json_response($data['data']);