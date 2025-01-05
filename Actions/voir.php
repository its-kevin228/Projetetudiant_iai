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
<html lang="fr" data-theme="lemonade">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <title>Voir Étudiant</title>
</head>
<body class="bg-gray-50">

    <div class="max-w-2xl mx-auto p-8">
        <div class="bg-white rounded-lg shadow-lg p-8 border border-gray-200">
            <h1 class="text-3xl font-semibold text-center text-indigo-700 mb-8">Détails de l'Étudiant</h1>
            <div class="space-y-4">

                <div class="flex justify-between">
                    <p class="text-lg font-medium text-gray-800"><strong>Matricule :</strong></p>
                    <p class="text-lg text-gray-600"><?= htmlspecialchars($etudiant['matricule']) ?></p>
                </div>

                <div class="flex justify-between">
                    <p class="text-lg font-medium text-gray-800"><strong>Nom :</strong></p>
                    <p class="text-lg text-gray-600"><?= htmlspecialchars($etudiant['nomEtud']) ?></p>
                </div>

                <div class="flex justify-between">
                    <p class="text-lg font-medium text-gray-800"><strong>Prénom :</strong></p>
                    <p class="text-lg text-gray-600"><?= htmlspecialchars($etudiant['prenomEtud']) ?></p>
                </div>

                <div class="flex justify-between">
                    <p class="text-lg font-medium text-gray-800"><strong>Sexe :</strong></p>
                    <p class="text-lg text-gray-600"><?= htmlspecialchars($etudiant['sexe']) ?></p>
                </div>

                <div class="flex justify-between">
                    <p class="text-lg font-medium text-gray-800"><strong>Nationalité :</strong></p>
                    <p class="text-lg text-gray-600"><?= htmlspecialchars($etudiant['Nationalite']) ?></p>
                </div>

                <div class="mt-6">
                    <a href="../traitement_inscription.php" class="w-full inline-block bg-indigo-600 text-white text-lg text-center py-3 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">
                        Retour
                    </a>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
