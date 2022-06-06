<?php
session_start();
if(isset($_POST['func'])){
    if($_POST['func'] === "increment"){
        $items_name = array_column($_SESSION['cart'], 'product_id');
        $_SESSION['cart'][array_search($_POST['name'],$items_name )]['quantity']++;
    }
    if($_POST['func'] === "decrement"){
        $items_name = array_column($_SESSION['cart'], 'product_id');
        $_SESSION['cart'][array_search($_POST['name'],$items_name )]['quantity']--;
    }
}else if(isset($_POST['value'])){
    $items_name = array_column($_SESSION['cart'], 'product_id');
    $_SESSION['cart'][array_search($_POST['name'],$items_name )]['quantity'] = $_POST['value'];
}
