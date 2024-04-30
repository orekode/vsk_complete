<?php

session_start();
require_once './loading.php';
require_once './conn.php';

try {
    if (!isset($_GET['target']) or !isset($_GET['trigger'])) {
        go_back();
    }

    $target = $_GET['target'];
    $trigger = $_GET['trigger'];

    $query = 'update schools set state = ? where id = ?';
    $query = $conn->prepare($query);
    $query->bind_param('ss', $trigger, $target);
    $query->execute();

    if ($trigger == 'suspended') {
        go_back([
            'icon' => 'error',
            'message' => 'School Suspended Successfully',
        ]);
    } else {
        go_back([
            'icon' => 'success',
            'message' => 'School Activated Successfully',
        ]);
    }
} catch (Exception $e) {
}
