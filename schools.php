<?php

session_start();

require './conn.php';

$random = bin2hex(random_bytes(32));
$_SESSION['csrf'] = $random;
$feeback = $_SESSION['feedback'] ?? [];

$query = 'select * from schools';
$query = $conn->prepare($query);
$query->execute();
$schools = $query->get_result();
$schools = $schools->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once './components/head.php'; ?>
    <link rel="stylesheet" href="./styles/contact.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .school_12 {
            padding: 1rem;
            box-shadow: 0 0 4px lightgray;
            border-radius: 20px;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body class="vsk_root">
    <section class="side_spacing_12">
        <?php foreach ($schools as $school) { ?>
            <div class="school_12">
                <h2><?php echo $school['name']; ?></h2>
            </div>
        <?php } ?>
    </section>
</body>

</html>