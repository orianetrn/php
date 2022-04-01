<?php

setcookie('user_connect',$_GET["firstname"]);

if ($_GET['firstname'] == NULL){
    header('Location:START.php');
} else header('Location:liste_garage.php');


?>