<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Hassan Al Bayati" />
    <meta name="description" content="The Jobs page of my website.">

    <title>Enhancement Page</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
	<!-- Responsive header menu-->
	<?php include('header.inc'); ?>


    <section id="application-form">
        <div class="row wrap-box">
            <div class="header">
                <h2>Enhancement HTML + CSS</h2>
                <p class="enhancement-notification">We have made the following enhancements in our website</p>
            </div>
        </div>
    </section>

    <div class="enhancement-container">
        <div class="enhancement-cards">
            <img src="images/flexbox.png" alt="Flexbox" class="model-picture">
            <h2 class="type">Flexbox vs. Floating</h2>
            <p class="enhancement-card-description">
                The sections and components arrangement was first done by applying what I have been learned through our
                unit, which is floating. However, I got many troubles so quickly and it took me a lot of time to fix,
                which is quite annoying. I found an tutorial about Flexbox on CSS Trick, a very famous website for
                front-end developers.
                Flexbox, a CSS layout model, simplifies item arrangement within a
                container. Unlike the traditional float approach which often requires workarounds, Flexbox offers a
                straightforward method for creating dynamic, responsive layouts without the complexities of floating
                elements.
            </p>
            <a href="index.html#work-with-us"> Click me to see </a>
            <p class="enhancement-card-reference">
                References: <br>1. https://css-tricks.com/snippets/css/a-guide-to-flexbox/
                <br> 2. https://acciojob.com/blog/untitled-19/
            </p>

        </div>

        <div class="enhancement-cards">
            <img src="images/hover.png" alt="Hover" class="model-picture">
            <h2 class="type">Hover in CSS</h2>
            <p class="enhancement-card-description">The :hover pseudo-class in CSS provides an interactive visual cue,
                enhancing user experience. By changing styles on hover, users receive immediate feedback on elements
                they can interact with, making website navigation more intuitive and engaging. I got this enhancement by
                referencing W3School tutorials.
            </p>
            <a href="index.html#review"> Click me to see </a>
            <p class="enhancement-card-reference">
                References: <br>1. https://www.w3schools.com/cssref/sel_hover.php
                <br> 2. https://birdeatsbug.com/blog/creating-hover-effects-with-tailwind-css
            </p>

        </div>


        <div class="enhancement-cards">
            <img src="images/animation.png" alt="Animation" class="model-picture">
            <h2 class="type">Transition & Animation</h2>
            <p class="enhancement-card-description">In this website,
                I applied a lot of CSS transitions and animations, such as the review section on the home page,
                and all of the cards components. This idea was formed by reading the tutorial provided by W3C, and
                checking samples HTML, CSS design at codepen.
                CSS transitions and animations enhance user experience by
                introducing smooth, visual effects that capture attention and falicitate interactions
            </p>
            <a href="index.html#review"> Click me to see </a>
            <p class="enhancement-card-reference">
                References: <br>1. https://codepen.io/gerrardcss/details/poqNOwd
                <br>2. https://www.w3schools.com/css/tryit.asp?filename=trycss3_animation1
                <br>3. https://5balloons.info/how-to-create-custom-css-animations-in-tailwindcss

            </p>


        </div>
        <div class="enhancement-cards">
            <img src="images/responsive.jpeg" alt="Responsive" class="model-picture">
            <h2 class="type">Responsive</h2>
            <p class="enhancement-card-description">Responsive design in CSS ensures that digital interfaces adapt
                seamlessly across various device sizes and screen resolutions. At the beginning, I was thinking of
                hamburger toggle button, which is widely used by many web developer, to compress the menu item.
                However, we are not allowed to use Javascript, so I came up with easier solution. By using flex-wrap,
                I was able to make the menu responsive, so that the logo can be on the first line, while the entire menu
                options is on the second line of the header for mobile devices. Moreover, all the cards are responsive
                depend on the size of the device, with the help of media query and Flexbox.
            </p>
            <a href="index.html#navbar"> Click me to see </a>
            <p class="enhancement-card-reference">
                References:
                <br>1. https://www.w3schools.com/css/
                <br>2. https://www.w3schools.com/cssref/css3_pr_flex.php
                <br>3. https://www.tutorialspoint.com/css/css_responsive.htm

            </p>
        </div>

        <div class="enhancement-cards">
            <img src="images/Typewriter.jpg" alt="Typewriter" class="model-picture">
            <h2 class="type">Typewriter effects and cursor blink for text </h2>
            <p class="enhancement-card-description">Typewriter effects and cursor blinking for text using CSS are
                techniques used to simulate the appearance and behavior of a typewriter or terminal-style text
                display on a web page. These effects can add a nostalgic or retro feel to your website or emphasize
                certain text elements.
            </p>
            <a href="apply.html#typewriter"> Click me to see </a>
        </div>


    </div>


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
            <img src="images/flexbox.png" alt="Flexbox" class="model-picture">
            <h2 class="type">Job Management</h2>
            <p class="enhancement-card-description">
                BE HA DIEN THEM
                (
                In the past, job listing is hard coded => when the company expand => need to manually edit the webpage and deploy
                With the jobmanage.php => we can dynamically create new job description and the job content will automatically be updated inside jobs.php
                Also, we can dynamically update the image for description.

                )
            </p>
            <a href="index.html#work-with-us"> Click me to see </a>
            <p class="enhancement-card-reference">
                References: <br>1. https://css-tricks.com/snippets/css/a-guide-to-flexbox/
                <br> 2. https://acciojob.com/blog/untitled-19/
            </p>

        </div>

        <div class="enhancement-cards">
            <img src="images/hover.png" alt="Hover" class="model-picture">
            <h2 class="type">Security Improvement</h2>
            <p class="enhancement-card-description">
                Prepare SQL query instead of direct query => avoid sql injection (mo ta ki ra)

                For the page EOI management + Job Management, we apply the authentication with a secret password. Only admin who have the password can get access to that page

            </p>
            <a href="index.html#review"> Click me to see </a>
            <p class="enhancement-card-reference">
                References: <br>1. https://www.w3schools.com/cssref/sel_hover.php
                <br> 2. https://birdeatsbug.com/blog/creating-hover-effects-with-tailwind-css
            </p>

        </div>
    </div>

	<!-- Footer section -->
	<?php include('footer.inc'); ?>

</body>
</html>