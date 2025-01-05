<?php
include __DIR__ . '/../Connexion.php'; 

if (isset($_GET['matricule'])) {
    $matricule = $_GET['matricule'];
    try {
        $stmt = $db->prepare("DELETE FROM etudiant WHERE matricule = :matricule");
        $stmt->execute([':matricule' => $matricule]);

        header("Location: ../traitement_inscription.php");
        exit;
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
} else {
    die("Matricule non spécifié.");
}
?>
