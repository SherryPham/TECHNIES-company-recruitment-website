<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Thi Minh Ha Nguyen">
    <meta name="description" content="PHP Enhancement.">

    <title>Enhancement Page</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
	<!-- Responsive header menu-->
	<?php include('header.inc'); ?>
    <section>
        <div class="row wrap-box">
            <div class="header">
                <h2>Enhancement PHP</h2>
                <p class="enhancement-notification">The new enhancement we have made:</p>
            </div>
        </div>
    </section>
    <div class="enhancement-container">
        <div class="enhancement-cards">
            <img src="images/jobmanagement.webp" alt="jobManage" class="model-picture">
            <h2 class="type">Job Management</h2>
            <p class="enhancement-card-description">
            Previously, job listings were static, demanding manual updates for every new position. 
            With our revamped jobmanage.php, we've introduced a dynamic system. Administrators can now 
            effortlessly add job descriptions, which are auto-updated on the jobs.php page. This enhancement also 
            supports on-the-fly image link, ensuring listings are current and visually engaging.
            </p>
            <a href="jobManage.php"> Click me to see </a>
            <p class="enhancement-card-reference">
                References: <br>1. https://www.simplilearn.com/tutorials/php-tutorial/php-crud-operations
                <br> 2. https://www.w3schools.com/php/
            </p>

        </div>

        <div class="enhancement-cards">
            <img src="images/internet-security.webp" alt="Hover" class="model-picture">
            <h2 class="type">Security Improvement</h2>
            <p class="enhancement-card-description">
            To enhance our website's security, we've implemented a session-based authentication mechanism for 
            critical sections. Upon access attempts, users are prompted for a predefined password. A successful 
            match grants access, while mismatches trigger an authentication error. This ensures that only authorized 
            individuals can access and modify sensitive areas, safeguarding the site's integrity and confidential data.

            </p>
            <a href="jobManage.php"> Click me to see </a>
            <p class="enhancement-card-reference">
                References:
                <br> 1. https://phppot.com/php/php-login-script-with-session/
            </p>

        </div>

        <div class="enhancement-cards">
            <img src="images/sql_injection_protection.png" alt="SqlInjectionProtection" class="model-picture">
            <h2 class="type">SQL Injection Protection</h2>
            <p class="enhancement-card-description">
            SQL injection allows attackers to manipulate database queries, leading to unauthorized data access. 
            Traditional queries are vulnerable as they mix SQL and user data. To combat this, we've implemented 
            prepared statements. This method separates SQL from user data, safeguarding our database and ensuring 
            data security.
            </p>
            <a href="apply.php"> Click me to see </a>
            <p class="enhancement-card-reference">
                References: <br>1. https://www.w3schools.com/sql/sql_injection.asp
                <br> 2. https://en.wikipedia.org/wiki/SQL_injection
            </p>

        </div>

        <div class="enhancement-cards">
            <img src="images/data_integrity.jpeg" alt="SqlInjectionProtection" class="model-picture">
            <h2 class="type">Data Integrity</h2>
            <p class="enhancement-card-description">
            To ensure data integrity within our website, a vital enhancement was implemented between the 'jobs' and 
            'eoi' tables. The primary key in the 'jobs' table is 'job_ref_number', which is meticulously referenced 
            as a foreign key in the 'eoi' table. When a new application is submitted through 'eoi', the system 
            cross-checks the 'job_ref_number' to confirm that the job position is currently available. This linkage 
            not only maintains database consistency but also ensures that applications are aligned with active job 
            listings.

            </p>
            <a href="apply.php"> Click me to see </a>
            <p class="enhancement-card-reference">
                References: <br>1. https://www.shutterstock.com/vi/search/data-integrity-abstract
                <br> 2. https://www.scaler.com/topics/data-integrity-in-sql/
            </p>

        </div>
    </div>

	<!-- Footer section -->
	<?php include('footer.inc'); ?>

</body>
</html>