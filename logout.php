<?php
setcookie("email",'',time()-3600);
setcookie("isLogged",'',time()-3600);

header('Location: index.php');
