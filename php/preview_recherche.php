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
    $query = mysqli_query($lien , "SELECT a.id_appartement, adresse1, adresse2, loyer, nom_ville ,chemin_photo FROM appartement a INNER JOIN photo p ON a.id_appartement = p.id_appartement INNER JOIN ville v ON a.id_ville = v.id_ville");

    // Récupération des résultats
    $resultats = [];
    while($row = mysqli_fetch_assoc($query)) {
        $resultats[] = [
            'id_appartement' => $row['id_appartement'],
            'adresse' => $row['adresse1'] . ' ' . $row['adresse2'],
            'loyer' => $row['loyer'],
            'nom_ville' => $row['nom_ville'],
            'chemin_photo' => $row['chemin_photo']
        ];
    }

    // Envoi des résultats en JSON
    echo json_encode(['success' => true, 'results' => $resultats]);
} else {
    // Envoi d'un message d'erreur en JSON
    echo json_encode(['success' => false, 'message' => 'Erreur de requête']);
}
?>