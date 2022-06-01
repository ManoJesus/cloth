<?php

include('classes/Connection.php');

$i = 1;
$result = array();
//TODO change it to a product service
$conn = ConnectionManager::getConnection("project_php_a3");
$sql = "select * from product where gender = 'f'";
$result_set = $conn->query($sql);


while($rows = mysqli_fetch_array($result_set)){
    $result[] = $rows;
}

print_r($result);
