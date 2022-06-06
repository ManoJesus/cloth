<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("classes/Service/UserService.php");

//starting session
session_start();

$_SESSION['attempts'] = $_SESSION['attempts'] ?? 3; // $_SESSION['attempts'] = isset($_SESSION['attempts']) ? $_SESSION['attempts'] : 3;
$_SESSION['failedToSignIn'] = $_SESSION['failedToSignIn'] ?? false; // $_SESSION['failedToSignIn'] = isset($_SESSION['failedToSignIn']) ? $_SESSION['failedToSignIn'] : false;
$_SESSION['error'] = $_SESSION['error'] ?? ""; // $_SESSION['error'] = isset($_SESSION['error']) ? $_SESSION['error'] : "";


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $user_service = new UserService();
    if(!$user_service->verify_user($email,$password)){
        if(--$_SESSION['attempts'] > 0){
            $_SESSION['error'] = "Email or password invalid. You have ". $_SESSION['attempts'] ." attempts left";
            $_SESSION['failedToSignIn'] = false;
        }else{
            $_SESSION['error'] = "No attempts left";
            $_SESSION['failedToSignIn'] = true;
        }
    }else {
        $_SESSION['error'] = "";

        setcookie('email', $email, time() + 60 * 60 * 24 * 30);
        setcookie('isLogged', true, time() + 60 * 60 * 24 * 30);

        header('Location: index.php');
    }
}else if((isset($_COOKIE['email']) && !empty($_COOKIE['email']))){
    header('Location: index.php');
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
    <link rel="stylesheet" href="stylesheets/signin.css">
    <title>CLOTH - sing in</title>
</head>
<body>
<header>
    <div class="container__logo">
        <a href="index.php">CLOTH</a>
    </div>
</header>
<main>
    <div class="container__form">
        <p>Sign In</p>
        <form method="post">
            <input type="hidden" id="failed_sign_in" value=<?php echo $_SESSION['failedToSignIn']?>>
            <span id="sign_in_failed"><?php echo $_SESSION['error']; ?></span>
            <div class="input__area">
                <input class="input__field" type="email" name="email" id="email" placeholder="Email">
                <span class="line__input"></span>
            </div>
            <div class="input__area">
                <input class="input__field" type="password" name="password" id="password" placeholder="Password">
                <span class="line__input"></span>
            </div>
            <span class="create_account">Don't have an account? <a href="signup.php" id="create__account__link">Click here to create</a></span>
            <input class="btn btn_submit" type="submit" name="submit" value="SIGN IN" id="submit">
        </form>
    </div>
</main>

<footer>
    <ul class="footer__list">
        <li class="footer__item"><a href="">Terms and Conditions</a></li>
        <li class="footer__item"><a href="">Support Us</a></li>
        <li class="footer__item"><a href="">SAC</a></li>
        <li class="footer__item">
            <p>Quality and Security</p>
            <ul class="labels__list">
                <li class="label__item"><img src="site_images/footer_label_top3_ibest.png" alt="" class="label__img"></li>
                <li class="label__item"><img src="site_images/label-blindado.png" alt="" class="label__img" id="site_blindado"></li>
                <li class="label__item"><img src="site_images/label-reclameaqui.png" alt="" class="label__img"></li>
                <li class="label__item"><img src="site_images/label_ebit.png" alt="" class="label__img"></li>
            </ul>
        </li>
    </ul>
    <p>Developed By ManoJesus.Inc</p>
</footer>

<script type="text/javascript" src="javascript/signIn.js"></script>
</body>
</html>