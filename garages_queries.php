<?php

class GarageQueries {
    
    private $dbh ;
    private $user = 'root' ; 
    private $pass = 'root' ;

    function startConnection(){

        try{
            $this->dbh = new PDO( 'mysql:host=localhost;dbname=tp_sql', $this -> user, $this -> pass);
            // echo("Connection OK");
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
            die("Connection KO");
        }
    }

    function showGarages() {
       
        $sql = "SELECT * FROM garages";
        $query = $this->dbh->query($sql);
        $values = $query->fetchAll();

        foreach ($values as $garage) {
            
            echo "<p>";
            echo $garage["id"] . " "; 
            echo $garage["name"] . " ";
            echo $garage["city"] . " ";
            echo $garage["creationdate"] . " ";
            echo $garage["turnover"] . " ";
            echo '<a href="cars.php?garage_id='.$garage["id"].'">Voir les voitures </a>';
            echo "<a href='garage_delete.php?garage_id=".$garage['id']."'>Supprimer le garage </a>";
            echo "</p>";

        }
        echo "<br>";
    }

    function showCars ($id) {
        
        $sql = "SELECT * FROM cars WHERE garage_id = " . $id;
        $query = $this->dbh->query($sql);
        $voitures = $query->fetchAll();

        foreach ($voitures as $voiture) {
            echo '<p>';
            echo $voiture['model'] . ' '; 
            echo $voiture['color'] . ' ';
            echo $voiture['price'] . ' ';
            echo '</p>';
        }
    }

    function addGarage($new_garage) {
        
        $sql = "INSERT INTO garages (name, city, creationdate, turnover) VALUES (:name, :city, :creationdate, :turnover)";
        $stmt = $this->dbh->prepare($sql);
        $succeed = $stmt->execute($new_garage);
        return $succeed; 
        
    }

    function deleteGarage($garage_id) {
        $sql = "DELETE FROM garages WHERE id= " . $garage_id ;
        $stmt = $this->dbh->prepare($sql);
        $succeed = $stmt->execute();
        return $succeed; 

    }

    function showBestGarage() {
        $sql = "SELECT SUM(price),name,garage_id FROM cars JOIN garages ON cars.garage_id = garages.id GROUP BY garage_id ORDER BY SUM(price) DESC LIMIT 1;  ";
        $query = $this->dbh->query($sql);
        $values = $query->fetchAll();

        foreach ($values as $bestGarage) {
            echo '<p>';
            echo $bestGarage['SUM(price)'] . '€  '; 
            echo $bestGarage['name'] . ' ';
            echo $bestGarage['garage_id'];
            echo '</p>';
        }
    }

    function showCarsPrice() {
        $sql = "SELECT * FROM cars ORDER BY price DESC;";
        $query = $this->dbh->query($sql);
        $values = $query->fetchAll();

        foreach ($values as $carsPrice) {
            echo '<p>';
            echo $carsPrice['model'] . ' '; 
            echo $carsPrice['color'] . ' ';
            echo $carsPrice['price'] . '€';
            echo '</p>';
        }
    }

}

?>