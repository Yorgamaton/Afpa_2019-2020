<?php
include 'header.php';
include 'connexion_bdd.php';
$oPdo = connexionBase();
?>

<h2>1. Afficher la liste des hôtels avec leur station</h2> 
    <?php
    $aHotels = $oPdo->query("SELECT * FROM `v_station_by_hotel` ");
    ?>
    <table class="table table-responsive">
        <tr>
            <th>Hotel</th>
            <th>Station</th>
        </tr>
        <?php
            // Affichage du contenu avec une boucle
            while ($o=$aHotels->fetch(PDO::FETCH_OBJ)) 
            {
                echo "<tr>";
                    echo"<td> ".$o->hot_nom."</td>";
                    echo"<td> ".$o->sta_nom."</td>";
                echo "</tr>";
            }
            ?>
    <table>

<h2>2. Afficher la liste des chambres et leur hôtel </h2> 
    <?php
    $aHotels = $oPdo->query("SELECT * FROM `v_room_by_hotel` ");
    ?>
    <table class="table table-responsive">
        <tr>
            <th>Hotel</th>
            <th>chambre</th>
            <th>Capacité</th>
            <th>Type de chambre</th>
        </tr>
        <?php
            // Affichage du contenu avec une boucle
            while ($o=$aHotels->fetch(PDO::FETCH_OBJ)) 
            {
                echo "<tr>";
                    echo"<td> ".$o->hot_nom."</td>";
                    echo"<td> ".$o->cha_numero."</td>";
                    echo"<td> ".$o->cha_capacite."</td>";
                    echo"<td> ".$o->cha_type."</td>";
                echo "</tr>";
            }
            ?>
    <table>

<h2>3. Afficher la liste des réservations avec le nom des clients</h2> 
    <?php
    $aHotels = $oPdo->query("SELECT * FROM `v_booking_by_customer` ");
    ?>
    <table class="table table-responsive">
        <tr>
            <th>Prénom du client</th>
            <th>Nom du client</th>
            <th>Numéro de réservation</th>
            <th>Date réservation</th>
            <th>Date début</th>
            <th>Date fin</th>
        </tr>
        <?php
            // Affichage du contenu avec une boucle
            while ($o=$aHotels->fetch(PDO::FETCH_OBJ)) 
            {
                echo "<tr>";
                    echo"<td> ".$o->cli_prenom."</td>";
                    echo"<td> ".$o->cli_nom."</td>";
                    echo"<td> ".$o->res_id."</td>";
                    echo"<td> ".$o->res_date."</td>";
                    echo"<td> ".$o->res_date_debut."</td>";
                    echo"<td> ".$o->res_date_fin."</td>";
                echo "</tr>";
            }
            ?>
    <table>

<h2>4. Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station</h2> 
    <?php
    $aHotels = $oPdo->query("SELECT * FROM `v_room_by_hotel_and_station`");
    ?>
    <table class="table table-responsive">
        <tr>
            <th>Hotel</th>
            <th>Station</th>
            <th>Numéro de chambre</th>
        </tr>
        <?php
            // Affichage du contenu avec une boucle
            while ($o=$aHotels->fetch(PDO::FETCH_OBJ)) 
            {
                echo "<tr>";
                    echo"<td> ".$o->hot_nom."</td>";
                    echo"<td> ".$o->sta_nom."</td>";
                    echo"<td> ".$o->cha_numero."</td>";
                echo "</tr>";
            }
            ?>
    <table>

<h2>5. Afficher les réservations avec le nom du client et le nom de l’hôtel</h2> 
    <?php
    $aHotels = $oPdo->query("SELECT * FROM `v_booking_by_customer_and_hotel`");
    ?>
    <table class="table table-responsive">
        <tr>
            <th>Nom du client</th>
            <th>Hotel</th>
            <th>Numéro de réservation</th>
        </tr>
        <?php
            // Affichage du contenu avec une boucle
            while ($o=$aHotels->fetch(PDO::FETCH_OBJ)) 
            {
                echo "<tr>";
                    echo"<td> ".$o->cli_nom."</td>";
                    echo"<td> ".$o->hot_nom."</td>";
                    echo"<td> ".$o->res_id."</td>";
                echo "</tr>";
            }
            ?>
    <table>


<?php
include 'footer.php';
