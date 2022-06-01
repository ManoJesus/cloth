<?php
require_once('components.php');

include('classes/Connection.php');
if(isset($_COOKIE['isLogged']) && !empty($_COOKIE['isLogged'])){
    $isLogged = $_COOKIE['isLogged'];
}else{
    $isLogged = false;
}

//TODO change it to a product service
$conn = ConnectionManager::getConnection("project_php_a3");
$sql = "select * from product where gender = 'k'";
$result_set = $conn->query($sql);
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
    <?php main_content_card('Kids', $result_set);?>
</main>

<footer>
    <?php footer(); ?>
</footer>

</body>
</html>
