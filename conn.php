<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'vskool';

// $servername = 'localhost';
// $username = 'u837965232_melEG';
// $password = 'dLH2Nndh8z';
// $database = 'u837965232_N1vss';

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    exit('Connection failed: '.$conn->connect_error);
}

function go_back($values = [], $previous_page = '')
{
    if (empty($previous_page)) {
        $previous_page = $_SERVER['HTTP_REFERER'];
    }

    // $question_mark_position = strpos($previous_page, '?');

    // Extract the substring from start to position before ?
    // $previous_page = $question_mark_position !== false ? substr($previous_page, 0, $question_mark_position) : $previous_page;

    $_SESSION['feedback'] = $values;
    header("Location: $previous_page");
    exit;
}

function gen_query($fields)
{
    $query = '';

    foreach ($fields as $field) {
        $query .= " $field = ?,";
    }

    return rtrim($query, ',');
}

function get_values($fields)
{
    $values = [];

    foreach ($fields as $field) {
        array_push($values, $_POST[$field]);
    }

    return $values;
}

function get_where($fields, $table)
{
    global $conn;

    $query = '';
    $values = [];

    foreach ($fields as $field) {
        // array_push($values, $_POST[$field]);
        $query .= ' (';
        foreach ($field as $col) {
            $query .= " {$col[0]} = ? and";
            array_push($values, $col[1]);
        }
        $query = rtrim($query, 'and');
        $query .= ') or';
    }

    $query = rtrim($query, 'or');

    $query = "select * from $table where ".$query;
    $query = $conn->prepare($query);
    $types = str_repeat('s', count($values));
    $query->bind_param($types, ...$values);
    $query->execute();

    $query = $query->get_result();
    $query = $query->fetch_all(MYSQLI_ASSOC);

    return $query;
}

function check_empties($fields)
{
    $fields = [
        'name',
        'email',
        'type',
        'phone_number',
        'country',
        'full_address',
        'start_date',
    ];

    $empties = [];

    foreach ($fields as $key) {
        if (!isset($_POST[$key]) or empty(str_replace(' ', '', $_POST[$key]))) {
            $empties[$key] = 'This field is required, provide an input and try again';
        }
    }

    return $empties;
}

function check_exists($cols, $table)
{
    $check_array = [];

    foreach ($cols as $fields) {
        $sub_check_array = [];

        foreach ($fields as $field) {
            array_push($sub_check_array, [$field, $_POST[$field]]);
        }

        array_push($check_array, $sub_check_array);
    }

    $checks = get_where($check_array, $table);

    return count($checks) > 0;
}

function insert($form_fields, $cols_exists, $table)
{
    try {
        global $conn;

        if (!isset($_POST['token']) or $_POST['token'] != $_SESSION['csrf']) {
            go_back();
        }

        // check if any field is empty
        $empties = check_empties($form_fields);

        if (count($empties) > 0) {
            go_back($empties);
        }

        // check if field alread exists
        if (check_exists($cols_exists, $table)) {
            go_back([
                'title' => 'School Already Exists',
                'general' => 'Your school is already registered. A vskuul representative will contact you using the provided email or phone number to update you on your registration status.',
            ]);
        }

        $query = "insert into $table set ".gen_query($form_fields);

        $query = $conn->prepare($query);
        $types = str_repeat('s', count($form_fields));
        $query->bind_param($types, ...get_values($form_fields));

        $query->execute();
    } catch (Exception $e) {
        go_back([
            'title' => 'An Unexpected Error Occured',
            'general' => 'there was an error proccessing your request, please check your inputs and try again (later)',
        ]);
    }
}

// Encryption function
function encryptID($string, $key)
{
    $encrypt_method = 'AES-256-CBC';
    $iv_length = openssl_cipher_iv_length($encrypt_method);
    $iv = openssl_random_pseudo_bytes($iv_length);
    $encrypted = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);

    return base64_encode($iv.$encrypted);
}

// Decryption function
function decryptID($encrypted, $key)
{
    $encrypt_method = 'AES-256-CBC';
    $iv_length = openssl_cipher_iv_length($encrypt_method);
    $encrypted_string = base64_decode($encrypted);
    $iv = substr($encrypted_string, 0, $iv_length);
    $encrypted = substr($encrypted_string, $iv_length);

    return openssl_decrypt($encrypted, $encrypt_method, $key, 0, $iv);
}

function get_records($sql, $params = [], $per_page = 10)
{
    global $conn;
    $records_per_page = $per_page;
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page, default is 1

    // Calculate the starting record for the current page
    $start_from = ($current_page - 1) * $records_per_page;

    // Modify your query to include LIMIT for pagination
    $query = "$sql LIMIT ?, ?";
    $query = $conn->prepare($query);
    $types = ''.str_repeat('s', count($params)).'ii';
    $param = [...$params, $start_from, $records_per_page];
    $query->bind_param($types, ...$param);
    $query->execute();
    $data = $query->get_result();
    $data = $data->fetch_all(MYSQLI_ASSOC);

    // Get total number of rows for pagination
    $total_records_query = $conn->prepare($sql);

    if (count($params) > 0) {
        $types = str_repeat('s', count($params));
        $total_records_query->bind_param($types, ...$params);
    }

    $total_records_query->execute();
    $total_records_result = $total_records_query->get_result();
    $total_records = $total_records_result->num_rows;

    // Calculate total pages based on total records and records per page
    $total_pages = ceil($total_records / $records_per_page);

    // Pagination links
    $pagination_links = '';

    for ($i = 1; $i <= $total_pages; ++$i) {
        $active_class = ($i == $current_page) ? 'active' : '';
        $pagination_links .= "<div class='$active_class page flex-center_12 hw_12' onclick='location.href=\"?page=$i\";'>$i</div>";
    }

    return [
        'data' => $data,
        'links' => $pagination_links,
    ];
}

function json_response($data)
{
    header('content-type: application/json');
    echo json_encode($data);
    exit;
}
