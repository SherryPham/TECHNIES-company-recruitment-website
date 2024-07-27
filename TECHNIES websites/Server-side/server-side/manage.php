
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="apply form">
    <meta name="author" content="Thi Minh Ha Nguyen">
    <title>EOI Management</title>
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


require_once("settings.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');
$conn = @mysqli_connect(
    $host,
    $user,
    $pwd,
    $sql_db
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // List All EOIs
    if (isset($_POST['listAll'])) {
        $sql = "SELECT * FROM eoi";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    }

    // Search by Job Reference
    elseif (isset($_POST['searchByJobRef']) && !empty($_POST['jobReference'])) {
        $jobRef = $_POST['jobReference'];
        $stmt = mysqli_prepare($conn, "SELECT * FROM eoi WHERE job_ref_number = ?");
        mysqli_stmt_bind_param($stmt, 's', $jobRef);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    }

    // Search by Applicant
    elseif (isset($_POST['searchByApplicant']) && !empty($_POST['firstName']) && !empty($_POST['lastName'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        
        $stmt = mysqli_prepare($conn, "SELECT * FROM eoi WHERE first_name = ? AND last_name = ?");
        mysqli_stmt_bind_param($stmt, 'ss', $firstName, $lastName);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    }

    // Delete by Job Reference
    elseif (isset($_POST['deleteByJobRef']) && !empty($_POST['deleteJobRef'])) {
        $deleteJobRef = $_POST['deleteJobRef'];

        $stmt = mysqli_prepare($conn, "DELETE FROM eoi WHERE job_ref_number = ?");
        mysqli_stmt_bind_param($stmt, 's', $deleteJobRef);
        mysqli_stmt_execute($stmt);
        
        $results[] = "Deleted EOIs with Job Reference: " . $deleteJobRef;
    }

    // Change the Status of an EOI
    elseif (isset($_POST['changeStatus']) && !empty($_POST['eoiNumber']) && !empty($_POST['newStatus'])) {
        $eoiNumber = $_POST['eoiNumber'];
        $newStatus = $_POST['newStatus'];

        $stmt = mysqli_prepare($conn, "UPDATE eoi SET status = ? WHERE eoi_number = ?");
        mysqli_stmt_bind_param($stmt, 'si', $newStatus, $eoiNumber);
        mysqli_stmt_execute($stmt);
        
        $results[] = "Updated status for EOI " . $eoiNumber . " to " . ucfirst($newStatus);
    }
}




?>

<?php include('header.inc'); ?>
<section id="application-form">
    <div class="row wrap-box">
        <div class="header">
            <h2>EOI Management Dashboard</h2>
        </div>
    </div>
</section>

<form id="list-eoi-form" method="post" action="">
    <div class="form-group">
        <fieldset>
            <legend>List All EOIs</legend>
            <div class="form-data">
                <input type="submit" name="listAll" value="List All EOIs">
            </div>
        </fieldset>
    </div>
</form>

<form id="search-by-job-form" method="post" action="">
    <div class="form-group">
        <fieldset>
            <legend>Search by Job Reference</legend>
            <div class="form-data">
                <label for="jobReference">Job Reference:</label>
                <input type="text" name="jobReference" required>
                <input type="submit" name="searchByJobRef" value="Search">
            </div>
        </fieldset>
    </div>
</form>

<form id="search-by-applicant-form" method="post" action="">
    <div class="form-group">
        <fieldset>
            <legend>Search by Applicant</legend>
            <div class="form-data">
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" required>
                <label for="lastName">Last Name:</label>
                <input type="text" name="lastName" required>
                <input type="submit" name="searchByApplicant" value="Search">
            </div>
        </fieldset>
    </div>
</form>

<form id="delete-eoi-form" method="post" action="">
    <div class="form-group">
        <fieldset>
            <legend>Delete EOIs</legend>
            <div class="form-data">
                <label for="deleteJobRef">Job Reference to Delete:</label>
                <input type="text" name="deleteJobRef" required>
                <input type="submit" name="deleteByJobRef" value="Delete">
            </div>
        </fieldset>
    </div>
</form>

<form id="update-eoi-form" method="post" action="">
    <div class="form-group">
        <fieldset>
            <legend>Update EOI Status</legend>
            <div class="form-data">
                <label for="eoiNumber">EOI Number:</label>
                <input type="text" name="eoiNumber" required>
                <label for="newStatus">New Status:</label>
                <select name="newStatus">
                    <option value="New">New</option>
                    <option value="Current">Current</option>
                    <option value="Final">Final</option>
                </select>
                <input type="submit" name="changeStatus" value="Update Status">
            </div>
        </fieldset>
    </div>
</form>


<!-- 1. List all EOIs -->
<!-- <fieldset>
    <legend>List All EOIs</legend>
    <form method="post" action="">
        <input type="submit" name="listAll" value="List All EOIs">
    </form>
</fieldset> -->

<!-- <fieldset>
    <legend>Search by Job Reference</legend>
    <form method="post" action="">
        <label for="jobReference">Job Reference:</label>
        <input type="text" name="jobReference" required>
        <input type="submit" name="searchByJobRef" value="Search">
    </form>
</fieldset> -->

<!-- <fieldset>
    <legend>Search by Applicant</legend>
    <form method="post" action="">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" required>
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required>
        <input type="submit" name="searchByApplicant" value="Search">
    </form>
</fieldset> -->

<!-- <fieldset>
    <legend>Delete EOIs</legend>
    <form method="post" action="">
        <label for="deleteJobRef">Job Reference to Delete:</label>
        <input type="text" name="deleteJobRef" required>
        <input type="submit" name="deleteByJobRef" value="Delete">
    </form>
</fieldset> -->

<!-- <fieldset>
    <legend>Update EOI Status</legend>
    <form method="post" action="">
        <label for="eoiNumber">EOI Number:</label>
        <input type="text" name="eoiNumber" required>
        <label for="newStatus">New Status:</label>
        <select name="newStatus">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
        <input type="submit" name="changeStatus" value="Update Status">
    </form>
</fieldset> -->

<!-- Display Results -->
<div>
<?php

$columnMapping = array(
    "eoi_number"                   => "EOI Number",
    "job_ref_number"               => "Job Reference Number",
    "first_name"                   => "First Name",
    "last_name"                    => "Last Name",
    "dob"                          => "Date of Birth",
    "gender"                       => "Gender",
    "street_address"               => "Street Address",
    "suburb"                       => "Suburb",
    "state"                        => "State",
    "postcode"                     => "Postcode",
    "email_address"                => "Email Address",
    "phone_number"                 => "Phone Number",
    "technical_writing"            => "Technical Writing",
    "social_media_management"      => "Social Media Management",
    "coding"                       => "Coding",
    "network_configuration"        => "Network Configuration",
    "hardware_deployment"          => "Hardware Deployment",
    "operating_system_knowledge"   => "OS Knowledge",
    "database_management"          => "Database Management",
    "other_skills_text"            => "Other Skills",
    "status"                       => "Status"
);

if (isset($results) && !empty($results)) {
    echo '<div class="scrollable-horizontal-table">';  // Start of the wrapping div
    echo '<table>';
    
    // Check if the first item in the results array is an array itself
    // which would mean we're dealing with database results
    if (is_array($results[0])) {
        // Display table headers based on the keys from the first result
        echo '<thead><tr>';
        foreach ($results[0] as $key => $value) {
            echo "<th>" . (isset($columnMapping[$key]) ? $columnMapping[$key] : ucfirst($key)) . "</th>";
        }
        echo '</tr></thead>';

        // Display table data
        echo '<tbody>';
        foreach ($results as $row) {
            echo '<tr>';
            foreach ($row as $key => $data) {
                // Check if the data is a TINYINT(1) value
                if ($data === "1") {
                    echo "<td>Yes</td>";
                } elseif ($data === "0") {
                    echo "<td>No</td>";
                } else {
                    echo "<td>" . htmlspecialchars($data) . "</td>";
                }
            }
            echo '</tr>';
        }
        echo '</tbody>';
    } else {
        // If the results array doesn't contain arrays, it's just messages or feedback.
        // We still use a table to keep consistency in design.
        echo '<tbody>';
        foreach ($results as $result) {
            echo '<tr><td>' . htmlspecialchars($result) . '</td></tr>';
        }
        echo '</tbody>';
    }

    echo '</table>';
    echo '</div>';  // End of the wrapping div
}
?>

</div>
<?php include('footer.inc'); ?>

</body>
</html> 