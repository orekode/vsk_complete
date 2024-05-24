<?php

require './conn.php';
require './isadmin.php';
session_start();

$random = bin2hex(random_bytes(32));
$_SESSION['csrf'] = $random;
$feedback = $_SESSION['feedback'] ?? [];

$query = 'select *, (select name from Countries where id = country) as ctr, (select name from school_type where id = type) as typ from schools';
$data = (object) get_records($query, per_page: 15);
$schools = $data->data;

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
    <script src="./scripts/search.js" defer></script>

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

        .badge {
            background: orange;
            padding: 0.25rem 0.5rem;
            border-radius: 10px;
            width: max-content;
            font-size: 80%;
            font-weight: bold;
            color: white;
        }

        .badge.active {
            background: green;
        }

        .badge.suspended {
            background: red;
        }

        .card_item .name {
            font-weight: bold;
            font-size: 150%;
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
                    <option value="active">Active</option>
                    <option value="suspended">Suspended</option>
                    <option value="pending">Pending</option>
                </select>
            </div>
            <div class="search_102 flex_12 relative">
                <input oninput="trigger_search(event);" type="text" style="width: calc(340px - 40px);">
                <button class="icon_btn_102 flex-center_12" style="margin: 0 0.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </button>

                <div class="absolute top-full left-0 w-full search-result ">
                    <div class="result"></div>
                    <div class="absolute loading load-me left-0 w-full flex-center_12" style="height: 100%; top: 0;">
                        <div class="hw_12" style="--size: 100%;">
                            <img src="./images/loader.gif" alt="" class="obj-contain_12 h-full w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="side_spacing_12" style="display: grid; grid-template-columns: repeat(auto-fit, 420px); gap: 1rem; margin: 0; padding-top: 2rem;">
        <?php foreach ($schools as $school) { ?>
            <div class="card_item">
                <div class="top badge <?php echo $school['state']; ?>"><?php echo $school['state']; ?></div>
                <div class="name"><?php echo $school['name']; ?></div>
                

                <div class="" style="margin-top: 0.75rem">
                    <div onclick=" location.href = '<?php echo './school.php?school='.$school['id']; ?>'; " class="btn_12" style="width: 100%;">
                        <button style="width: 100%;">View School</button>
                    </div>
                </div>
            </div>
        <?php } ?>


    </section>

    <div class="side_spacing_12">
        <div class="flex_12 end">
            <div class="page-box flex_12">
                <?php echo $data->links; ?>
            </div>
        </div>
    </div>

</body>
<?php require_once './components/footer.php'; ?>
<script>

    function toggle(target, className='active') {
        let element = document.querySelector(target);
        element.classList.toggle(className);
    }


    <?php if (isset($feedback['message'])) { ?>
        Swal.fire({
            icon: "<?php echo $feedback['icon']; ?>",
            title: "<?php echo $feedback['message']; ?>",
        });
    <?php } $_SESSION['feedback'] = []; ?>

</script>
</html>