<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Hassan Al Bayati">
    <meta name="description" content="The About Us page of my website">
    <title>About Us Page</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
	<!-- Responsive header menu-->
	<?php include('header.inc'); ?>

    <section id="company-introduction">
        <div>
            <div class="header">
                <h2>About Us</h2>
            </div>
            <div class="company-introduction-content">
                <h4>Company Introduction</h4>
                <p class="company-introduction-description">Technies, a visionary technology company that is redefining
                    the digital world. Our core beliefs
                    serve as the foundation of our identity at Technies, driving our aim to revolutionize the way people
                    interact
                    with the digital world. We demonstrate our commitment to excellence in everything we do, from
                    cutting-edge
                    software development and seamless AI integration to strong cloud computing services.</p>
            </div>
        </div>
    </section>

    <section id="company-info">
        <div class="wrap-container">

            <div>
                <div class="company-introduction-cards">
                    <div class="company-introduction-card">
                        <div><img src="images/whatwedo.png" class="company-introduction-card-image"
                                alt="What we do Image" /></div>
                        <h4 class="company-introduction-card-title">What we do</h4>
                        <p class="company-introduction-card-content"> Technies is a dynamic technology firm that
                            specializes
                            in a wide range of innovative tech solutions that aim to transform the way we interact
                            with the digital world. Our primary areas of expertise include software development,
                            artificial intelligence integration, and cloud computing services.

                        </p>
                    </div>
                    <div class="company-introduction-card">
                        <div><img src="images/commitment.png" class="company-introduction-card-image"
                                alt="Our commitment Image" /></div>
                        <h4 class="company-introduction-card-title">Our Commitment
                        </h4>
                        <p class="company-introduction-card-content">Our dedication extends beyond products and
                            services. We
                            are committed to setting a good example by demonstrating the power of technology to
                            enhance the quality of life for others.
                        </p>
                    </div>

                    <div class="company-introduction-card">
                        <div><img src="images/value.png" class="company-introduction-card-image" alt="Our value Img" />
                        </div>
                        <h4 class="company-introduction-card-title">Our Values
                        </h4>
                        <p class="company-introduction-card-content">Technies represents core principles such as
                            innovation,
                            a passion for technology, excellence, national development, leadership, collaboration,
                            and enhancing everyday experiences within the technology and business world. With a
                            global perspective, we stand tall as a leader, paving the way for others in the
                            industry.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section id="team-introduction">
        <div>
            <div class="header">
                <h2>Meet Our Teams</h2>
            </div>
            <div class="team-introduction-content">
                <h4>Group Introduction</h4>
                <dl>
                    <dt>Group Name:</dt>
                    <dd>Technies</dd>
                </dl>
                <dl>
                    <dt>Group Id:</dt>
                    <dd>007</dd>
                </dl>
                <dl>
                    <dt>Course ID:</dt>
                    <dd>COS10026</dd>
                </dl>
                <dl>
                    <dt>Tutor:</dt>
                    <dd>Jayson Paul</dd>
                </dl>

            </div>
        </div>
    </section>

    <section id="team-members">
        <div class="wrap-container">
            <div class="row wrap-box">
                <div class="team-members-cards">
                    <div class="team-members-card">
                        <div><img src="images/hannah.jpeg" class="team-members-card-image" alt="Hannah" /></div>
                        <h4 class="team-members-card-title">Thi Minh Ha Nguyen</h4>
                        <p class="team-members-card-content">
                            <span class="team-members-card-content-main">Nickname:</span> Hannah <br>
                            <span class="team-members-card-content-main">Programming Skills:</span>
                            HTML, CSS, Javascript, ReactJs, Nodejs, Python, Ruby <br>
                            <span class="team-members-card-content-main">Interests:</span> Reading, Jogging, Playing
                            Piano<br>
                            <span class="team-members-card-content-main">Ethnicity:</span> Vietnamese
                        </p>

                    </div>

                    <div class="team-members-card">
                        <div><img src="images/hassan.jpeg" class="team-members-card-image" alt="Hassan" /></div>
                        <h4 class="team-members-card-title">Hassan Al Bayati</h4>
                        <p class="team-members-card-content">
                            <span class="team-members-card-content-main">Nickname:</span> Hassan <br>
                            <span class="team-members-card-content-main">Programming </span>Skills: HTML, CSS, Python,
                            Ruby, C#
                            <br>
                            <span class="team-members-card-content-main">Interests: </span>Hanging out with friends,
                            Weightlifting, Gaming <br>
                            <span class="team-members-card-content-main">Ethnicity: </span> Iraqi
                        </p>

                    </div>

                    <div class="team-members-card">
                        <div><img src="images/sherry.jpeg" class="team-members-card-image" alt="Sherry" /></div>
                        <h4 class="team-members-card-title">Tran Anh Thu Pham</h4>
                        <p class="team-members-card-content">
                            <span class="team-members-card-content-main">Nickname:</span> Sherry <br>
                            <span class="team-members-card-content-main">Programming </span>Skills: HTML, CSS, Python,
                            Ruby
                            <br>
                            <span class="team-members-card-content-main">Interests: </span>Listening, Jogging, Skiing
                            <br>
                            <span class="team-members-card-content-main">Ethnicity: </span> Vietnamese
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <aside id="available-time">
        <div class="table-container">
            <h2 class="timetable_h2">Timetable</h2>
            <table class="timetable">
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                </tr>
                <tr>
                    <td>09:00 am</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="available">
                    <td>10:00 am</td>
                    <td>Available</td>
                    <td>Available</td>
                    <td>Available</td>
                    <td>Available</td>
                    <td>Available</td>
                </tr>
                <tr class="available">
                    <td>11:00 am</td>
                    <td>Available</td>
                    <td>Available</td>
                    <td>Available</td>
                    <td>Available</td>
                    <td>Available</td>
                </tr>
                <tr>
                    <td>12:00 pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>13:00 pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>14:00 pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>15:00 pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <p> Preferably contact the team within these hours.</p>
            <p><a href="mailto:ContactTechnies@gmail.com"> Contact Us </a></p>
        </div>
    </aside>
	<!-- Footer section -->
	<?php include('footer.inc'); ?>
</body>


</html>