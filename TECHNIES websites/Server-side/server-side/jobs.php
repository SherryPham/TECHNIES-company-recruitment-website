<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Hassan Al Bayati" />
    <meta name="description" content="The Jobs page of my website">
    <title>Job List Page</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<!-- Responsive header menu-->
<?php include('header.inc'); ?>


<section id="application-form">
    <div class="row wrap-box">
        <div class="header">
            <h2>Opening Roles</h2>
        </div>
        <div class="text">
            <p>We are hiring for the positions below!</p>
        </div>
    </div>
</section>

<div class="job-container">

<?php
require_once("settings.php");
$conn = @mysqli_connect(
    $host,
    $user,
    $pwd,
    $sql_db
);

$sql = "SELECT * FROM jobs";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Display each job
        echo "<div class='job-wrapper'>";
        echo "<h2>" . $row["job_title"] . "</h2>";
        echo "<p>Location: " . $row["location"] . "</p>";
        echo "<p>Type: " . $row["type"] . "</p>";
        echo "<p>Annual salary: $" . $row["annual_salary"] . "</p>";
        echo "<p>JRN: " . $row["job_ref_number"] . "</p>";
        echo "<h3>Position Overview</h3>";
        echo "<p class='job-overview'>" . $row["position_overview"] . "</p>";
        echo "</div>";
    }
} else {
    echo "No job listings available.";
}
?>


    <!-- <div class="job-wrapper">
        <h2>Network Administrator</h2>
        <p>Location: John St, Hawthorn VIC 3122</p>
        <p>Type: Full-Time</p>
        <p>Annual salary: $110,000-115,000</p>
        <p>JRN: NA723</p>
        <p>Date: 16/07/2023</p>
        <h3>Position Overview</h3>
        <p class="job-overview">We pride ourselves on our commitment to pushing the boundaries of technology and
            delivering exceptional user experiences. Therefore, we are seeking a candidate with an exceptional understanding of
            network technologies, protocols, and security measures. This position will require you to collaborate
            with cross-functional teams to design, implement, and maintain a firm network infrastructure.</p>
    </div>

    <div class="job-wrapper">
        <h2>Software Front-End Web Developer</h2>
        <p>Location: John St, Hawthorn VIC 3122</p>
        <p>Type: Full-Time</p>
        <p>Annual salary: $95,000-100,000</p>
        <p>JRN: WD723</p>
        <p>Date: 21/07/2023</p>
        <h3>Position Overview</h3>
        <p class="job-overview">We pride ourselves on our commitment to pushing the boundaries of technology and
            delivering exceptional user experiences. Therefore, we are seeking a skilled and creative web developer to join our
            crew. If you’re somebody with a strong foundation in web design, with a creative mind and a strong
            passion for crafting seamless user interfaces, this is the role for you. You will require to work
            alongside a development team to translate design mockups and wireframes into visually appealing and
            user-friendly web applications.</p>
    </div> -->
</div>

<hr>

<?php 
$sql = "SELECT * FROM jobs";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $responsibilities = explode("\n", $row["responsibilities"]);
        $qualifications = explode("\n", $row["qualifications"]);
        $benefits = explode("\n", $row["benefits"]);

        echo "<aside id='" . strtolower(str_replace(' ', '-', $row["job_title"])) . "-class'>";
        echo "<h2 class='job-description-title1'>" . htmlspecialchars($row["job_title"]) . "</h2>";
        echo "<div class='job-description-row'>";
        echo "<div class='job-description-contents'>";
        echo "<h3>Responsibilities:</h3>";
        echo "<ul>";
        foreach ($responsibilities as $responsibility) {
            echo "<li>" . htmlspecialchars(trim($responsibility)) . "</li>";
        }
        echo "</ul>";
        echo "</div>";

        echo "<div class='job-description-contents'>";
        echo "<h3>Qualifications:</h3>";
        echo "<ul>";
        foreach ($qualifications as $qualification) {
            echo "<li>" . htmlspecialchars(trim($qualification)) . "</li>";
        }
        echo "</ul>";
        echo "</div>";
        echo "</div>";

        echo "<div class='job-description-row'>";
        echo "<div class='job-description-contents'>";
        echo "<h3>Benefits:</h3>";
        echo "<ol>";
        foreach ($benefits as $benefit) {
            echo "<li>" . htmlspecialchars(trim($benefit)) . "</li>";
        }
        echo "</ol>";
        echo "<div class='job-interest'>";
        echo "<p>Is this a role you'd be interested in?</p>";
        echo "<p>Does the position overview pique your interest?</p>";
        echo "<p>Applying is only a click away!</p>";
        echo "</div>";
        echo "</div>";

        echo "<div class='job-description-contents'>";
        // You can replace this with a dynamic image path if you have one in your database
        echo "<img src='images/" . strtolower(str_replace(' ', '', $row["job_title_slug"])) . ".png' alt='" . htmlspecialchars($row["job_title_slug"]) . "' title='" . htmlspecialchars($row["job_title"]) . "' />";
        echo "</div>";
        echo "</div>";
        echo "</aside>";
        echo "<hr>";
    }
} else {
    echo "<p>No job listings available.</p>";
}

?>

<!-- <aside id="network-admin-class">
    <h2 class="job-description-title2">Network Administrator</h2>
    <div class="job-description-row">
        <div class="job-description-contents">
            <h3>Responsibilities:</h3>
            <ul>
                <li>Effectively design, configure, and maintain the company’s network infrastructure, including routers,
                    switches, firewalls, and WAPs.</li>
                <li>Capable of efficiently troubleshooting network issues and outages, diagnosing and resolving problems
                    in
                    a timely manner.</li>
                <li>Capabilities to safeguard against unauthorized access and potential threats surrounding the network
                    by
                    utilizing firewalls, intrusion detection systems, and access controls.</li>
                <li>Collaboration with the IT team to ensure proper configurations and processes with up-to-date
                    records.</li>
                <li>Assist and plan the execution of network expansion and upgrade projects, ensuring scalability and
                    compatibility with future technology needs.</li>
                <li>Monitor network performance, identify and eliminate bottlenecks, and implement necessary adjustments
                    to
                    optimize performance and ensure seamless connectivity.</li>
            </ul>
        </div>
        <div class="job-description-contents">
            <h3>Qualifications:</h3>
            <ul>
                <li>A bachelor's degree in computer science, software engineering, web development, or an equivalent
                    standard, as well as applicable work experience.</li>
                <li>A deep understanding of fundamental concepts, protocols (TCP/IP, DNS, DHCP), and network
                    security
                    principles.</li>
                <li>At least a year of experience as a Network Administrator or in a similar role, demonstrating
                    hands-on experience with network setup, maintenance, and troubleshooting.</li>
                <li>Proficiency in network diagnostics and troubleshooting tools.</li>
                <li>Excellent problem-solving abilities and analytical analysis skills.</li>
                <li>Strong communication and interpersonal skills to plan and collaborate effectively within a team
                    and
                    across departments.</li>
            </ul>
        </div>
    </div>

    <div class="job-description-row">
        <div class="job-description-contents">
            <h3>Benefits:</h3>
            <ol>
                <li>Comprehensive health, dental, and vision insurance plans.</li>
                <li>Flexible work hours.</li>
                <li>Opportunities for professional development and continued learning.</li>
                <li>Ongoing team-building activities and social gatherings.</li>
                <li>Performance-based bonuses and competitive salary.</li>
            </ol>
            <div class="job-interest">
                <p>Is this a role you'd be interested in?</p>
                <p>Does the position overview pique your interest?</p>
                <p>Applying is only a click away!</p>
            </div>
        </div>
        <div class="job-description-contents">
            <img src="images/networkadminpng.png" alt="Network Admin" title="Network Admin" id="NetworkAdminImage" />
        </div>
    </div>
</aside>

<hr>

<aside id="web-developer-class">
    <h2 class="job-description-title1">Software Front-End Web Developer</h2>
    <div class="job-description-row">
        <div class="job-description-contents">
            <h3>Responsibilities:</h3>
            <ul>
                <li>Collaborate with firm management, designers, and back-end developers to create intuitive and
                    interactive user interfaces that are in line with project goals and user requirements.</li>
                <li>Translate design mockups and wireframes into functional code while maintaining a high standard of
                    visual fidelity and user experience.</li>
                <li>Optimize web applications for maximum speed and scalability, ensuring exceptional performance even
                    in low-bandwidth environments.</li>
                <li>Participate in code reviews to maintain code quality, share knowledge, and provide constructive
                    feedback to fellow team members.</li>
                <li>Identify and troubleshoot web-design performance bottlenecks and usability issues, implementing
                    necessary fixes and improvements.</li>
                <li>Collaborate with back-end developers to integrate front-end components with server-side logic and
                    APIs.</li>
            </ul>
        </div>
        <div class="job-description-contents">
            <h3>Qualifications:</h3>
            <ul>
                <li>A bachelor's degree in computer science, software engineering, web development, or an equivalent
                    standard, as well as applicable work experience.</li>
                <li>A strong portfolio showcasing web applications and interfaces.</li>
                <li>Strong problem-solving abilities and a sharp eye for detail.</li>
                <li>Knowledge of version control systems (e.g., Git) and utilization of code collaboration tools.</li>
                <li>Presumed knowledge of back-end technologies.</li>
                <li>Experience with UI/UX design principles and mobile-first development.</li>
            </ul>
        </div>
    </div>

    <div class="job-description-row">
        <div class="job-description-contents">
            <h3>Benefits:</h3>
            <ol>
                <li>Comprehensive health, dental, and vision insurance plans.</li>
                <li>Flexible work hours.</li>
                <li>Opportunities for professional development and continued learning.</li>
                <li>Ongoing team-building activities and social gatherings.</li>
                <li>Performance-based bonuses and competitive salary.</li>
            </ol>
            <div class="job-interest">
                <p>Is this a role you'd be interested in?</p>
                <p>Does the position overview pique your interest?</p>
                <p>Applying is only a click away!</p>
            </div>
        </div>
        <div class="job-description-contents">
            <img src="images/webdeveloperpng.png" alt="Web developer" title="web developer" id="WebDeveloperImage" />
        </div>
    </div>
</aside> -->

<!-- Footer section -->
<?php include('footer.inc'); ?>
</body>

</html>
