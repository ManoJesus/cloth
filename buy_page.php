<?php
    require_once ('components.php');

    if(isset($_COOKIE['isLogged']) && !empty($_COOKIE['isLogged'])){
        $isLogged = $_COOKIE['isLogged'];
    }else{
        $isLogged = false;
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
    <?php header_nav($isLogged); ?>
</header>

<main>
    <div class="container__buy">
        <div class="product__image">

        </div>
        <div class="buy-information">
            <div class="product-information">
                <form action="cart.php" class="buy__form" method="post">
                    <span class="product__name"></span>
                    <span class="product__price"></span>
                    <span class="quantity"></span>
                    <input type="number" name="quantity" id="quantity" min="0" max="99">
                </form>

            </div>
            <div class="product-description">

            </div>
        </div>
    </div>
</main>

<footer>
    <?php footer(); ?>
</footer>

</body>
</html>
