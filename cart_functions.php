<?php
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
    }
}else if(isset($_POST['value'])){
    $items_name = array_column($_SESSION['cart'], 'product_id');
    $_SESSION['cart'][array_search($_POST['name'],$items_name )]['quantity'] = $_POST['value'];
}
