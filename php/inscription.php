<?php 
include('cors.php');
cors();
session_start();
header('Content-Type: application/json');



$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $data['username'] ?? '';
    $password = $data['password'] ?? '';
    $Nom = $data['Nom'] ?? '';
    $Prenom = $data['Prenom'] ?? '';
    $Tel= $data['Tel'] ?? '';
    $nom_serveur = "mysql-bermondimmobilier.alwaysdata.net";
    $utilisateur = "362534";
    $mot_de_passe ="N@hteb2004";
    $nom_base_données ="bermondimmobilier_1" ;
    $lien = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
    $req = mysqli_query($lien , "INSERT INTO client VALUES('','$username','$password','$Tel','$Nom',' $Prenom') ") ;
    $num_ligne = mysqli_num_rows($req) ;
    echo json_encode(['success' => true, 'message' => 'Login successful']);
    }
    else {
        echo json_encode(['success' => false, 'message' => 'Erreur inconnu']);

}
?>