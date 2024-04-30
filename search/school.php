<?php

require_once "../conn.php";

if(!isset($_POST['search'])) json_response([]);

$search = "%{$_POST['search']}%";

$data = get_records("
    select * from schools where 
        name            like ? or 
        email           like ? or 
        full_address    like ? or 
        phone_number    like ? or 
        country in (select name from Countries where name like ?) or
        type    in (select name from school_type where name like ?)
", [$search, $search, $search, $search, $search, $search]);

json_response($data['data']);