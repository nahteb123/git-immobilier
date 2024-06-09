


<?php 
//SELECT * FROM converser where id_client = POST[id]OR  id_vendeur = POST[id_vendeur]
//SELECT `id_appartement`, `adresse1`, `adresse2`, `loyer`, `id_ville` FROM `appartement`
?>
    <?php
        //connection à la base de donnés sql
        $nom_serveur = "mysql-bermondimmobilier.alwaysdata.net";
        $utilisateur = "362534";
        $mot_de_passe ="N@hteb2004";
        $nom_base_données ="bermondimmobilier_1" ;
        $lien = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
        $query = mysqli_query($lien , "SELECT a.id_appartement, adresse1, adresse2, loyer, id_ville ,chemin_photo FROM appartement a INNER JOIN photo p ON a.id_appartement = p.id_appartement");//on recupère les donnés de la secrétaire en fonction de son id
        echo "<div class ='conteneur_resultat_recherche'> ";
        while($row = mysqli_fetch_assoc($query)) {
            echo "<div class='resultat_recherche'>"
                ."<h1> Appartement N° {$row['id_appartement']} </h1>
                  <h2> Adresse {$row['adresse1']} {$row['adresse2']} </h2>
                  <h2> Prix: {$row['loyer']}€ </h2>
                  <h2> Lieu: {$row['id_ville']} </h2>
                  <h2> Image: {$row['chemin_photo']} </h2>
                 </div> \n";
        }
        echo "</div>"
      
      


    ?>

</html>