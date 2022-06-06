<?php
require_once('components.php');

include('classes/Service/ProductService.php');
if(isset($_COOKIE['isLogged']) && !empty($_COOKIE['isLogged'])){
    $isLogged = $_COOKIE['isLogged'];
}else{
    $isLogged = false;
}

    $product_service = new ProductService();
    $products =  $product_service->getAllByGender('k');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheets/main.css">
    <title>CLOTH</title>
</head>
<body>
<header>
    <?php header_nav($isLogged); ?>
</header>

<main>
    <?php main_content_card('Kids', $products);?>
</main>

<footer>
    <?php footer(); ?>
</footer>

</body>
</html>
