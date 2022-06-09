<?php
    require_once ('components.php');
    include_once ('classes/Service/OrderService.php');
    include_once ('classes/Service/ProductService.php');

    $orderService = new OrderService();
    $productService = new ProductService();

    $orders_db = $orderService->getAllOrdersByUserEmail($_COOKIE['email']);

    $orders = array();

    foreach ($orders_db as $order){
        $product = $productService->getProductByName($order->getProductName());
        $orders[] = array('image_path'=>$product->getImagePath(),
            'product_name' => $product->getName(),
            'product_price' => $product->getPrice(),
            'quantity' => $order->getQuantity());
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
    <title>CLOTH - My Orders</title>
</head>
<body>
    <header>
        <?php header_no_nav();?>
    </header>

    <main>
        <div class="container__buy cart flex">
            <div class="cart__content">
                <p class="page__title">My Orders</p>
                <div class="cart__content flex-column">
                    <?php
                        foreach ($orders as $order)
                        order_item($order);
                    ?>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <?php footer();?>
    </footer>
</body>
</html>
