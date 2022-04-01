<?php

$id = $_GET['garage_id'];

require ('garages_queries.php');
$garagesQueries = new GARAGEQueries() ;
$garagesQueries -> startConnection();
$garagesQueries -> showCars($id); 

?>