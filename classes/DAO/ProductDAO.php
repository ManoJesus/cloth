<?php
include ('classes/Persistence/Connection.php');
class ProductDAO
{
    function findAll(): array
    {
        $conn = ConnectionManager::getConnection();
        $sql = "SELECT * FROM product";

        $result_set = $conn->query($sql);
        $products = mysqli_fetch_all($result_set, MYSQLI_ASSOC);

        $conn->close();
        return $products;
    }
    function findAllByGender(string $gender_in): array
    {
        $gender = substr($gender_in, 0,1);
        $conn = ConnectionManager::getConnection();
        $sql = "SELECT * FROM product WHERE gender ='".$conn->real_escape_string($gender)."' ";

        $result_set = $conn->query($sql);
        $products = mysqli_fetch_all($result_set, MYSQLI_ASSOC);

        $conn->close();
        return $products;
    }
    function findAllWithLimit(int $limit): array
    {
        $conn = ConnectionManager::getConnection();
        $sql = "SELECT * FROM product LIMIT ".$conn->real_escape_string($limit);

        $result_set = $conn->query($sql);
        $products = mysqli_fetch_all($result_set,MYSQLI_ASSOC);

        $conn->close();
        return $products;
    }
    function findByName(string $name): array
    {
        $conn = ConnectionManager::getConnection();
        $name_escaped = $conn->real_escape_string($name);
        $sql = "SELECT * FROM product WHERE name = '$name'";

        $result_set = $conn->query($sql);
        $product = array();
        if(mysqli_num_rows($result_set) > 0){
            $product =  mysqli_fetch_array($result_set, MYSQLI_ASSOC);
        }
        $conn->close();
        return $product;
    }
}