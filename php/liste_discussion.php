<?php 
include('cors.php');
cors();
session_start();
header('Content-Type: application/json');



$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $data['username'] ?? '';
    $password = $data['password'] ?? '';
    $nom_serveur = "mysql-bermondimmobilier.alwaysdata.net";
    $utilisateur = "362534";
    $mot_de_passe ="N@hteb2004";
    $nom_base_données ="bermondimmobilier_1" ;
    $lien = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
    $req = mysqli_query($lien , "SELECT DISTINCT id_vendeur FROM converser WHERE id_client =1 ") ;
    $num_ligne = mysqli_num_rows($req) ;
    $resultats = [];
    while($row = mysqli_fetch_assoc($req)) {
        $resultats[] = [
            'id_vendeur' => $row['id_vendeur'],
        ];
    }

    // Envoi des résultats en JSON

    echo json_encode(['success' => true, 'results' => $resultats]);
        
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur requete']);
    }


?>