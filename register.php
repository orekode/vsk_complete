<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once './components/head.php'; ?>
    <link rel="stylesheet" href="./styles/contact.css">
    
</head>
<body class="vsk_root">
    <?php require_once './components/nav.php'; ?>

    <section class="side_spacing_12" style="margin: 0;">

        <div class="">


            <div class="right_12" style="max-width: 500px; margin: 0 auto;">

                <form action="">
                    <h2 class="title_12 close_1">Send us a message</h2>

                    <div class="grid-split_12" style="gap: 1rem;">
                        <div class="input">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name">
                        </div>

                        <div class="input">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name">
                        </div>
                    </div>

                    <div class="input">
                        <label for="last_name">Email</label>
                        <input type="text" name="email">
                    </div>

                    <div class="input">
                        <label for="last_name">Phone Number</label>
                        <input type="text" name="phone_number">
                    </div>

                    <div class="input">
                        <label for="last_name">Message</label>
                        <textarea type="text" name="last_name"></textarea>
                    </div>

                    <div class="btn_12" style="width: 100%;">
                        <button style="width: 100%;">Send Message</button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</body>

<script>

    function toggle(target, className='active') {
        let element = document.querySelector(target);
        element.classList.toggle(className);
    }

</script>
</html>