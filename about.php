<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
    <!-- External Stylesheets -->
    <?php require_once './components/head.php'; ?>
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/style.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body class="vsk_root">

    <?php require_once './components/nav.php'; ?>

    <div style="margin-top: 6rem;"></div>

    <div class="container" >
        <!-- Navigation Buttons -->
        <div class="next cen">
            <span class="t1 active" onclick="page_switch('1'); d1_ani('in');" ></span>
            <span class="t2" onclick="page_switch('2'); d1_ani('out');""></span>
            <span class="t3" onclick="page_switch('3'); d1_ani('out');";></span>
        </div>

        <!-- Content Sections -->
        <div class="d d1 content active">
            <span class="cen">
                <!-- Section 1 Content -->
                <div class="wrap">
                    <h4><span>Upgrade</span> your skills and knowledge <span>with our</span> <span class="purple">online course</span></h4>
                    <p>Innovative Language Academic Platform For Your Career</p>
                    <div class="buttons">
                        <button>Get Started</button>
                        <button class="disappear">See How It Works</button>
                    </div>
                </div>
            </span>
            <span class="cen pt">
                <!-- Section 1 Image -->
                <div class="pic">                        
                    <div class="shadow"></div>
                    <aside class="as1">
                        <div class="image bg"></div>
                        <div class="circles">
                            <div class="circle c1 bg"></div>
                            <div class="circle c2 bg"></div>
                            <div class="circle c3 bg"></div>
                        </div>
                        <h3>+3K Members</h3>
                    </aside>
                    <aside class="cen as2">
                        <div class="star cen">
                            <img src="./images/star.png" alt="">
                        </div>
                        <div class="img2 bg"></div>
                    </aside>
                </div>
            </span>
        </div>

        <!-- Section 2 -->
        <div class="d d2 cen d0">
            <div class="main">
                <div class="m2 cen">
                    <div class="image2 bg"></div>
                </div>
                <div class="m1">
                    <h6>ABOUT US</h6>
                    <h4>Know More About The V-SKULL Learning Platform</h4>
                    <p>Welcome to V-SKULL, your modern school management system revolutionizing education in the digital age. We provide a robust platform empowering schools to excel. Our features include student registration, exam management, assignments, records, tests, and grading.</p>
                    <div class="box">
                        <div class="box_item move">
                            <h5>Variety of Test Options</h5>
                            <p>Experience a wide range of testing options with V-SKULL. Our platform provides flexibility in creating and administering various types of tests, ensuring that educators can assess student learning effectively.</p>
                        </div>
                        <div class="box_item move">
                            <h5>Easy Scalability</h5>
                            <p>V-SKULL offers scalability to support your school's growth. As your school expands, our platform effortlessly adapts to accommodate the increasing number of students, ensuring smooth operations and continued excellence in education.</p>
                        </div>
                        <button class="move">Learn More</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3 -->
        <div class="d d3 d0">
            <span class="cen">
                <!-- Section 3 Image Grid -->
                <div class="pic_grid">
                    <div class="two">
                        <aside class="aa bg"></aside>
                        <aside class="mt bb bg"></aside>
                    </div>
                    <div class="two">
                        <aside class="mt ml cc bg"></aside>
                        <aside class="mt ml dd bg"></aside>
                    </div>
                </div>
            </span>
            <span class="cen col">
                <!-- Section 3 Content -->
                <p>Sign Up For V-SKULL today.</p>
                <div class="cards cen">
                    <div class="card card1 active" onclick="switch_cards('1');">
                        <div class="cir cen"><i class="bi bi-graph-up-arrow"></i></div>
                        <h4>Scalability & Growth</h4>
                        <aside>Experience seamless growth with V-SKULL. Our platform effortlessly accommodates expansions and enhancements, ensuring it scales to meet the evolving needs of your institution.</aside>
                        <button>Learn More</button>
                        <div class="btm"></div>
                    </div>
                    <div class="card card2" onclick="switch_cards('2');">
                        <div class="cir cen"><i class="bi bi-clock-history"></i></div>
                        <h4>24 hour Support</h4>
                        <aside>Get uninterrupted access to support with V-SKULL. Our dedicated team is available 24/7 to address any queries or concerns, ensuring assistance is always just a click away.</aside>
                        <button>Learn More</button>
                        <div class="btm"></div>
                    </div>
                </div>
            </span>
        </div>
    </div>

    <!-- External JavaScript -->
    <script src="script.js"></script>
</body>
</html>
