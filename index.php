<?php
    require_once('../config.php');
    require_once( $CFG->libdir . '/filelib.php' );
    // require_login();
    $courses = get_courses();
    
    function get_course_image($course_id)
    {
       global $COURSE;
       $url = '';

       $context = context_course::instance( $course_id );
       $fs = get_file_storage();
       $files = $fs->get_area_files( $context->id, 'course', 'overviewfiles', 0 );

       foreach ( $files as $f )
       {
         if ( $f->is_valid_image() )
         {
            $url = moodle_url::make_pluginfile_url( $f->get_contextid(), $f->get_component(), $f->get_filearea(), null, $f->get_filepath(), $f->get_filename(), false );
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
    <link rel="stylesheet" href="./styles/general.css">
    <link rel="stylesheet" href="./styles/home_header.css">
    <link rel="stylesheet" href="./styles/home_body.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>VSKUUL</title>
</head>
<body class="vsk_root">
    

    <?php require_once './components/nav.php'; ?>

    <header>
        <div class="content_12 side_spacing_12">
            <div class="left_12">

                <h1 class="title_12">
                    <div class="big">Let's Learn</div>
                    <div class="small">Beyond The Limits</div>
                </h1>

                <div class="image-box_12">
                    <img src="./images/new_way.jpg" class="obj-cover_12 hw_12">
                </div>

            </div>
            <div class="right_12">

                <div class="round-images_12 flex_12">

                    <div class="image hw_12 ov-hide_12">
                        <img src="./images/new_way2.jpg" class="obj-cover_12 hw_12">
                    </div>

                    <div class="image hw_12 ov-hide_12 t">
                        <img src="./images/old_way.jpg" class="obj-cover_12 hw_12">
                    </div>
                </div>

                <div class="texts">
                    <h2 class="title_12">We Make It Easy</h2>
                    <p>
                        Bridging the gap to easy access of educational resources, real-time learning
                        and online exams, we make it easy so that your school does not have to deal width
                        endless paper work
                    </p>

                    <div class="btn_12">
                        <button onclick="location.href='./register.php'">Get Started Now</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="bg_12 hw_12 flex-center_12">
            <div class="center-orange_12 hw_12"></div>
        </div>
        <div class="content_12 side_spacing_12">
            <div class="sub-section_12 grid-split_12 split_21">

                <div class="left_12">
                    <h1 class="title_12 semi-bold_12">An effective an quick way to learn</h1>

                    <div class="list-content_12">

                        <div class="list_12 flex_12 align-center_12">
                            <div class="icon_12 hw_12 flex-center_12">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-easel" viewBox="0 0 16 16">
                                    <path d="M8 0a.5.5 0 0 1 .473.337L9.046 2H14a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1.85l1.323 3.837a.5.5 0 1 1-.946.326L11.092 11H8.5v3a.5.5 0 0 1-1 0v-3H4.908l-1.435 4.163a.5.5 0 1 1-.946-.326L3.85 11H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4.954L7.527.337A.5.5 0 0 1 8 0M2 3v7h12V3z"/>
                                </svg>
                            </div>
                            <div class="text_12">Engaging multimedia lessons with videos, quizzes, and interactive activities.</div>
                        </div>

                        <div class="list_12 flex_12 align-center_12">
                            <div class="icon_12 hw_12 flex-center_12">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-easel" viewBox="0 0 16 16">
                                    <path d="M8 0a.5.5 0 0 1 .473.337L9.046 2H14a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1.85l1.323 3.837a.5.5 0 1 1-.946.326L11.092 11H8.5v3a.5.5 0 0 1-1 0v-3H4.908l-1.435 4.163a.5.5 0 1 1-.946-.326L3.85 11H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4.954L7.527.337A.5.5 0 0 1 8 0M2 3v7h12V3z"/>
                                </svg>
                            </div>
                            <div class="text_12">Group discussions, forums, and peer-to-peer interactions for collaborative learning.</div>
                        </div>

                        <div class="list_12 flex_12 align-center_12">
                            <div class="icon_12 hw_12 flex-center_12">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-easel" viewBox="0 0 16 16">
                                    <path d="M8 0a.5.5 0 0 1 .473.337L9.046 2H14a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1.85l1.323 3.837a.5.5 0 1 1-.946.326L11.092 11H8.5v3a.5.5 0 0 1-1 0v-3H4.908l-1.435 4.163a.5.5 0 1 1-.946-.326L3.85 11H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4.954L7.527.337A.5.5 0 0 1 8 0M2 3v7h12V3z"/>
                                </svg>
                            </div>
                            <div class="text_12">Instant feedback on assignments and progress tracking tools for learners and instructors.</div>
                        </div>

                        <div class="list_12 flex_12 align-center_12">
                            <div class="icon_12 hw_12 flex-center_12">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-easel" viewBox="0 0 16 16">
                                    <path d="M8 0a.5.5 0 0 1 .473.337L9.046 2H14a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1.85l1.323 3.837a.5.5 0 1 1-.946.326L11.092 11H8.5v3a.5.5 0 0 1-1 0v-3H4.908l-1.435 4.163a.5.5 0 1 1-.946-.326L3.85 11H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4.954L7.527.337A.5.5 0 0 1 8 0M2 3v7h12V3z"/>
                                </svg>
                            </div>
                            <div class="text_12">Access to a vast repository of learning materials, including documents, videos, and links.</div>
                        </div>

                        <div class="list_12 flex_12 align-center_12">
                            <div class="icon_12 hw_12 flex-center_12">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-easel" viewBox="0 0 16 16">
                                    <path d="M8 0a.5.5 0 0 1 .473.337L9.046 2H14a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1.85l1.323 3.837a.5.5 0 1 1-.946.326L11.092 11H8.5v3a.5.5 0 0 1-1 0v-3H4.908l-1.435 4.163a.5.5 0 1 1-.946-.326L3.85 11H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4.954L7.527.337A.5.5 0 0 1 8 0M2 3v7h12V3z"/>
                                </svg>
                            </div>
                            <div class="text_12">Instant grading and feedback on quizzes and assignments for efficient learning.</div>
                        </div>

                        <div class="list_12 flex_12 align-center_12">
                            <div class="icon_12 hw_12 flex-center_12">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-easel" viewBox="0 0 16 16">
                                    <path d="M8 0a.5.5 0 0 1 .473.337L9.046 2H14a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1.85l1.323 3.837a.5.5 0 1 1-.946.326L11.092 11H8.5v3a.5.5 0 0 1-1 0v-3H4.908l-1.435 4.163a.5.5 0 1 1-.946-.326L3.85 11H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4.954L7.527.337A.5.5 0 0 1 8 0M2 3v7h12V3z"/>
                                </svg>
                            </div>
                            <div class="text_12">Seamless access to courses and resources on mobile devices for learning anytime, anywhere.</div>
                        </div>
                    </div>

                    <div class="btn_12" style="margin-top: 1.5rem;">
                        <button onclick="location.href='/school/register.php'">Join Us Today</button>
                    </div>
                </div>

                <div class="right_12">
                    <img src="/school/images/happy.png" class="obj-contain_12 hw_12">
                </div>

            </div>

            <div class="sub-section_12">
                <h1 class="title_12 semi-bold_12 text-center_12" style="padding: 5rem 0;">Popular Online Courses</h1>


                <div class="card-box_12 flex_12 justify-center_12">
                    <?php 
                    
                    foreach($courses as $course): 
                        if($course->category == "0") {
                            continue;
                        }
                        $duration = format_time($course_info->duration);
                        $course_url = get_course_image($course->id) ?? "./school/images/new_way2.jpg";
                        
                        $course_url = $course_url == "" ? "/school/images/new_way2.jpg" : $course_url;
                        $course_context = context_course::instance($course->id);
                        $teachers = get_role_users(3, $course_context);
                        
                        // var_dump( $course_url );
                    ?>

                    <div class="card_12" onclick="location.href = 'https://vskuul.com/course/view.php?id=<?php echo $course->id; ?>'">
                        <div class="image_12">
                            <img src="<?php echo $course_url; ?>" class="obj-cover_12 hw_12">
                        </div>
                        <div class="card-content_12">
                            <div class="short-title_12 flex_12 space_between_12">
                                <h4><?php echo $course->shortname ?></h4>
                                <span><?php echo $duration ?></span>
                            </div>

                            <h2><?php echo $course->fullname ?></h2>

                            <div class="instructor_12">
                                <div class="icon_12 flex-center_12"></div>
                                <div class="name_12"><?php
                                    if (!empty($teachers)) {
                                        foreach ($teachers as $teacher) {
                                            echo "{$teacher->firstname} {$teacher->lastname}";
                                            break;
                                        }
                                    } else {
                                        echo "Vskuul";
                                    }
                                
                                ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <?php endforeach; ?>

                    <!--<div class="card_12">-->
                    <!--    <div class="image_12">-->
                    <!--        <img src="./school/images/new_way2.jpg" class="obj-cover_12 hw_12">-->
                    <!--    </div>-->
                    <!--    <div class="card-content_12">-->
                    <!--        <div class="short-title_12 flex_12 space_between_12">-->
                    <!--            <h4>Computer Graphics</h4>-->
                    <!--            <span>6 Months</span>-->
                    <!--        </div>-->

                    <!--        <h2>Introduction to Computer Graphics 223</h2>-->

                    <!--        <div class="instructor_12">-->
                    <!--            <div class="icon_12 flex-center_12"></div>-->
                    <!--            <div class="name_12">Dr David Shalom</div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <!--<div class="card_12">-->
                    <!--    <div class="image_12">-->
                    <!--        <img src="./school/images/new_way2.jpg" class="obj-cover_12 hw_12">-->
                    <!--    </div>-->
                    <!--    <div class="card-content_12">-->
                    <!--        <div class="short-title_12 flex_12 space_between_12">-->
                    <!--            <h4>Computer Graphics</h4>-->
                    <!--            <span>6 Months</span>-->
                    <!--        </div>-->

                    <!--        <h2>Introduction to Computer Graphics 223</h2>-->

                    <!--        <div class="instructor_12">-->
                    <!--            <div class="icon_12 flex-center_12"></div>-->
                    <!--            <div class="name_12">Dr David Shalom</div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <!--<div class="card_12">-->
                    <!--    <div class="image_12">-->
                    <!--        <img src="./school/images/new_way2.jpg" class="obj-cover_12 hw_12">-->
                    <!--    </div>-->
                    <!--    <div class="card-content_12">-->
                    <!--        <div class="short-title_12 flex_12 space_between_12">-->
                    <!--            <h4>Computer Graphics</h4>-->
                    <!--            <span>6 Months</span>-->
                    <!--        </div>-->

                    <!--        <h2>Introduction to Computer Graphics 223</h2>-->

                    <!--        <div class="instructor_12">-->
                    <!--            <div class="icon_12 flex-center_12"></div>-->
                    <!--            <div class="name_12">Dr David Shalom</div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                </div>

            </div>
        </div>
    </section>

    <section class="content_12 side_spacing_12" style="margin-top: 0;">
        <h1 class="title_12 semi-bold_12 text-center_12" style="padding: 0rem 0; margin-bottom: 3rem;">Our Pricing</h1>

        <div class="pricing-box flex_12 justify-center_12">
            <div class="pricing_card_12">
                <div class="small-name_12">BASIC</div>
                <div class="price_12 title_12">
                    Free
                </div>

                <div class="desc_12">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis, consequuntur!
                </div>

                <div class="sm-list_12">
                    <div class="sm-list-item_12 flex_12 align-center_12">
                        <div class="sm-icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div class="sm-item_12">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                    </div>
                    <div class="sm-list-item_12 flex_12 align-center_12">
                        <div class="sm-icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div class="sm-item_12">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                    </div>
                    <div class="sm-list-item_12 flex_12 align-center_12">
                        <div class="sm-icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div class="sm-item_12">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                    </div>
                    <div class="sm-list-item_12 flex_12 align-center_12">
                        <div class="sm-icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div class="sm-item_12">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                    </div>
                </div>

                <div class="btn_12" style="margin-top: .95rem; width: 100%">
                    <button style="width: 100%;" onclick="location.href='/school/register.php?plan=free'">Join Us Today</button>
                </div>

            </div>
            <div class="pricing_card_12">
                <div class="small-name_12">PRO</div>
                <div class="price_12 title_12">
                    <span style="font-size: 20%">Ghc</span>2300
                </div>

                <div class="desc_12">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis, consequuntur!
                </div>

                <div class="sm-list_12">
                    <div class="sm-list-item_12 flex_12 align-center_12">
                        <div class="sm-icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div class="sm-item_12">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                    </div>
                    <div class="sm-list-item_12 flex_12 align-center_12">
                        <div class="sm-icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div class="sm-item_12">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                    </div>
                    <div class="sm-list-item_12 flex_12 align-center_12">
                        <div class="sm-icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div class="sm-item_12">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                    </div>
                    <div class="sm-list-item_12 flex_12 align-center_12">
                        <div class="sm-icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div class="sm-item_12">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                    </div>
                </div>

                <div class="btn_12" style="margin-top: .95rem; width: 100%">
                    <button style="width: 100%;" onclick="location.href='/school/register.php?plan=pro'">Join Us Today</button>
                </div>

            </div>
            <div class="pricing_card_12">
                <div class="small-name_12">ENTERPRICE</div>
                <div class="price_12 title_12">
                    <span style="font-size: 20%">Ghc</span>5999
                </div>

                <div class="desc_12">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis, consequuntur!
                </div>

                <div class="sm-list_12">
                    <div class="sm-list-item_12 flex_12 align-center_12">
                        <div class="sm-icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div class="sm-item_12">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                    </div>
                    <div class="sm-list-item_12 flex_12 align-center_12">
                        <div class="sm-icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div class="sm-item_12">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                    </div>
                    <div class="sm-list-item_12 flex_12 align-center_12">
                        <div class="sm-icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div class="sm-item_12">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                    </div>
                    <div class="sm-list-item_12 flex_12 align-center_12">
                        <div class="sm-icon_12 hw_12 flex-center_12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div class="sm-item_12">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                    </div>
                </div>

                <div class="btn_12" style="margin-top: .95rem; width: 100%">
                    <button onclick="location.href='/school/register.php?plan=enterprice'" style="width: 100%;">Join Us Today</button>
                </div>

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