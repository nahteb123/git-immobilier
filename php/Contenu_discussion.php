<?php 
include('cors.php');
cors();
session_start();
header('Content-Type: application/json');



$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_serveur = "mysql-bermondimmobilier.alwaysdata.net";
    $utilisateur = "362534";
    $mot_de_passe ="N@hteb2004";
    $nom_base_données ="bermondimmobilier_1" ;
    $lien = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
    
    $req = mysqli_query($lien , "SELECT date_message ,contenu_message , personne_envoye FROM converser WHERE id_vendeur =1 ORDER BY date_message") ;
    $num_ligne = mysqli_num_rows($req) ;
    $resultats = [];
    while($row = mysqli_fetch_assoc($req)) {
        $resultats[] = [
            'date_message' => $row['date_message'],
            'contenu_message' => $row['contenu_message'],
            'personne_envoye' => $row['personne_envoye']
        ];
    }

    // Envoi des résultats en JSON
    echo json_encode(['success' => true, 'results' => $resultats]);
        
    } else {
        echo json_encode(['success' => false, 'message' => 'Adrese mail ou mot de passe incorrect']);
    }


?>