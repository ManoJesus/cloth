<?php
    require_once ('components.php');
    include ('classes/Service/ProductService.php');

    if(isset($_COOKIE['isLogged']) && !empty($_COOKIE['isLogged'])){
        $isLogged = $_COOKIE['isLogged'];
    }else{
        $isLogged = false;
    }

    if(isset($_GET['name'])){
        $product_name = $_GET['name'];
        $product_service = new ProductService();
        $product = $product_service->getProductByName($product_name);
        if (empty($product))
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
    <script src="https://kit.fontawesome.com/d618375706.js" crossorigin="anonymous"></script>
    <title>CLOTH - sing in</title>
</head>
<body>
<header>
    <?php header_nav($isLogged); ?>
</header>

<main>
    <div class="container__buy flex">
        <div class="image__container">
            <img class="product__image" src="<?php echo $product['image_path']?>" alt="">
        </div>
        <div class="buy-information flex-column">
            <div class="product-information flex-column">
                <span class="product__name"><?php echo $product['name']?></span>
                <span class="product__price"><span>for just</span>$<?php echo $product['price']?></span>
                <form action="cart.php" class="buy__form flex-column" method="post">
                    <span class="quantity">Quantity:</span>
                    <div class="input__quantity">
                        <button type="button" class="btn quantity__btn" id="add"><i class="fas fa-regular fa-plus"></i></button>
                        <input type="text" name="quantity" class="product__quantity" value="1" maxlength="2">
                        <button type="button" class="btn quantity__btn" id="sub"><i class="fas fa-regular fa-minus"></i></button>
                    </div>
                    <input type="hidden" name="product_name" value="<?php echo $product['name']?>">
                    <input name="add_to_cart" type="submit" value="BUY NOW" class="btn btn_submit submit__buy-now">
                </form>

            </div>
            <div class="product_description flex-column">
                <p>Description</p>
                <span class="description__name">Brand: <span class="description__content"><?php echo $product['brand'];?></span></span>
                <span class="description__name">Made: <span class="description__content"><?php echo $product['made'];?></span></span>
                <span class="description__name">Label type: <span class="description__content"><?php echo $product['type_label'];?></span></span>
                <span class="description__name">Gender:
                    <span class="description__content">
                        <?php
                            switch ($product['gender']){
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
                <span class="description__name">Color: <span class="description__content"><?php echo $product['color'];?></span></span>
                <?php if(!empty($product['age'])){?>
                    <?php if((int)$product['age'] < 0){ $product['age'] = ($product['age'] * -1).' months';}?>
                    <span class="description__name">Age: <span class="description__content"><?php echo $product['age'];?></span></span>
                <?php }?>
            </div>
        </div>
    </div>
</main>

<footer>
    <?php footer(); ?>
</footer>

<script type="text/javascript" src="javascript/buy-page.js"></script>
</body>
</html>
