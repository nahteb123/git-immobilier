<?php 
include('cors.php');
cors();
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion à la base de données
    $nom_serveur = "mysql-bermondimmobilier.alwaysdata.net";
    $utilisateur = "362534";
    $mot_de_passe ="N@hteb2004";
    $nom_base_données ="bermondimmobilier_1" ;
    $lien = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);

    // Préparation de la requête SQL
    $query = mysqli_query($lien , "SELECT description,adresse1, adresse2,  surface, type_appartement, loyer, nom_ville , code_postal FROM appartement a INNER JOIN ville v ON a.id_ville = v.id_ville WHERE id_appartement =1");

    // Récupération des résultats
    $resultats = [];
    while($row = mysqli_fetch_assoc($query)) {
        $resultats[] = [
            'description' => $row['description'],
            'adresse1' => $row['adresse1'],
            'adresse2' => $row['adresse2'],
            'surface' => $row['surface'],
            'type_appartement' => $row['type_appartement'],
            'loyer' => $row['loyer'],
            'nom_ville' => $row['nom_ville'],
            'code_postal' => $row['code_postal'],
        ];
    }

    // Envoi des résultats en JSON
    echo json_encode(['success' => true, 'results' => $resultats]);
} else {
    // Envoi d'un message d'erreur en JSON
    echo json_encode(['success' => false, 'message' => 'Erreur de requête']);
}
?>