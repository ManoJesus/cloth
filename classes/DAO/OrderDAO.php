<?php
include_once ('classes/Model/Order.php');
class OrderDAO
{
    function createOrder(Order $order){
        $conn = ConnectionManager::getConnection();
        $product_name_esc = $conn->real_escape_string($order->getProductName());
        $product_email_esc = $conn->real_escape_string($order->getUserEmail());

        $sql = "insert into `order`(user_email,product_name,quantity) values('$product_email_esc','$product_name_esc',".$order->getQuantity().");";

        $conn->query($sql);

        $conn->close();
    }

    function findAll(): array{
        $conn = ConnectionManager::getConnection();
        $sql = "select * from `order`;";

        $orders = array();

        $result_set = $conn->query($sql);
        while($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)){
            $product_name = $row['product_name'];
            $user_email = $row['user_email'];
            $quantity = $row['quantity'];

            $orders[] = new Order($user_email,$product_name,$quantity);
        }


        $conn->query($sql);
        $conn->close();

        return $orders;
    }
    function findAllByEmail(string $email): array{
        $conn = ConnectionManager::getConnection();
        $email_es = $conn->real_escape_string($email);
        $sql = "select * from `order` where user_email = '$email_es';";

        $orders = array();

        $result_set = $conn->query($sql);
        while($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)){
            $product_name = $row['product_name'];
            $user_email = $row['user_email'];
            $quantity = $row['quantity'];

            $orders[] = new Order($user_email,$product_name,$quantity);
        }


        $conn->query($sql);
        $conn->close();

        return $orders;
    }
}