<?php

session_start();

require './conn.php';

$random = bin2hex(random_bytes(32));
$_SESSION['csrf'] = $random;
$feeback = $_SESSION['feedback'] ?? [];

$query = 'select *, (select name from Countries where id = country) as ctr, (select name from school_type where id = type) as typ from schools';
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
    <link rel="stylesheet" href="./styles/courses.css">
    <link rel="stylesheet" href="./styles/contact.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .school_12 {
            padding: 1rem;
            box-shadow: 0 0 4px lightgray;
            border-radius: 20px;
            margin-bottom: 1rem;
        }

        .card_item {
            border: 1px solid black;
            border-radius: 10px;
            /* max-width: 420px; */
            margin-bottom: 1rem;
            padding: 1rem;
        }

        .badge.pending {
            background: orange;
            padding: 0.25rem 0.5rem;
            border-radius: 10px;
            width: max-content;
            font-size: 80%;
            font-weight: bold;
            color: white;
        }

        .card_item .name {
            font-weight: bold;
            font-size: 120%;
            line-height: 1;
            padding: 0.75rem 0;
        }

        .card_item .detail {
            background: lightgray;
            padding: 0.25rem 0.5rem;
            width: max-content;
            max-width: 420px;
            margin: 0.25rem;
            border-radius: 10px;
            overflow-x: hidden;
            font-size: 90%;
        }

        .card_item .details {
            display: flex;
            flex-wrap: wrap;
        }

        @media only screen and (max-width: 470px) {

            section.side_spacing_12 {
                display: block !important;
                font-size: 90%;
            }
        }
    </style>
</head>

<body class="vsk_root">

    <div class="side_spacing_12" style="padding-top: 1rem;">
        <div onclick="history.back();" style="background: black; padding: 0.25rem 1rem; border-radius: 10px; color: white; width: max-content;">
            Back
        </div>
    </div>

    <div class="title_102 search_parent_102 font-bold_102 flex_12 space_between_12 side_spacing_12" style="padding-top: 2rem;">
        <h1 class="font-bold_102">Schools</h1>

        <div class="search-box_102">
            <div class="category_filter_102">
                <select name="cource_category" id="">
                    <option>Science</option>
                    <option>Business</option>
                    <option>Art</option>
                </select>
            </div>
            <div class="search_102 flex_12">
                <input type="text">
                <button class="icon_btn_102" style="margin: 0 0.5rem;">sch</button>
            </div>
        </div>
    </div>

    <section class="side_spacing_12" style="display: grid; grid-template-columns: repeat(auto-fit, 420px); gap: 1rem; margin: 0; padding-top: 2rem;">
        <?php foreach ($schools as $school) { ?>
            <div class="card_item">
                <div class="top badge pending"><?php echo $school['state']; ?></div>
                <div class="name"><?php echo $school['name']; ?> International School</div>

                <div class="details">
                    <div class="detail">
                        <?php echo $school['email']; ?>
                    </div>

                    <div class="detail">
                        <?php echo $school['phone_number']; ?>
                    </div>

                    <div class="detail">
                        <?php echo $school['ctr']; ?>
                    </div>

                    <div class="detail">
                        <?php echo $school['typ']; ?>
                    </div>

                    <div class="detail">
                        <?php echo $school['full_address']; ?>
                    </div>

                </div>
                <div class="grid-split_12" style="margin-top: 0.75rem">
                    <div class="btn_12" style="width: 100%; scale: 0.85;">
                        <button style="width: 100%;">Suspend</button>
                    </div>
                    <div class="btn_12" style="width: 100%; scale: 0.85;">
                        <button style="width: 100%; background: #33b160;">Approve</button>
                    </div>
                </div>
            </div>
        <?php } ?>

        
    </section>

    <div class="side_spacing_12">
        <div class="flex_12 end">
            <div class="page-box flex_12">
                <div class="page flex-center_12 hw_12">1</div>
                <div class="page flex-center_12 hw_12">3</div>
                <div class="page flex-center_12 hw_12">2</div>
            </div>
        </div>
    </div>

</body>

</html>