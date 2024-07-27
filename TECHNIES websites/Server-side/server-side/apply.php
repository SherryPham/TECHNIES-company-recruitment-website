<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="apply form">
    <meta name="author" content="Tran Anh Thu Pham">
    <meta name="keywords" content="IT, jobs, application">
    <title>IT jobs application form</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
	<!-- Responsive header menu-->
	<?php include('header.inc'); ?>

    <section id="application-form">
        <div class="row wrap-box">
            <div class="header">
                <h2>Application form</h2>
            </div>
            <div class="text">
                <p>Please Fill Out the Form Below to Submit Your Job Application!</p>
            </div>
        </div>
    </section>

    <form id="job-form" method="post" action="processEOI.php" novalidate= "novalidate">
        <div class="JRN">
            <fieldset>
                <legend>Job reference number</legend>
                <div class="rfn">
                    <label for="refNumr">Please fill in reference number of job you want to apply:</label>
                    <input type="text" name="JobRefNum" maxlength="5" minlength="5" id="refNumr" required="required" />
                </div>
            </fieldset>
        </div>

        <div class="name">
            <fieldset>
                <legend>Name</legend>
                <p><label for="first">First name:</label>
                    <input type="text" name="firstname" maxlength="20" id="firstname" required="required" />
                </p>
                <p><label for="last">Last name:</label>
                    <input type="text" name="lastname" maxlength="20" id="lastname" required="required" />
                </p>
            </fieldset>
        </div>

        <div class="DOB">
            <p><label>Date of birth:
                    <input type="text" name="DOB" placeholder="dd/mm/yy" /></label></p>
        </div>

        <div class="gender">
            <fieldset>
                <legend>Gender</legend>
                <label><input type="radio" name="gender" value="Male" required="required" />Male</label>
                <label><input type="radio" name="gender" value="Female" />Female</label>
                <label><input type="radio" name="gender" value="Other" />Prefer not to respond</label>
            </fieldset>
        </div>

        <div class="address">
            <fieldset>
                <legend>Address</legend>
                <p><label for="street">Street Address</label>
                    <input type="text" id="street" name="street" maxlength="40" required="required" />
                </p>
                <p><label for="suburb">Suburb/town</label>
                    <input type="text" id="suburb" name="suburb" maxlength="40" required="required" />
                </p>
                <p>
                    <label for="state">State</label>
                    <select name="state" id="state" required="required">
                        <option value="">Please select your state</option>
                        <option value="NSW">New South Wales</option>
                        <option value="VIC">Victoria</option>
                        <option value="QLD">Queensland</option>
                        <option value="WA">Western Australia</option>
                        <option value="SA">South Australia</option>
                        <option value="TAS">Tasmania</option>
                        <option value="ACT">Australia Capital Territory</option>
                        <option value="NT">Northern Territory</option>
                    </select>
                </p>
                <p><label for="postcode">Postcode</label>
                    <input type="text" id="postcode" name="postcode" maxlength="4" minlength="4" required="required" />
                </p>
            </fieldset>
        </div>

        <div class="contact">
            <fieldset>
                <legend>Contact Information</legend>
                <p><label for="email_address">Email Address</label>
                    <input type="text" id="email_address" name="email_address" placeholder="Enter your email"
                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" required="required" />
                </p>
                <p><label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter your phone number" pattern="^[0-9]{10}$"
                        required="required" />
                </p>
            </fieldset>
        </div>

        <div class="skill">
            <fieldset>
                <legend>Skills</legend>
                <label><input type="checkbox" name="technical_writing" value="technical_writing" />Technical Writing</label>
                <br>
                <label><input type="checkbox" name="social_media_management" value="social_media_management" />Social media management</label>
                <br>
                <label><input type="checkbox" name="coding" value="coding" />Coding</label>
                <br>
                <label><input type="checkbox" name="network_configuration" value="network_configuration" />Network configuration</label>
                <br>
                <label><input type="checkbox" name="hardware_deployment" value="hardware_deployment" />Hardware deployment</label>
                <br>
                <label><input type="checkbox" name="operating_system_knowledge" value="operating_system_knowledge" />Operating system knowledge</label>
                <br>
                <label><input type="checkbox" name="database_management" value="database_management" />Database management</label>
                <br>
                <label><input type="checkbox" name="other_skills" value="other_skills" />Other skills</label>

                <p><label>Your other skills <br />
                        <textarea name="other_skills_text" rows="5" cols="50"
                            placeholder="Tell us more about your other skills..."></textarea></label>
                </p>
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

            <p>__________________________________________________________________________________________________________________________________________________________________
            </p>
            <p>__________________________________________________________________________________________________________________________________________________________________
            </p>

    </form>

	<!-- Footer section -->
	<?php include('footer.inc'); ?>
</body>

</html>
