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
    $lien = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_base_données);
    
    // Requête SQL pour sélectionner l'utilisateur avec son ID
    $req = mysqli_query($lien, "SELECT id_vendeur FROM vendeur WHERE adresse_mail = '$username' AND mot_de_passe ='$password'");
    
    $num_ligne = mysqli_num_rows($req);
    
    if ($num_ligne > 0) {
        // Récupérer l'ID du client
        $row = mysqli_fetch_assoc($req);
        $id_vendeur = $row['id_vendeur'];
        
        $_SESSION['username'] = $username;
        $token = session_id();
        
        echo json_encode(['success' => true, 'token' => $token, 'userId' => $id_vendeur, 'message' => 'Login successful']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Adresse mail ou mot de passe incorrect']);
    }
}
?>