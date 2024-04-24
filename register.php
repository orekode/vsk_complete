<?php

session_start();

require './conn.php';

$random = bin2hex(random_bytes(32));
$_SESSION['csrf'] = $random;
$feeback = $_SESSION['feedback'] ?? [];

$query = 'select * from Countries';
$query = $conn->prepare($query);
$query->execute();
$countries = $query->get_result();
$countries = $countries->fetch_all(MYSQLI_ASSOC);

$query = 'select * from school_type';
$query = $conn->prepare($query);
$query->execute();
$types = $query->get_result();
$types = $types->fetch_all(MYSQLI_ASSOC);
// var_dump($countries);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once './components/head.php'; ?>
    <link rel="stylesheet" href="./styles/contact.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="vsk_root">
    <?php require_once './components/nav.php'; ?>

    <section class="side_spacing_12" style="margin: 0;">

        <div class="grid_3_102">

            <div class="flex-center_12">
                <img src="./images/reg.jpg" class="obj-cover_12 hw_12">
            </div>

            <div class="right_12" style="max-width: 500px; margin: 0 auto;">

                <form action="./school_registration.php" method="post">

                    <div class="input">
                        <label for="name">Registered School Name </label>
                        <input type="text" name="name">
                        <div class="error_102"><?php echo $feeback['name'] ?? ''; ?></div>
                    </div>

                    <div class="input">
                        <label for="type">School Type</label>
                        <select type="text" name="type">
                            <option selected disabled>click to choose</option>
                            <?php foreach ($types as $type) { ?>
                                <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="error_102"><?php echo $feeback['type'] ?? ''; ?></div>
                    </div>

                    <div class="input">
                        <label for="email">Official Email</label>
                        <input type="email" name="email">
                        <div class="error_102"><?php echo $feeback['name'] ?? ''; ?></div>

                    </div>

                    <div class="input">
                        <label for="phone_number">Contact Phone Number</label>
                        <input type="text" name="phone_number">
                        <div class="error_102"><?php echo $feeback['phone_number'] ?? ''; ?></div>
                    </div>

                    <div class="input">
                        <label for="country">School Address (Country)</label>
                        <select type="text" name="country">
                            <option selected disabled>click to choose</option>
                            <?php foreach ($countries as $country) { ?>
                                <option value="<?php echo $country['id']; ?>"><?php echo $country['Name']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="error_102"><?php echo $feeback['country'] ?? ''; ?></div>
                    </div>

                    <div class="input">
                        <label for="full_address">School Address (Full)</label>
                        <input type="text" name="full_address">
                        <div class="error_102"><?php echo $feeback['full_address'] ?? ''; ?></div>

                    </div>
                    
                    <div class="input">
                        <label for="start_date">Preferred Start Date</label>
                        <input type="date" name="start_date">
                        <div class="error_102"><?php echo $feeback['start_date'] ?? ''; ?></div>
                    </div>

                    <div class="btn_12" style="width: 100%; margin-top: 1rem;">
                        <button style="width: 100%;">Done</button>
                    </div>

                    <input type="hidden" value="<?php echo $random; ?>" name="token">
                </form>

            </div>

            <div class="flex-center_12">
                <img src="./images/reg1.png" class="obj-cover_12 hw_12">
            </div>

        </div>
    </section>
</body>

<script>

    function toggle(target, className='active') {
        let element = document.querySelector(target);
        element.classList.toggle(className);
    }

    <?php if (isset($feeback['general'])) { ?>
        Swal.fire({
            icon: "error",
            title: "<?php echo $feeback['title'] ?? 'An Unexpected Error Occured'; ?>",
            text:  "<?php echo $feeback['general'] ?? ''; ?>",
        });
    <?php } $_SESSION['feedback'] = []; ?>

</script>
</html>