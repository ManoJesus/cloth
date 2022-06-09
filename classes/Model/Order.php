<?php

class Order
{
    private string $user_email;
    private string $product_name;
    private int $quantity;

    /**
     * @param string $user_email
     * @param string $product_name
     * @param int $quantity
     */
    public function __construct(string $user_email, string $product_name, int $quantity)
    {
        $this->user_email = $user_email;
        $this->product_name = $product_name;
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getUserEmail(): string
    {
        return $this->user_email;
    }

    /**
     * @param string $user_email
     */
    public function setUserEmail(string $user_email): void
    {
        $this->user_email = $user_email;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->product_name;
    }

    /**
     * @param string $product_name
     */
    public function setProductName(string $product_name): void
    {
        $this->product_name = $product_name;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }



}