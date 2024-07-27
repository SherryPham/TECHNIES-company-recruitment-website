<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Thi Minh Ha Nguyen" />
    <meta name="description" content="Job Management Page">
    <title>Job Management</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <?php

    session_start();

    // Predefined password
    $predefined_password = 'YourSecretPassword';

    $authenticationError = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password'])) {
        if ($_POST['password'] === $predefined_password) {
            $_SESSION['authenticated'] = true;
        } else {
            $authenticationError = true;
        }
    }

    if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
        echo '<div class="authentication-overlay">';
        echo '<div class="auth-box">';
        if ($authenticationError) {
            echo '<p class="auth-error">Authentication incorrect. Please try again.</p>';
        }
        echo '<form class="auth-form" method="post" action="">
                <label for="password">Enter password:</label>
                <input type="password" name="password" required>
                <div class="auth-buttons">
                    <input type="submit" value="Submit" class="auth-submit-btn">
                    <button onclick="location.href=\'index.php\';" class="auth-back-btn">Back to Home</button>
                </div>
            </form>';
        echo '</div>';
        echo '</div>';
        exit();
    }
    ?>

    <?php include('header.inc'); ?>
    <section id="job-manage-form">
        <div class="row wrap-box">
            <div class="header">
                <h2>Create a New Job Posting</h2>
            </div>
            <div class="text">
                <p>Please Fill Out the Form Below for a New Job Posting!</p>
            </div>
        </div>
    </section>

            
    <form id="job-posting-form" action="processJob.php" method="post" onsubmit="return validateForm();" class="apply-form">
        <div class="form-group">
            <fieldset>
                <legend>Job Information</legend>
                <div class="form-data">
                    <label for="job_title">Job Title:</label>
                    <input type="text" id="job_title" name="job_title" required>
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required>
                    <input type="radio" id="partTime" name="type" value="Part Time" required>
                    <label for="partTime">Part Time</label>
                    <input type="radio" id="fullTime" name="type" value="Full Time" required>
                    <label for="fullTime">Full Time</label>
                    <div class="job-form-data">
                    <label for="annual_salary">Annual Salary:</label>
                    <input type="number" id="annual_salary" name="annual_salary" required>
                    <label for="job_ref_number">JRN:</label>
                    <input type="text" id="job_ref_number" name="job_ref_number" minlength="5" maxlength="5" required placeholder="Exactly 5 characters">
                    <label for="job_ref_number">Job Title Slug:</label>
                    <input type="text" id="job_title_slug" name="job_title_slug" required>
                </div>
            </fieldset>
        </div>
        <div class="form-group">
            <fieldset>
                <legend>Job Details:</legend>
                <div class="form-data">
                    <label for="position_overview">Position Overview:</label>
                    <textarea id="position_overview" name="position_overview" required></textarea>
                    <label for="responsibilities">Responsibilities:</label>
                    <textarea id="responsibilities" name="responsibilities" rows="5" placeholder="Please use enter to separate" required></textarea>
                    <label for="qualifications">Qualifications:</label>
                    <textarea id="qualifications" name="qualifications" rows="5" placeholder="Please use enter to separate" required></textarea>
                    <label for="benefits">Benefits:</label>
                    <textarea id="benefits" name="benefits" rows="5" placeholder="Please use enter to separate" required></textarea>
                </div>
            </fieldset>
        </div>

        <div class="button-group">
            <div class="btn-wrapper" id="reset">
                <button class="button" type="reset" name="reset">Reset</button>
            </div>
            <div class="btn-wrapper" id="upload">
                <button class="button" type="submit" name="upload">Upload</button>
            </div>
        </div>


    </form>
    <!-- Footer section -->
	<?php include('footer.inc'); ?>

</body>

</html>