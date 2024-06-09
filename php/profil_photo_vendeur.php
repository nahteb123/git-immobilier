<?php 
include('cors.php');
cors();
session_start();
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion à la base de données
    $nom_serveur = "mysql-bermondimmobilier.alwaysdata.net";
    $utilisateur = "362534";
    $mot_de_passe ="N@hteb2004";
    $nom_base_données ="bermondimmobilier_1" ;
    $lien = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
    $id_client = $data["vendeurId"];
    // Préparation de la requête SQL
    
    $query = mysqli_query($lien , "SELECT Nom_Vendeur ,Prenom_Vendeur, chemin_photo FROM vendeur WHERE id_vendeur = $id_client ");

    // Récupération des résultats
    $resultats = [];
    while($row = mysqli_fetch_assoc($query)) {
        $resultats[] = [
            'Nom_Vendeur' => $row['Nom_Vendeur'],
            'Prenom_Vendeur' => $row['Prenom_Vendeur'],
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