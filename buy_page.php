<?php
    require_once ('components.php');
    include ('classes/Connection.php');

    if(isset($_COOKIE['isLogged']) && !empty($_COOKIE['isLogged'])){
        $isLogged = $_COOKIE['isLogged'];
    }else{
        $isLogged = false;
    }

    if(isset($_GET['name'])){
        $product_name = $_GET['name'];
        //TODO change it to a product service
        $conn = ConnectionManager::getConnection("project_php_a3");
        $sql = "select * from product where name = '$product_name'";
        $result_set = $conn->query($sql);
        if(mysqli_num_rows($result_set)>0){
            $row_result = mysqli_fetch_assoc($result_set);
        }else{
            header("Location: error/not_found.php");
        }
    }else{
        header("Location: error/not_found.php");
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
    <title>CLOTH - sing in</title>
</head>
<body>
<header>
    <?php header_nav($isLogged); ?>
</header>

<main>
    <div class="container__buy flex">
        <div class="image__container">
            <img class="product__image" src="<?php echo $row_result['image_path']?>" alt="">
        </div>
        <div class="buy-information flex-column">
            <div class="product-information flex-column">
                <span class="product__name"><?php echo $row_result['name']?></span>
                <span class="product__price"><span>for just</span>$<?php echo $row_result['price']?></span>
                <form action="cart.php" class="buy__form flex-column" method="post">
                    <span class="quantity">Quantity:</span>
                    <input type="number" name="quantity" id="quantity" min="0" max="99">
                    <input type="hidden" name="product_name" value="blusao polo">
                    <input type="submit" value="BUY NOW" class="btn btn_submit submit__buy-now">
                </form>

            </div>
            <div class="product_description flex-column">
                <p>Description</p>
                <span class="description__name">Brand: <span class="description__content"><?php echo $row_result['brand'];?></span></span>
                <span class="description__name">Made: <span class="description__content"><?php echo $row_result['made'];?></span></span>
                <span class="description__name">Label type: <span class="description__content"><?php echo $row_result['type_label'];?></span></span>
                <span class="description__name">Gender:
                    <span class="description__content">
                        <?php
                            switch ($row_result['gender']){
                                case 'f':
                                    echo 'Feminine';
                                    break;
                                case 'm':
                                    echo 'Masculine';
                                    break;
                                case 'k':
                                    echo 'Kid';
                                    break;
                            }
                        ?></span></span>
                <span class="description__name">Color: <span class="description__content"><?php echo $row_result['color'];?></span></span>
                <?php if(!empty($row_result['age'])){?>
                    <span class="description__name">Age: <span class="description__content"><?php echo $row_result['age'];?></span></span>
                <?php }?>
            </div>
        </div>
    </div>
</main>

<footer>
    <?php footer(); ?>
</footer>

</body>
</html>
