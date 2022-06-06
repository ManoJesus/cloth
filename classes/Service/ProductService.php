<?php
include ('classes/DAO/ProductDAO.php');

class ProductService
{
    private ProductDAO $productDAO;

    public function __construct()
    {
        $this->productDAO = new ProductDAO();
    }


    function getAllWithLimit($limit): array
    {
        return  $this->productDAO->findAllWithLimit($limit) ;
    }
    function getAllByGender($gender): array
    {
        return  $this->productDAO->findAllByGender($gender) ;
    }
    function getProductByName($name): array
    {
        return  $this->productDAO->findByName($name) ;
    }
}