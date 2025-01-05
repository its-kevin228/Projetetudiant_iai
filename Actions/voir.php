<?php
include __DIR__ . '/../Connexion.php'; // Chemin absolu pour éviter les erreurs

if (isset($_GET['matricule'])) {
    $matricule = htmlspecialchars($_GET['matricule']);

    try {
        $stmt = $db->prepare("SELECT * FROM etudiant WHERE matricule = :matricule");
        $stmt->execute([':matricule' => $matricule]);
        $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$etudiant) {
            die("Aucun étudiant trouvé avec ce matricule.");
        }
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
} else {
    die("Matricule non spécifié.");
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="lemonade">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <title>Voir Étudiant</title>
</head>
<body>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-center mb-6">Détails de l'Étudiant</h1>
    <div class="card shadow-lg p-6">
        <p><strong>Matricule :</strong> <?= htmlspecialchars($etudiant['matricule']) ?></p>
        <p><strong>Nom :</strong> <?= htmlspecialchars($etudiant['nomEtud']) ?></p>
        <p><strong>Prénom :</strong> <?= htmlspecialchars($etudiant['prenomEtud']) ?></p>
        <p><strong>Sexe :</strong> <?= htmlspecialchars($etudiant['sexe']) ?></p>
        <p><strong>Nationalité :</strong> <?= htmlspecialchars($etudiant['Nationalite']) ?></p>
        <div class="mt-4">
            <a href="../traitement_inscription.php" 
               class=" btn btn-primary">
               Retour
            </a>
        </div>
    </div>
</div>
</body>
</html>
