<?php

$new_garage = [
    'name' => $_POST['name'],
    'city' => $_POST['city'],
    'creationdate' => $_POST['creationdate'],
    'turnover' => $_POST['turnover']
];

require ('garages_queries.php');
$garagesQueries = new GarageQueries() ;
$garagesQueries -> startConnection();
$succeed =$garagesQueries -> addGarage($new_garage); 

if ($succeed == true){
    header('Location:liste_garage.php?alert=created');
} else header('Location:liste_garage.php?alert=error');

?>