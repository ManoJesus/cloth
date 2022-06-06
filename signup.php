<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ('components.php');
include("classes/Service/UserService.php");

$userService = new UserService();


if(isset($_POST["submit"])){
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = new User($first_name,$last_name,$email,$password);

    $userService->createUser($user);

    header("Location: signin.php");
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheets/main.css">
    <link rel="stylesheet" href="stylesheets/signup.css">
    <title>CLOTH - sing in</title>
</head>
<body>
<header>
    <?php header_no_nav();?>
</header>
<main>
    <div class="container__form">
        <p>Sign up</p>
        <form method="post" id="form">
            <span class="form_error"></span>
            <div class="input__area">
                <input class="input__field " type="text" name="first_name" id="first_name" placeholder="Firstname">
                <span class="line__input"></span>
            </div>
            <div class="input__area">
                <input class="input__field " type="text" name="last_name" id="last_name" placeholder="Lastname">
                <span class="line__input"></span>
            </div>
            <div class="input__area">
                <input class="input__field" type="email" name="email" id="email" placeholder="Email">
                <span class="line__input"></span>
            </div>
            <div class="input__area">
                <input class="input__field" type="password" name="password" id="password" placeholder="Password">
                <span class="line__input"></span>
            </div>
            <div class="input__area">
                <span class="password_error"></span>
                <input class="input__field " type="password" name="cpassword" id="cpassword"
                       placeholder="Confirm Password">
                <span class="line__input"></span>
            </div>
            <input class="btn btn_submit" type="submit" name="submit" value="SIGN UP" id="submit">
        </form>
    </div>
</main>

<footer>
   <?php footer();?>
</footer>


<script type="text/javascript" src="javascript/signup.js"></script>
</body>
</html>
