<?php

function header_nav($isLogged)
{
    $result = '<div class="container__logo">
            <a href="index.php">CLOTH</a>
        </div>
        <div class="nav__bar">
            <a class="nav__link" href="women.php">Women</a>
            <a class="nav__link" href="men.php">Men</a>
            <a class="nav__link" href="kids.php">Kids</a>
        </div>';
    if (!$isLogged) {
        $result .= '<div class="container__sign-in">
                <a class="btn btn__link sign-in" href="signin.php">SIGN IN</a>
            </div>';
    } else {
        $result .= '<div class="container__my-account">
                <img src="site_images/icons/Avatar.png" alt="user-icon">
                <span class="my-account">My Account</span>
                <div class="dropdown-menu">
                    <a href="" class="dropdown-item">Previous Orders</a>
                    <a href="logout.php" class="dropdown-item">Log Out</a>
                </div>
            </div>';
    }

    $result .= '<div class="container__cart">
            <img src="site_images/icons/carrin.png" alt="">
        </div>';
    echo $result;
}

function header_no_nav()
{
    echo '<div class="container__logo">
         <a href="index.php">CLOTH</a>
        </div>';
}

function footer()
{
    echo '<ul class="footer__list">
            <li class="footer__item"><a href="">Terms and Conditions</a></li>
            <li class="footer__item"><a href="">Support Us</a></li>
            <li class="footer__item"><a href="">SAC</a></li>
            <li class="footer__item">
                <p>Quality and Security</p>
                <ul class="labels__list">
                    <li class="label__item"><img src="site_images/footer_label_top3_ibest.png" alt="" class="label__img"></li>
                    <li class="label__item"><img src="site_images/label-blindado.png" alt="" class="label__img" id="site_blindado"></li>
                    <li class="label__item"><img src="site_images/label-reclameaqui.png" alt="" class="label__img"></li>
                    <li class="label__item"><img src="site_images/label_ebit.png" alt="" class="label__img"></li>
                </ul>
            </li>
        </ul>
        <p>Developed By ManoJesus.Inc</p>';
}

function main_content_card($page_title, $result_set)
{
    $result = '<div class="page__title">
                <p id="title-page">' . $page_title . '</p>
            </div>
            <div class="card_container">';
    while ($row = mysqli_fetch_array($result_set)) {
        $result .= '<div class="card">
                        <div class="card__img">
                            <a href="buy_page.php?name='.$row["name"].'"><img class="product__img" src="' . $row["image_path"] . '" alt="product_img"></a>
                        </div>
                        <div class="card__content">
                            <a href="buy_page.php?name='.$row["name"].'"><p class="product__name">' . $row["name"] . '</p></a>
                            <p class="product__price">$' . $row["price"] . '</p>
                        </div>
                   </div>
            ';
    }
    $result .= '</div>';
    echo $result;
}
