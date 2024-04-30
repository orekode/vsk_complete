<?php
session_start();

require './conn.php';

$form_fields = [
    'name',
    'email',
    'type',
    'phone_number',
    'country',
    'full_address',
    'start_date',
];

// every field here is combined with an "or"
$cols_exists = [
    ['name', 'email' /* every field here is combined with an "and" */],
    ['name', 'phone_number'],
];

insert($form_fields, $cols_exists, 'schools');

$_SESSION['registered'] = true;

header('Location: ./congratulation.php');
