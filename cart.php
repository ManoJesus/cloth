<?php
require_once ('components.php');
include_once('classes/Service/ProductService.php');

session_start();

$product_service = new ProductService();
#Shipment is going to be a constant since I have no intention to implement it
const SHIPMENT = 30.00;

$products = [];
$total_price = 0;
$subtotal = 0;

if(isset($_COOKIE['isLogged']) && !empty($_COOKIE['isLogged'])){
    $isLogged = $_COOKIE['isLogged'];
}else{
    $isLogged = false;
}

if(isset($_POST['add_to_cart'])){
    if(isset($_SESSION['cart'])){
        $items_name = array_column($_SESSION['cart'], 'product_id');
        if(!in_array($_POST['product_name'], $items_name)){
            $count = count($_SESSION['cart']);
            $item = array('product_id' => $_POST['product_name'],'quantity' => $_POST['quantity'] );
            $_SESSION['cart'][$count] = $item;
        }else{
            $_SESSION['cart'][array_search($_POST['product_name'],$items_name )]['quantity']++;
        }
    }else{
      $item = array('product_id' => $_POST['product_name'],'quantity' => $_POST['quantity'] );
      $_SESSION['cart'][0] = $item;
    }
}
if(!empty($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $key => $value) {
        $product_db = $product_service->getProductByName($value['product_id']);
        $product_cart = array('name' => $product_db->getName(),
            'image_path' => $product_db->getImagePath(),
            'price' =>$product_db->getPrice(),
            'quantity' =>$value['quantity'],
            'total_price' => $product_db->getPrice() * $value['quantity']);
        $products[] = $product_cart;
    }
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
    <title>CLOTH - Cart</title>
</head>
<body>
    <header><?php header_no_nav();?></header>
    <main>
        <div class="container__buy cart flex">
        <div class="cart__content">
            <p>Cart</p>
            <?php
                if(count($products) > 0){
                    foreach($products as $product_cart){
                        cart_item($product_cart);
                    }
                    $subtotal = array_sum(array_column($products, 'total_price'));
                    $total_price = $subtotal+SHIPMENT;
                }else{
                    cart_no_item();
                }
            ?>
        </div>
        <div class="buy-information flex-column">
            <span id="subtotal">Subtotal <span><?php echo '$'. number_format($subtotal,2)?></span></span>
            <span id="shipment">Shipment <span><?php echo '$'.SHIPMENT?></span></span>
            <span id="total">Total <span><?php echo '$'. number_format($total_price , 2)?></span></span>
            <button class="btn btn_submit submit__buy-now" onclick="makeOrder(<?php echo $isLogged; ?>)" id="place-order">PLACE ORDER</button>
            <button class="btn btn_submit submit__buy-now" onclick="toHome()">KEEP BUYING</button>
        </div>
        </div>
    </main>
    <footer><?php footer();?></footer>
    <script type="text/javascript" src="javascript/cart-page.js"></script>
</body>
</html>
