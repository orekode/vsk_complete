<?php

session_start();

if (!isset($_SESSION['registered']) or !$_SESSION['registered']) {
    header('Location: ./index.php');
} else {
    $_SESSION['registered'] = false;
}

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
        h1 {
            font-size: 400%;
            line-height: 1;
        }

        p {
            margin: 1rem 0;
            line-height: 1.8;
        }

        @media only screen and (max-width: 880px) {
            .grid-split_12, .grid-split_12 * {
                grid-template-columns: 1fr !important;
                text-align: center;
            }

            .img {
                height: 40vh;
            }

            .img img {
                object-fit: contain !important;
            }

            h1 {
                font-size: 200%;
            }

            p {
                margin: 1rem 0;
                line-height: 1.8;
            }

            .flex-col-center_12 {
                align-items: center;
            }


        }
    </style>
</head>

<body class="vsk_root">
    <?php require_once './components/nav.php'; ?>

    <section class="side_spacing_12 grid-split_12" style="margin: 0;">

        <div class="img">
            <img src="./images/done.jpg" class="obj-cover_12 hw_12">
        </div>
        <div class="flex-col-center_12">
            <h1>Welcome Aboard!</h1>
            <p>
                Your registration has been successful. Your school is now part of our community of learners and educators. A representative will contact you through either your email or phone number with the status of your registration and your login credentials for access to the Learning Management System (LMS).
            </p>
            <div onclick="location.href = './about.php'" class="btn_12 close_12">
                <button>Learn More</button>
            </div>
        </div>
    </section>
</body>
<?php require_once './components/footer.php'; ?>
</html>