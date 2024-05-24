<?php
session_start();

require './conn.php';
require './mail.php';

// var_dump($_REQUEST);
// exit;

$form_fields = [
    'name',
    'email',
    'type',
    'phone_number',
    'country',
    'full_address',
    'start_date',
    'plan'
];

// every field here is combined with an "or"
$cols_exists = [
    ['name', 'email' /* every field here is combined with an "and" */],
    ['name', 'phone_number'],
];

insert($form_fields, $cols_exists, 'schools');

$_SESSION['registered'] = true;

$plans = [
    'pro' => true,
    'enterprice' => true
];

$plan = $plans[$_REQUEST['plan']] ?? false;


if ($plan) {
    header('Location: ./pay.php?plan=' . $_REQUEST['plan'] . '&email=' . $_REQUEST['email']);
    exit;
}

$mail = new Mail();

$mail->sendEmail(recipient:$_REQUEST['email'], title: 'Welcome Aboard!', content: 'Your registration has been successful. Your school is now part of our community of learners and educators. A representative will contact you through your email or phone number with the status of your registration and your login credentials for access to the Learning Management System (LMS).');

header('Location: ./congratulation.php');
