<?php
session_start();

echo print_r($_SESSION['cart']);

$nums = array(1000.20,1000.30);
$sum = array_sum($nums);

echo '<br><br> '.$sum;
echo '<br><br> '.$_SESSION['cheguei'];