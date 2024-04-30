<?php
require_once '../config.php';
require_once $CFG->libdir.'/filelib.php';
// require_login();
$courses = get_courses();

function get_course_image($course_id)
{
    global $COURSE;
    $url = '';

    $context = context_course::instance($course_id);
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'course', 'overviewfiles', 0);

    foreach ($files as $f) {
        if ($f->is_valid_image()) {
            $url = moodle_url::make_pluginfile_url($f->get_contextid(), $f->get_component(), $f->get_filearea(), null, $f->get_filepath(), $f->get_filename(), false);
        }
    }

    return $url;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once './components/head.php'; ?>
    <link rel="stylesheet" href="./styles/courses.css">
</head>
<body class="vsk_root">
    <?php require_once './components/nav.php'; ?>

    <section class="side_spacing_12" style="margin: 0;">

        <div class="title_102 search_parent_102 font-bold_102 flex_12 space_between_12" style="padding-bottom: 2rem;">
            <h1 class="font-bold_102">Popular Courses</h1>

            <div class="search-box_102">
                <div class="category_filter_102">
                    <select name="cource_category" id="">
                        <option>Science</option>
                        <option>Business</option>
                        <option>Art</option>
                    </select>
                </div>
                <div class="search_102">
                    <input type="text">
                    <button class="icon_btn_102">sch</button>
                </div>
            </div>
        </div>


        <div class="card-box_12 flex_12 justify-center_12">
                    <?php

                    foreach ($courses as $course) {
                        $duration = format_time($course_info->duration);
                        $course_url = get_course_image($course->id) ?? './shalom/images/new_way2.jpg';

                        $course_url = $course_url == '' ? './shalom/images/new_way2.jpg' : $course_url;
                        $course_context = context_course::instance($course->id);
                        $teachers = get_role_users(3, $course_context);

                        var_dump($course_url);
                        ?>

                    <div class="card_12">
                        <div class="image_12">
                            <img src="<?php echo $course_url; ?>" class="obj-cover_12 hw_12">
                        </div>
                        <div class="card-content_12">
                            <div class="short-title_12 flex_12 space_between_12">
                                <h4><?php echo $course->shortname; ?></h4>
                                <span><?php echo $duration; ?></span>
                            </div>

                            <h2><?php echo $course->fullname; ?></h2>

                            <div class="instructor_12">
                                <div class="icon_12 flex-center_12"></div>
                                <div class="name_12"><?php
                                        if (!empty($teachers)) {
                                            foreach ($teachers as $teacher) {
                                                echo "{$teacher->firstname} {$teacher->lastname}";
                                                break;
                                            }
                                        } else {
                                            echo 'Vskuul';
                                        }

                        ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <?php }?>

                </div>

        <div class="flex_12 end">
            <div class="page-box flex_12">
                <div class="page flex-center_12 hw_12">1</div>
                <div class="page flex-center_12 hw_12">3</div>
                <div class="page flex-center_12 hw_12">2</div>
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