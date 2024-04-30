<?php

session_start();

require './conn.php';

$feedback = $_SESSION['feedback'] ?? [];

if (!isset($_GET['school'])) {
    go_back([
        'icon' => 'error',
        'message' => 'school not selected',
    ], '/vsk_complete/schools.php');
}

$id = $_GET['school'];

$query = 'select *, (select name from Countries where id = country) as ctr, (select name from school_type where id = type) as typ from schools where id = ?';
$data = (object) get_records($query, params: [$id], per_page: 15);
$school = $data->data[0] ?? [];

// var_dump($school, $id, $_GET['school']);

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

        .details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .detail {
            border: 1px solid lightgray;
            border-radius: 10px;
        }

        .detail .name {
            border-bottom: 1px solid lightgray;
            padding: 0.5rem 1rem;
        }
        
        .detail .value {
            padding: 0.5rem 1rem;
            font-weight: bold;
            font-size: 100%;
        }
    </style>
</head>

<body class="vsk_root">

    <div class="side_spacing_12" style="padding-top: 1rem;">
        <div onclick="location.href = './schools.php'" style="background: black; padding: 0.25rem 1rem; border-radius: 10px; color: white; width: max-content;">
            Back
        </div>
    </div>

    <div class="title_102 search_parent_102 font-bold_102 flex_12 space_between_12 side_spacing_12" style="padding-top: 2rem;">
        <div class="flex_12 align-center_12" style="gap: 1rem;">
            <h1 class="font-bold_102"><?php echo $school['name']; ?> </h1>
            <div class="top badge <?php echo $school['state']; ?>"><?php echo $school['state']; ?></div>
        </div>

        <div class="search-box_102">
            <div class="grid-split_12" style="margin-top: 0.75rem">
                <div onclick=" location.href = '<?php echo './school_authorization.php?trigger=suspended&target='.$id; ?>'; " class="btn_12" style="width: 100%; scale: 0.85;">
                    <button style="width: 100%;">Suspend</button>
                </div>
                <div onclick=" location.href = '<?php echo './school_authorization.php?trigger=active&target='.$_GET['school']; ?>'; " class="btn_12" style="width: 100%; scale: 0.85;">
                    <button style="width: 100%; background: #33b160;">Approve</button>
                </div>
            </div>
        </div>
    </div>


    <div class="details side_spacing_12">
        <div class="detail" style="gap: 2rem">
            <div class="name">Email: </div>
            <div class="value">
                <?php echo $school['email']; ?>
            </div>
        </div>

        <div class="detail" style="gap: 2rem">
            <div class="name">Phone Number: </div>
            <div class="value">
                <?php echo $school['phone_number']; ?>
            </div>
        </div>

        <div class="detail" style="gap: 2rem">
            <div class="name">Country</div>
            <div class="value">
                <?php echo $school['ctr']; ?>
            </div>
        </div>

        <div class="detail" style="gap: 2rem">
            <div class="name">School Type</div>
            <div class="value">
                <?php echo $school['typ']; ?>
            </div>
        </div>

        <div class="detail" style="gap: 2rem">
            <div class="name">Full Address</div>
            <div class="value">
                <?php echo $school['full_address']; ?>
            </div>
        </div>

        <div class="detail" style="gap: 2rem">
            <div class="name">Date Registered</div>
            <div class="value">
                <?php 
                    $dateTime = new DateTime($school['created_at']);
                    $formattedDate = $dateTime->format('F j, Y \a\t g:i A'); // Format example: April 24, 2024 at 3:45 PM
                    echo $formattedDate;
                ?>
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