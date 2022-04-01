<?php 

echo "<a href='garage_add.php'>Ajouter un garage </a>";

if (isset($_GET['alert'])) {
    if($_GET['alert'] == 'created') {
        echo '<p>Garage créé</p>';
    }
    if ($_GET['alert'] == 'error') {
        echo "<p>Erreur à la création du garage</p>";
    }
}

if (isset($_GET['alert'])) {
    if($_GET['alert'] == 'success') {
        echo '<p>Garage supprimé</p>';
    }
    if ($_GET['alert'] == 'fail') {
        echo "<p>Erreur lors de la suppression du garage</p>";
    }
}

require ('garages_queries.php');
$garagesQueries = new GarageQueries() ;
$garagesQueries -> startConnection();
$garagesQueries -> showGarages(); 

echo "<a href='meilleur_garage.php'>Voir le meilleur garage</a>";
echo "<a href='prix_voiture.php'>Voir les voitures de la plus au moins chère</a>";

?>