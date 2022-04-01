<?php

$garage_id = $_GET['garage_id'];

require ('garages_queries.php');
$garagesQueries = new GarageQueries() ;
$garagesQueries -> startConnection();
$succeed = $garagesQueries -> deleteGarage($garage_id); 

if ($succeed == true){
    header('Location:liste_garage.php?alert=success');
} else header('Location:liste_garage.php?alert=fail');

?>