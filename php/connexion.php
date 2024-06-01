<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);
echo "<script>console.log('Debug Objects: " .$data. "' );</script>";
$email = $data['email'];
$password = $data['password'];

echo $email;
echo $password;
if (isset($data['email']) && isset($data['password'])) {
    $email = $data['email'];
    $password = $data['password'];

    // Exemple de vérification des données
    if ($email == 'test@example.com' && $password == 'password') {
        echo json_encode(['status' => 'success', 'message' => 'Connexion réussie']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Email ou mot de passe incorrect']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Données manquantes']);
}
?>