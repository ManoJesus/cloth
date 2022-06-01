<div class="container__logo">
    <a href="index.php">CLOTH</a>
</div>
<div class="nav__bar">
    <a class="nav__link" href="women.php">Women</a>
    <a class="nav__link" href="men.php">Men</a>
    <a class="nav__link" href="kids.php">Kids</a>
</div>
<?php if(!$isLogged){?>
    <div class="container__sign-in">
        <a class="btn btn__link sign-in" href="signin.php">SIGN IN</a>
    </div>
<?php } else {?>
    <div class="container__my-account">
        <img src="site_images/icons/Avatar.png" alt="user-icon">
        <span class="my-account">My Account</span>
        <div class="dropdown-menu">
            <a href="" class="dropdown-item">Previous Orders</a>
            <a href="logout.php" class="dropdown-item">Log Out</a>
        </div>
    </div>
<?php } ?>
<div class="container__cart">
    <img src="site_images/icons/carrin.png" alt="">
</div>






<div class="page__title">
    <p id="title-page">What's new ?</p>
</div>
<div class="card_container">
    <?php while($row = mysqli_fetch_array($result_set)){ ?>
        <div class="card">
            <div class="card__img">
                <a href="buy_page.php"><img class="product__img" src='<?php echo $row["image_path"];?>' alt="product_img"></a>
            </div>
            <div class="card__content">
                <a href="buy_page.php"><p class="product__name"><?php echo $row["name"];?></p></a>
                <p class="product__price"><?php echo '$'.$row["price"];?></p>
            </div>
        </div>
    <?php }?>
</div>
