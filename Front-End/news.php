<?php
session_start();

if(isset($_SESSION['user_id']) && isset($_SESSION['username'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/news.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
    <link href="pictures/UNMLogo.png" rel="icon" />
</head>

<body>
<div class="menusidebar">
    <div class="section">
        <div class="top_navbar">
            <div class="hamburger">
                <a href="#">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="search-container">
                    <form>
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <! contain >
        <div class="activity">
            <div class="box">
                <div class="news">
                    <div class="top">Co-curricular</div>
                    <img src="pictures/co.png">
                    <div><a href="https://www.sanottingham.org/" class="view_btn">See for more details</a></div>
                </div>
            </div>

            <div class=filter>
                <div class="Category_box">

                    <div class="top2">Filter Result</div>
                    <br>
                    <div class="title">Category</div>
                    <br>
                    <form>
                        <label><input type="checkbox" value="SA"/> SA Activities</label><br>
                        <label><input type="checkbox" value="Career"/> Career</label><br>
                        <label><input type="checkbox" value="Office"/> Provost Office</label><br>

                    </form>
                    <div class="Date_box">
                        <div class="title">Date</div>
                        <br>
                        <form>
                            <label><input type="checkbox" value="This"/>This Week</label><br>
                            <label><input type="checkbox" value="Last"/>Last Week</label><br>
                            <label><input type="checkbox" value="Month"/>Last Month</label><br>
                        </form>
                    </div>
                </div>

                <div class="Result">
                    <div class="title">Search Result</div>
                    <div class="Result_box">
                        <div class="Search_result_box">
                            <div class="result" data-category="SA Month">
                                <div class="Result_img">
                                    <img src="pictures/fiction day.png">
                                </div>
                                <div class="Description">
                                    <a href="#" class=name>Fiction Day</a>
                                    <p>Dark and difficult times lie ahead. Soon we must all face the choice between what is
                                        right and what is easy. It is unknown the unknown we fear when we look upon death
                                        and darkness, nothing more. Pick your right fictional character to survive through
                                        the adventure! </p>
                                    <p>Date:15th February 2022</p>
                                </div>
                            </div>
                        </div>


                        <div class="Search_result_box">
                            <div class="result" data-category="Office This">
                                <div class="Result_img">
                                    <img src="pictures/announcement.jpg">
                                </div>
                                <div class="Description">
                                    <a href="#" class=name>Reporting of individual COVID-19 cases on campus</a>
                                    <p>The Senior Defence Minister YB Dato' Seri Hishammuddin Tun Hussein recently announced
                                        that Malaysia is transitioning to the endemic stage of COVID-19 with the removal of
                                        several restrictions and standard operating procedures.
                                        In view of this change, the university will stop sending emails to report individual
                                        COVID-19 positive cases on campus. Instead, we will notify the university community
                                        of an outbreak or high risk of an outbreak to contain the spread on a fortnightly
                                        basis.</p>
                                </div>
                            </div>
                        </div>


                        <div class="Search_result_box">
                            <div class="result" data-category="Career Last">
                                <div class="Result_img">
                                    <img src="pictures/KPMG.jpg">
                                </div>
                                <div class="Description">
                                    <a href="#" class=name>Data Analytic Workshop by KPMG (Career Skills Workshop)</a>
                                    <p>Date: 9th March 2022 (Wednesday) </p>
                                    <p>Time: 4.30 PM – 6.30 PM (Malaysia Time GMT 8)</p>
                                    <p>Platform : TEAMS (Email invite will be sent to registered participants)</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
        <script>
            var $filterCheckboxes = $('input[type="checkbox"]');
            var filterFunc = function () {

                var selectedFilters = {};

                $filterCheckboxes.filter(':checked').each(function () {

                    if (!selectedFilters.hasOwnProperty(this.name)) {
                        selectedFilters[this.name] = [];
                    }

                    selectedFilters[this.name].push(this.value);
                });

                var $filteredResults = $('.result');
                $.each(selectedFilters, function (name, filterValues) {


                    $filteredResults = $filteredResults.filter(function () {

                        var matched = false,
                            currentFilterValues = $(this).data('category').split(' ');


                        $.each(currentFilterValues, function (_, currentFilterValue) {


                            if ($.inArray(currentFilterValue, filterValues) != -1) {
                                matched = true;
                                return false;
                            }
                        });
                        return matched;

                    });
                });

                $('.result').hide().filter($filteredResults).show();
            }

            $filterCheckboxes.on('change', filterFunc);

        </script>

        <div class="sidebar">
            <div class="profile">
                <img src="pictures/profile.png" alt="profile_picture">
                <h3><?php echo $_SESSION['last_name']," ", $_SESSION['first_name'] ?></h3>
                <p>Student</p>
            </div>
            <ul>
                <li>
                    <a href="home.php" class="active">
                        <span class="icon"><i class="fa fa-home"></i></span>
                        <span class="item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="news.php">
                        <span class="icon"><i class="fa fa-newspaper-o"></i></span>
                        <span class="item">Newsletter</span>
                    </a>
                </li>
                <li>
                    <a href="class.php">
                        <span class="icon"><i class="fa fa-book"></i></span>
                        <span class="item">Class</span>
                    </a>
                </li>
                <li>
                    <a href="module_details.php">
                        <span class="icon"><i class="fa fa-university"></i></span>
                        <span class="item">Modules</span>
                    </a>
                </li>
                <li>
                    <a href="calendar.php">
                        <span class="icon"><i class="fa fa-calendar"></i></span>
                        <span class="item">Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="search_people.php">
                        <span class="icon"><i class="fa fa-users"></i></span>
                        <span class="item">People</span>
                    </a>
                </li>
                <li>
                    <a href="result_page.php">
                        <span class="icon"><i class="fa fa-graduation-cap"></i></span>
                        <span class="item">Result</span>
                    </a>
                </li>
                <li>
                    <a href="finance.php">
                        <span class="icon"><i class="fa fa-credit-card"></i></span>
                        <span class="item">Finance</span>
                    </a>
                </li>
                <li>
                    <a href="help_page.php">
                        <span class="icon"><i class="fa fa-question-circle"></i></span>
                        <span class="item">Help</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fa fa-cog"></i></span>
                        <span class="item">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon"><i class="fa fa-reply"></i></span>
                        <span class="item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>


        <hr class="rounded">
        <footer>
            <section class="footer-main">
                <div class="footer-main-item">
                    <h2 class="footer-title">Site Information</h2>
                    <ul>
                        <br>
                        <li><a href="home.php">Help Desk</a></li>
                        <br>
                        <li><a href="finance.php">Finance</a></li>
                        <br>
                        <li><a href="news.php">Newsletter</a></li>
                        <br>
                    </ul>
                </div>

                <div class="footer-main-item">
                    <h2 class="footer-title">Navigation</h2>
                    <ul>
                        <br>
                        <li><a href="home.php">Dashboard</a></li>
                        <br>
                        <li><a href="finance.php">Finance</a></li>
                        <br>
                        <li><a href="news.php">Newsletter</a></li>
                        <br>
                    </ul>
                </div>

                <div class="footer-main-item">
                    <h2 class="footer-title">Get in touch</h2>
                    <ul>
                        <br>
                        <li><b>Malaysia</b></li>
                        <br>
                        <li class="helpnumber"><i class ="fa fa-phone"></i> +6 (03) 8924 8199</li>
                        <br>
                        <li class="helpmail"><i class="fa fa-envelope"></i> ITServiceDesk@nottingham.edu.my</li>
                        <br>
                    </ul>
                </div>
            </section>

            <section class="footer-social">
                <table>
                    <tr class="footer-social-list">
                        <th><a href="#"><i class="fa fa-facebook-square"></i></a></th>
                        <th><a href="#"><i class="fa fa-twitter"></i></a></th>
                        <th><a href="#"><i class="fa fa-instagram"></i></a></th>
                        <th><a href="#"><i class="fa fa-github"></i></a></th>
                        <th><a href="#"><i class="fa fa-linkedin"></i></a></th>
                        <th><a href="#"><i class="fa fa-youtube"></i></a></th>
                    </tr>
                </table>
            </section>

            <section class="footer-legal">
                <ul class="footer-legal-list" >
                    <li>&copy; Copyright 2022 UNMBUDDY</li>
                </ul>
            </section>
        </footer>

        <script>
            var hamburger = document.querySelector(".hamburger");
            hamburger.addEventListener("click", function(){
                document.querySelector("body").classList.toggle("active");
            })
        </script>

    </div>
</div>

</body>
</html>

    <?php
}else{
    header("Location: index.php");
    exit();
}
?>