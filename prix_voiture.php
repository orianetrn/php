<?php

require ('garages_queries.php');
$garagesQueries = new GarageQueries() ;
$garagesQueries -> startConnection();
$garagesQueries -> showCarsPrice();

?>