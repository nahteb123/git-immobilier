

<?php 
//SELECT `id_appartement`, `adresse1`, `adresse2`, `loyer`, `id_ville` FROM `appartement`
session_start() ;
?>
    <?php
        //connection à la base de donnés sql
        $nom_serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe ="";
        $nom_base_données ="immobilier" ;
        $lien = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
        $query = mysqli_query($lien , "SELECT a.id_appartement, adresse1, adresse2, loyer, id_ville ,chemin_photo FROM appartement a INNER JOIN photo p ON a.id_appartement = p.id_appartement");//on recupère les donnés de la secrétaire en fonction de son id
       // echo "<p class ='titre_bienvenue'>  Bienvenue dans le système de messagerie "  .$datas3['S_nom'] ." ". $datas3['S_prenom']."</p>";
       
        //affichage de la base de données de tout les rdv de tous les patients
      //  echo '<table border 1 width =100%>';
        //echo "<tr><td> id_appartement</td><td>adresse1 </td><td>adresse2</td><td>loyer</td><td>id_ville</td></tr>\n " ;
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

    
