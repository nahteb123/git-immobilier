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
    $lien = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_base_données);

    if (!$lien) {
        echo json_encode(['success' => false, 'message' => 'Erreur de connexion à la base de données']);
        exit;
    }

    $message = $data['message'] ?? '';
    $typeUser = $data['typeUser'] ?? '';

    // Ajustement de la valeur de typeUser en fonction de la condition
    $typeUser = ($typeUser === 'vendeur') ? 1 : 0;
   

    $sql = "INSERT INTO converser 
        VALUES (NOW(),1, 1, '$message', $typeUser)";
 

    if (mysqli_query($lien, $sql)) {
        
        echo json_encode(['success' => true, 'message' => 'Données insérées avec succès']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'insertion des données: ' . mysqli_error($lien)]);
    }

    $lien->close();
}
?>