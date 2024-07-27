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
        //Check if process was triggered by a form submit if not display an error message
        if (isset($_POST["firstname"])) {
            $first_name = $_POST["firstname"];
        }
        else {
            // Display error message, if process not triggered by a form submit
            echo "<p>Error: Enter firstname data in the form</p>";
            // header ("location: apply.php");

        }
        // Check if last name is set
        if (isset($_POST["lastname"])) {
            $last_name = $_POST["lastname"];


        }
        else {
            echo "<p>Error: Enter lastname data in the <a href=\"apply.php\">form</a></p>";
        }

        // JRN
        if (isset($_POST["JobRefNum"])) {
            $job_ref_number = $_POST["JobRefNum"];
        }
        else {
            echo "<p>Error: Enter job reference number in the <a href=\"apply.php\">form</a></p>";
        }


        // DOB
        if (isset($_POST["DOB"])) {
            $dob = $_POST["DOB"];
        }
        else {
            echo "<p>Error: Enter date of birth data in the <a href=\"apply.php\">form</a></p>";
            
        }

        //gender
        if (isset($_POST["gender"])) {
            $gender = $_POST["gender"];
        }
        else    
            $gender = "Unknown";

        // street address
        if (isset($_POST["street"])) {
            $street_address = $_POST["street"];
        }
        else {
            echo "<p>Error: Enter street address data in the <a href=\"apply.php\">form</a></p>";
        }

        // suburb/town
        if (isset($_POST["suburb"])) {
            $suburb = $_POST["suburb"];
        }
        else {
            echo "<p>Error: Enter suburb/town data in the <a href=\"apply.php\">form</a></p>";
        }

        //State
        if (isset($_POST["state"])) {
            $state = $_POST["state"];
        }
        else    
            $state = "No state selected";

        // postcode
        if (isset($_POST["postcode"])) {
            $postcode = $_POST["postcode"];
        }
        else {
            echo "<p>Error: Enter postcode data in the <a href=\"apply.php\">form</a></p>";
        }
        
        // email
        if (isset($_POST["email_address"])) {
            $email_address = $_POST["email_address"];
        }
        else {
            echo "<p>Error: Enter email data in the <a href=\"apply.php\">form</a></p>";
        }

        // phone
        if (isset($_POST["phone"])) {
            $phone_number = $_POST["phone"];
        }
        else {
            echo "<p>Error: Enter phone number data in the <a href=\"apply.php\">form</a></p>";
        }
        
        //skills
        $technical_writing = isset($_POST["technical_writing"]) ? 1 : 0;
        $social_media_management = isset($_POST["social_media_management"]) ? 1 : 0;

        $coding = isset($_POST["coding"]) ? 1 : 0;

        $network_configuration = isset($_POST["network_configuration"]) ? 1 : 0;

        $hardware_deployment = isset($_POST["hardware_deployment"]) ? 1 : 0;

        $operating_system_knowledge = isset($_POST["operating_system_knowledge"]) ? 1 : 0;

        $database_management = isset($_POST["database_management"]) ? 1 : 0;


       

        if (isset($_POST["other_skills"])) {
            $other_skills_text = $_POST["other_skills_text"];
        }
        else { 
            echo "<p>Error: Enter other skill data in the <a href=\"apply.php\">form</a></p>";
        }

        // echo "<p>This is a test: Your first name is $first_name</p>";
        // echo "<p>This is a test: Your last name is $last_name</p>";
        // echo "<p>This is a test: Your JRN is $job_ref_number</p>";
        // echo "<p>This is a test: Your DOB is $dob</p>";
        // echo "<p>This is a test: Your gender is $gender</p>";
        // echo "<p>This is a test: Your street address is $street_address</p>";
        // echo "<p>This is a test: Your suburb is $suburb</p>";
        // echo "<p>This is a test: Your state is $state</p>";
        // echo "<p>This is a test: Your postcode is $postcode</p>";
        // echo "<p>This is a test: Your email is $email</p>";
        // echo "<p>This is a test: Your phone number is $phone_number</p>";
        // echo "<p>This is a test: Your technical_writing are $technical_writing</p>";
        // echo "<p>This is a test: Your social_media_management are $social_media_management</p>";
        // echo "<p>This is a test: Your coding are $coding</p>";
        // echo "<p>This is a test: Your network_configuration are $network_configuration</p>";
        // echo "<p>This is a test: Your hardware_deployment are $hardware_deployment</p>";
        // echo "<p>This is a test: Your operating_system_knowledge are $operating_system_knowledge</p>";
        // echo "<p>This is a test: Your database_management are $database_management</p>";
        // echo "<p>This is a test: Your other skill is $other_skills_text</p>";

        function sanitise_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $first_name = sanitise_input($first_name);
        $last_name = sanitise_input($last_name);
        $job_ref_number = sanitise_input($job_ref_number);
        $dob = sanitise_input($dob);
        $gender = sanitise_input($gender);
        $street_address = sanitise_input($street_address);
        $suburb = sanitise_input($suburb);
        $state = sanitise_input($state);
        $postcode = sanitise_input($postcode);
        $email = sanitise_input($email);
        $phone_number = sanitise_input($phone_number);
        $state = sanitise_input($state);


        // int preg_match ( string $pattern , string $variable)
        $errMsg = "";
        if ($first_name == "") {
            $errMsg .= "<p>You must enter your first name.</p>";
        }
        elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $first_name)) {
            $errMsg .= "<p>Only max 20 alpha letters allowed in your first name.</p>";
        }
        if ($last_name == "") {
            $errMsg .= "<p>You must enter your last name.</p>";
        }
        elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $last_name)) {
            $errMsg .= "<p>Only max 20 alpha letters allowed in your last name.</p>";
        }
        if (!preg_match("/^[a-zA-Z0-9]{5}$/", $job_ref_number)) {
            $errMsg .= "<p>Job Reference Number must be exactly 5 alphanumeric characters.</p>";
        }
        if (!preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/(19\d\d|200\d|201\d|202[0-3])$/", $dob)) {
            $errMsg .= "<p>Date of Birth is not in the correct format or not within the allowed range (1900-2023).</p>";
        }
        if (!preg_match("/^[a-zA-Z0-9\s]{1,40}$/", $street_address)) {
            $errMsg .= "<p>Street Address must be max 40 characters and can include numbers and spaces.</p>";
        }
        if (!preg_match("/^[a-zA-Z]{1,40}$/", $suburb)) {
            $errMsg .= "<p>Suburb/Town must be max 40 characters.</p>";
        }
        if (!preg_match("/^\d{4}$/", $postcode)) {
            echo "Postcode must be exactly 4 digits!";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format!";
        }
        if (!preg_match("/^[\d\s]{8,12}$/", $phone_number)) {
            echo "Phone number must contain 8 to 12 digits and can include spaces!";
        }
    

        // INSERT TO DB
        if ($errMsg != "") {
            echo "<p>$errMsg</p>";
        } else {
            $checkJobRefSql = "SELECT job_ref_number FROM jobs WHERE job_ref_number = ?";
            $stmt = $conn->prepare($checkJobRefSql);
            $stmt->bind_param("s", $job_ref_number);
            $stmt->execute();
            $stmt->store_result();
        
            if ($stmt->num_rows == 0) {
                // Job reference number does not exist in jobs table
                echo "<p>Error: The job reference number $job_ref_number does not exist in the jobs table. Please provide a valid reference number.</p>";
                exit();
            }
            $stmt->close();
            echo "insert eoi table";
        
            $insertEoiTable = "INSERT INTO eoi (
                job_ref_number, first_name, last_name, dob, gender, street_address, suburb, state, postcode, 
                email_address, phone_number, technical_writing, social_media_management, coding, network_configuration, 
                hardware_deployment, operating_system_knowledge, database_management, other_skills_text
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
            $stmt = $conn->prepare($insertEoiTable);
        
            if (!$stmt) {
                die("Preparation failed: " . $conn->error);
            }
        
            $bind = $stmt->bind_param("sssssssssssiiiiiiis", 
                $job_ref_number, $first_name, $last_name, $dob, $gender, $street_address, 
                $suburb, $state, $postcode, $email_address, $phone_number, $technical_writing, $social_media_management, 
                $coding, $network_configuration, $hardware_deployment, $operating_system_knowledge, $database_management, $other_skills_text
            );
            echo $bind;
        
            if (!$bind) {
                echo "not bind";
                die("Binding failed: " . $stmt->error);
            }
            echo "done bind";
        
            if ($stmt->execute()) {
                echo "<p>Record inserted successfully!</p>";
                header('Location: jobs.php');
            } else {
                die("Execution failed: " . $stmt->error);
            }        
            // $checkJobRefSql = "SELECT job_ref_number FROM jobs WHERE job_ref_number = '$job_ref_number'";
            // $checkResult = mysqli_query($conn, $checkJobRefSql);
            // if (mysqli_num_rows($checkResult) == 0) {
            //     // Job reference number does not exist in jobs table
            //     echo "<p>Error: The job reference number $job_ref_number does not exist in the jobs table. Please provide a valid reference number.</p>";
            //     // exit or redirect user to correct page
            //     exit();
            // }
            // $insertEoiTable = "
            // INSERT INTO eoi (
            //     job_ref_number, 
            //     first_name, 
            //     last_name, 
            //     dob, 
            //     gender, 
            //     street_address,
            //     suburb,
            //     state, 
            //     postcode, 
            //     email_address,
            //     phone_number, 
            //     technical_writing,  
            //     social_media_management,  
            //     coding,
            //     network_configuration,
            //     hardware_deployment,
            //     operating_system_knowledge ,
            //     database_management,
            //     other_skills_text
            // ) VALUES (
            //     '$job_ref_number', 
            //     '$first_name', 
            //     '$last_name', 
            //     '$dob', 
            //     '$gender', 
            //     '$street_address',
            //     '$suburb',
            //     '$state', 
            //     '$postcode', 
            //     '$email_address',
            //     '$phone_number', 
            //     $technical_writing,  
            //     $social_media_management,  
            //     $coding,
            //     $network_configuration,
            //     $hardware_deployment,
            //     $operating_system_knowledge ,
            //     $database_management,
            //     '$other_skills_text'
            // )";
            // echo $insertEoiTable;
            // $result = mysqli_query($conn, $insertEoiTable);
        }
    }
    ?>
</body>
</html>
