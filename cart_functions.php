<?php
include_once ('classes/Service/ProductService.php');
include_once ('classes/Service/OrderService.php');
include_once ('classes/Model/Order.php');

session_start();
if(isset($_POST['func'])){

    $items_name = array_column($_SESSION['cart'], 'product_id');
    switch($_POST['func']){
        case 'increment':
            $_SESSION['cart'][array_search($_POST['name'],$items_name )]['quantity']++;
            break;
        case 'decrement':
            $_SESSION['cart'][array_search($_POST['name'],$items_name )]['quantity']--;
            break;
        case 'delete':
            unset($_SESSION['cart'][array_search($_POST['name'],$items_name )]);
            break;
        case 'placeOrder':
            $order_service = new OrderService();
            $i = 0;
            foreach ($_SESSION['cart'] as $key => $value){
                $order_service->saveOrder(new Order($_COOKIE['email'], $value['product_id'], $value['quantity']));
                $i++;
            }
            $_SESSION['cheguei'] = $i;
            unset($_SESSION['cart']);
            break;
    }
}else if(isset($_POST['value'])){
    $items_name = array_column($_SESSION['cart'], 'product_id');
    $_SESSION['cart'][array_search($_POST['name'],$items_name )]['quantity'] = $_POST['value'];
}
