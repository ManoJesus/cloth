<?php
include_once ('classes/DAO/OrderDAO.php');
include_once ('classes/Model/Order.php');
class OrderService
{
    private OrderDAO $orderDAO;


    public function __construct()
    {
        $this->orderDAO = new OrderDAO();
    }

    function getAllOrders(): array{
        return $this->orderDAO->findAll();
    }

    function getAllOrdersByUserEmail(string $email): array{
        return $this->orderDAO->findAllByEmail($email);
    }

    function saveOrder(Order $order){
        $this->orderDAO->createOrder($order);
    }
}