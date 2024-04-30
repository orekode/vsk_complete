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

        <div class="grid-split_12 split">

            <div class="left_12">
                <div class="">
                    <h1 class="title_12 contact_12">Contact Us</h1>
                    <p>Any questions? <br> we would be happy to help you!</p>
                </div>

                <div style="margin: 2rem 0">

                    <div class="button_12 number_12 flex_12 align-center_12">
                        <div class="icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-x" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                <path fill-rule="evenodd" d="M11.146 1.646a.5.5 0 0 1 .708 0L13 2.793l1.146-1.147a.5.5 0 0 1 .708.708L13.707 3.5l1.147 1.146a.5.5 0 0 1-.708.708L13 4.207l-1.146 1.147a.5.5 0 0 1-.708-.708L12.293 3.5l-1.147-1.146a.5.5 0 0 1 0-.708"/>
                            </svg>
                        </div>
                        <div class="value_12">0508809987</div>
                    </div>

                    <div class="error_102"><?php echo $feeback['type'] ?? ''; ?></div>

                    <div class="button_12 number_12 flex_12 align-center_12">
                        <div class="icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                            </svg>
                        </div>
                        <div class="value_12">info@vskuul.com</div>
                    </div>

                    <div class="error_102"><?php echo $feeback['type'] ?? ''; ?></div>

                    <div class="button_12 number_12 flex_12 align-center_12">
                        <div class="icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                            </svg>
                        </div>
                        <div class="value_12">0508809987</div>
                    </div>

                </div>
            </div>

            <div class="right_12">

                <form action="">
                    <h2 class="title_12 close_1">Send us a message</h2>

                    <div class="grid-split_12" style="gap: 1rem;">
                        <div class="input">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name">
                            <div class="error_102"><?php echo $feeback['type'] ?? ''; ?></div>
                        </div>

                        <div class="input">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name">
                            <div class="error_102"><?php echo $feeback['type'] ?? ''; ?></div>
                        </div>
                    </div>

                    <div class="input">
                        <label for="last_name">Email</label>
                        <input type="text" name="email">
                        <div class="error_102"><?php echo $feeback['type'] ?? ''; ?></div>
                    </div>

                    <div class="input">
                        <label for="last_name">Phone Number</label>
                        <input type="text" name="phone_number">
                        <div class="error_102"><?php echo $feeback['type'] ?? ''; ?></div>
                    </div>

                    <div class="input">
                        <label for="last_name">Message</label>
                        <textarea type="text" name="last_name"></textarea>
                        <div class="error_102"><?php echo $feeback['type'] ?? ''; ?></div>
                    </div>

                    <div class="btn_12" style="width: 100%;">
                        <button style="width: 100%;">Send Message</button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</body>
<?php require_once './components/footer.php'; ?>

<script>

    function toggle(target, className='active') {
        let element = document.querySelector(target);
        element.classList.toggle(className);
    }

</script>
</html>