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

    $description = $data['description'] ?? '';
    $adresse1 = $data['adresse1'] ?? '';
    $adresse2 = $data['adresse2'] ?? '';
    $surface = $data['surface'] ?? '';
    $type_appartement = $data['type_appartement'] ?? '';
    $loyer = $data['loyer'] ?? '';
    $nom_ville = $data['nom_ville'] ?? '';
    //$code_postal = $data['code_postal'] ?? '';

   

    $sql = "INSERT INTO appartement 
            VALUES ('','$adresse1', '$adresse2', '$description', $surface,5 ,'$type_appartement', $loyer, $nom_ville,  1)";
 
 // $sql2 = "INSERT INTO `photo` VALUES ('','photo1','test',$appartementId)";
    if (mysqli_query($lien, $sql)) {
        
        echo json_encode(['success' => true, 'message' => 'Données insérées avec succès']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'insertion des données: ' . mysqli_error($lien)]);
    }

    $lien->close();
}
?>