
<?php $base_url = '/vsk_complete'; ?>

<nav class="flex_12 side_spacing_12 space_between_12 align-center_12">
        <div class="logo_12 hw_12 title_12">
            Vskuul
        </div>

        <div class="nav-items_12 flex_12 align-center_12">
            <div class="close_12">
                <div class="bugger_12 hw_12 flex-center_12" onclick="toggle('.vsk_root .nav-items_12')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                </div>
            </div>
            <div class="nav_item_12" onclick="location.href='<?php echo $base_url; ?>/'">Home</div>
            <div class="nav_item_12" onclick="location.href='<?php echo $base_url; ?>/courses.php'">Our Courses</div>
            <div class="nav_item_12" onclick="location.href='<?php echo $base_url; ?>/about.php'">About</div>
            <div class="nav_item_12" onclick="location.href='<?php echo $base_url; ?>/contact.php'">Contact Us</div>
            <div class="nav_item_12" onclick="location.href='https://vskuul.com/login/index.php'">Log In</div>
            <div class="btn_12 close_12">
                <button>Register Now</button>
            </div>
        </div>


        <div class="flex_12 align-center_12" style="gap: 0.5rem">

            <div class="btn_12 dsk">
                <button onclick="location.href='<?php echo $base_url; ?>/register.php'">Register Now</button>
            </div>

            <div class="close_12">
                <div class="menu-btn_12 hw_12 flex-center_12" onclick="toggle('.vsk_root .nav-items_12')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                </div>
            </div>
        </div>
    </nav>