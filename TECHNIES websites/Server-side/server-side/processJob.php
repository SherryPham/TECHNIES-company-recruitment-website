<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Thi Minh Ha Nguyen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<?php
// Database connection settings
require_once("settings.php");
    $conn = @mysqli_connect(
        $host,
        $user,
        $pwd,
        $sql_db
    );
    if (!$conn) {
        //Display an error message
        echo "<p>Database connection failure</p>"; //not in production script
    } else {
        echo "come to insert db";
        $createTableJobSql = "
            CREATE TABLE IF NOT EXISTS jobs (
                job_ref_number CHAR(5) NOT NULL PRIMARY KEY,
                job_title VARCHAR(255) NOT NULL,
                job_title_slug VARCHAR(255) NOT NULL,
                location VARCHAR(255) NOT NULL,
                type VARCHAR(255) NOT NULL,
                annual_salary DECIMAL NOT NULL,
                position_overview TEXT NOT NULL,
                responsibilities TEXT NOT NULL,
                qualifications TEXT NOT NULL,
                benefits TEXT NOT NULL
            );
        ";
        mysqli_query($conn, $createTableJobSql);
        $createTableEoiSql = "
            CREATE TABLE IF NOT EXISTS eoi (
                eoi_number INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                job_ref_number VARCHAR(5) NOT NULL,
                first_name VARCHAR(20) NOT NULL,
                last_name VARCHAR(20) NOT NULL,
                dob DATE, 
                gender ENUM('Male', 'Female', 'Other'),
                street_address VARCHAR(40) NOT NULL,
                suburb VARCHAR(150) NOT NULL,
                state ENUM('VIC','NSW','QLD','NT','WA','SA','TAS','ACT'),
                postcode CHAR(4) NOT NULL,
                email_address VARCHAR(255) NOT NULL UNIQUE,
                phone_number VARCHAR(15) NOT NULL,
                technical_writing BOOLEAN,  
                social_media_management BOOLEAN,  
                coding BOOLEAN,
                network_configuration BOOLEAN,
                hardware_deployment BOOLEAN,
                operating_system_knowledge BOOLEAN,
                database_management BOOLEAN,
                other_skills_text VARCHAR(255),
                status ENUM('New', 'Current', 'Final') DEFAULT 'New',
                FOREIGN KEY (job_ref_number) REFERENCES jobs(job_ref_number)
            )";
        mysqli_query($conn, $createTableEoiSql);
        if (isset($_POST["job_title"])) {
            $job_title = $_POST["job_title"];
        }
        else {
            echo "<p>Error: Enter other skill data in the <a href=\"jobManage.php\">form</a></p>";
        }

        if (isset($_POST["location"])) {
            $location = $_POST["location"];
        }
        else {
            echo "<p>Error: Enter other skill data in the <a href=\"jobManage.php\">form</a></p>";
        }

        if (isset($_POST["type"])) {
            $type = $_POST["type"];
        }
        else {
            echo "<p>Error: Enter other skill data in the <a href=\"jobManage.php\">form</a></p>";
        }

        if (isset($_POST["annual_salary"])) {
            $annual_salary = $_POST["annual_salary"];
        }
        else {
            echo "<p>Error: Enter other skill data in the <a href=\"jobManage.php\">form</a></p>";
        }

        if (isset($_POST["job_ref_number"])) {
            $job_ref_number = $_POST["job_ref_number"];
        }
        else    
            echo "<p>No job_ref_number selected</p>";

        if (isset($_POST["job_title_slug"])) {
            $job_title_slug = $_POST["job_title_slug"];
        }
        else {
            echo "<p>Error: Enter other skill data in the <a href=\"jobManage.php\">form</a></p>";
        }
        
            
        if (isset($_POST["position_overview"])) {
            $position_overview = $_POST["position_overview"];
        }
        else {
            echo "<p>Error: Enter other skill data in the <a href=\"jobManage.php\">form</a></p>";

        }

        if (isset($_POST["responsibilities"])) {
            $responsibilities = $_POST["responsibilities"];
        }
        else {
            echo "<p>Error: Enter other skill data in the <a href=\"jobManage.php\">form</a></p>";

        }

        if (isset($_POST["qualifications"])) {
            $qualifications = $_POST["qualifications"];
        }
        else {
            echo "<p>Error: Enter other skill data in the <a href=\"jobManage.php\">form</a></p>";
        }
            
        if (isset($_POST["benefits"])) {
            $benefits = $_POST["benefits"];
        }
        else {
            echo "<p>Error: Enter other skill data in the <a href=\"jobManage.php\">form</a></p>";
        }


        // echo "<p>This is a test: Your job_title is $job_title</p>";
        // echo "<p>This is a test: Your location is $location</p>";
        // echo "<p>This is a test: Your type is $type</p>";
        // echo "<p>This is a test: Your annual_salary is $annual_salary</p>";
        // echo "<p>This is a test: Your job_ref_number is $job_ref_number</p>";
        // echo "<p>This is a test: Your job_title_slug is $job_title_slug</p>";
        // echo "<p>This is a test: Your location is $position_overview</p>";
        // echo "<p>This is a test: Your responsibilities is $responsibilities</p>";
        // echo "<p>This is a test: Your qualifications is $qualifications</p>";
        // echo "<p>This is a test: Your benefits is $benefits</p>";

        function sanitise_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $job_title = sanitise_input($job_title);
        $location = sanitise_input($location);
        $job_ref_number = sanitise_input($job_ref_number);

        $stmt = $conn->prepare("INSERT INTO jobs (job_ref_number, job_title, job_title_slug, location, type, annual_salary, position_overview, responsibilities, qualifications, benefits) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssssdssss", 
            $job_ref_number, 
            $job_title, 
            $job_title_slug, 
            $location, 
            $type, 
            $annual_salary, 
            $position_overview, 
            $responsibilities, 
            $qualifications, 
            $benefits
        );

        if ($stmt->execute()) {
            echo "New record created successfully";
            header('Location: jobs.php');
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();


        // $insertJobTable = "
        //     INSERT INTO jobs (
        //         job_ref_number, 
        //         job_title, 
        //         job_title_slug,
        //         location, 
        //         type, 
        //         annual_salary, 
        //         position_overview,
        //         responsibilities,
        //         qualifications, 
        //         benefits
        //     ) VALUES (
        //         '$job_ref_number', 
        //         '$job_title', 
        //         '$job_title_slug', 
        //         '$location', 
        //         '$type', 
        //         $annual_salary,
        //         '$position_overview', 
        //         '$responsibilities',
        //         '$qualifications',
        //         '$benefits'
        //     )";
        //     echo $insertJobTable;
        //     $result = mysqli_query($conn, $insertJobTable);
    }
    ?>
</body>
</html>
