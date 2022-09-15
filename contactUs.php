<?php
require "app/Mailer.php";
use App\Mailer;
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/styles.css">
    <title>SMW GROUP</title>

</head>
<body>

<img class="logo" src="public/img/true-forgedLogo.png" alt="logo">

<h1 class="heading1">CONTACT US</h1>

<p class="comment" id="comment">
    True-Forged offers you best forged magnesium wheels
    that will make your car faster and more catchy.
    Our managers will find individual approach to every client
</p>


<button id="bck-btn" class="back-button" onclick="back()"><img src="public/img/arrow.png" alt="back"> Back</button>

<div class="lines" id="lines">
    <div class="fline"></div>
    <br>
    <div class="sline"></div>
    <br>
    <br>
    <div class="tline"></div>
</div>

<div id=hidden style="display:none;">

    <h2 class="heading2">Your message has been sent successfully!</h2>
    <p class="soc">
        We will email You shortly. Meantime, check our
        <a href="https://www.instagram.com/trueforged/">Instagram</a>
        and
        <a href="https://www.true-forged.com/wheels">Wheels</a>
    </p>

</div>

<div class="container" id="main_place">
    <div class="left">
        <p>For any inquiries:</p>
        <ul>
            <li class="list-email">forged@true-forged.com</li>
            <li class="list-number">+371 66221111</li>
            <li class="list-time">Mon-Fri, 9:00-18:00 (GMT+2)</li>
            <li class="list-location">Kr. Barona 3, LV-1050, Riga, Latvia</li>
        </ul>
    </div>

    <div class="right">
        <form id="product_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="name">Your name</label><br>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="email">Your e-mail</label><br>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="message">Message</label><br>
            <textarea name="message" id="message" cols="30" rows="5" required></textarea>
            <br>
            <input class="button" type="submit" name="submit" value="Send">
        </form>
    </div>
</div>

<?php
$mailer = new Mailer($_POST['name'], $_POST['email'], $_POST['message']);

    if (isset($_POST['submit'])) {
        $mailer->sendEmail();
    }
?>
<script src="public/animations.js"></script>
</body>
</html>

