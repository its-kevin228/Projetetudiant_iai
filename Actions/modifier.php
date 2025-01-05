<?php
include __DIR__ . '/../Connexion.php'; 

if (isset($_GET['matricule'])) {
    $matricule = $_GET['matricule'];
    try {
        $stmt = $db->prepare("SELECT * FROM etudiant WHERE matricule = :matricule");
        $stmt->execute([':matricule' => $matricule]);
        $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
} else {
    die("Matricule non spécifié.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $nationalite = $_POST['nationalite'];

        $stmt = $db->prepare("UPDATE etudiant SET nomEtud = :nom, prenomEtud = :prenom, sexe = :sexe, Nationalite = :nationalite WHERE matricule = :matricule");
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':sexe' => $sexe,
            ':nationalite' => $nationalite,
            ':matricule' => $matricule
        ]);

        header("Location: ../traitement_inscription.php");
        exit;
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="lemonade">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">
    <title>Modifier Étudiant</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Modifier Étudiant</h1>
            <form method="POST" class="space-y-6">
                <!-- Champ Nom -->
                <div>
                    <label for="nom" class="block text-lg font-semibold text-gray-700">Nom :</label>
                    <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($etudiant['nomEtud']) ?>" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Champ Prénom -->
                <div>
                    <label for="prenom" class="block text-lg font-semibold text-gray-700">Prénom :</label>
                    <input type="text" name="prenom" id="prenom" value="<?= htmlspecialchars($etudiant['prenomEtud']) ?>" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Champ Sexe -->
                <div>
                    <label for="sexe" class="block text-lg font-semibold text-gray-700">Sexe :</label>
                    <select name="sexe" id="sexe" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="M" <?= $etudiant['sexe'] == 'Masculin' ? 'selected' : '' ?>>Masculin</option>
                        <option value="F" <?= $etudiant['sexe'] == 'Féminin' ? 'selected' : '' ?>>Féminin</option>
                    </select>
                </div>

                <!-- Champ Nationalité -->
                <div>
                    <label for="nationalite" class="block text-lg font-semibold text-gray-700">Nationalité :</label>
                    <input type="text" name="nationalite" id="nationalite" value="<?= htmlspecialchars($etudiant['Nationalite']) ?>" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Boutons -->
                <div class="flex justify-between items-center mt-6">
                    <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Modifier</button>
                    <a href="../traitement_inscription.php" class="px-6 py-3 bg-gray-500 text-white rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

