<?php
require_once "./conn.php";
require_once '../config.php';
require_once $CFG->libdir.'/filelib.php';
// require_login();
$data = get_records("select * from ekcd_course", per_page: 15);
$courses = $data['data'];

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
    <script src="./scripts/search.js" defer></script>
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
                <div class="search_102 flex_12 relative">
                    <input oninput="debouncedSearch(event, '/search/course.php', 'fullname');" type="text" style="width: calc(340px - 40px);">
                    
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


        <div class="card-box_12 flex_12 justify-center_12">
                    <?php

                    foreach ($courses as $course) {
                        $course = (object) $course;
                        if($course->category == "0") {
                            continue;
                        }
                        $duration = format_time($course_info->duration);
                        $course_url = get_course_image($course->id) ?? './shalom/images/new_way2.jpg';

                        $course_url = $course_url == '' ? './shalom/images/new_way2.jpg' : $course_url;
                        $course_context = context_course::instance($course->id);
                        $teachers = get_role_users(3, $course_context);

                        ?>

                    <div class="card_12" onclick="location.href = 'https://vskuul.com/course/view.php?id=<?php echo $course->id; ?>'">
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

                <div class="side_spacing_12">
                    <div class="flex_12 end">
                        <div class="page-box flex_12">
                            <?php echo $data['links']; ?>
                        </div>
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