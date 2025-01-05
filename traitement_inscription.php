
<?php
include 'Connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Validation simple des entrées
        $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $sexe = htmlspecialchars(trim($_POST['sexe']));
        $nationalite = htmlspecialchars(trim($_POST['nationalite']));

        // Requête SQL pour insérer un étudiant
        $sql = "INSERT INTO etudiant (nomEtud, prenomEtud, sexe, Nationalite) VALUES (:nom, :prenom, :sexe, :nationalite)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':sexe' => $sexe,
            ':nationalite' => $nationalite
        ]);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="lemonade">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Traitement d'inscription</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Liste des Étudiants Inscrits</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="table-auto w-full border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-gray-600 font-semibold">Matricule</th>
                        <th class="px-4 py-2 text-gray-600 font-semibold">Nom</th>
                        <th class="px-4 py-2 text-gray-600 font-semibold">Prénom</th>
                        <th class="px-4 py-2 text-gray-600 font-semibold">Sexe</th>
                        <th class="px-4 py-2 text-gray-600 font-semibold">Nationalité</th>
                        <th class="px-4 py-2 text-gray-600 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    try {
                        $stmt = $db->query('SELECT * FROM etudiant ORDER BY matricule ASC');
                        while ($etudiant = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr class='hover:bg-gray-100'>";
                            echo "<td class='px-4 py-3 text-center'>" . htmlspecialchars($etudiant['matricule']) . "</td>";
                            echo "<td class='px-4 py-3 text-center'>" . htmlspecialchars($etudiant['nomEtud']) . "</td>";
                            echo "<td class='px-4 py-3 text-center'>" . htmlspecialchars($etudiant['prenomEtud']) . "</td>";
                            echo "<td class='px-4 py-3 text-center'>" . htmlspecialchars($etudiant['sexe']) . "</td>";
                            echo "<td class='px-4 py-3 text-center'>" . htmlspecialchars($etudiant['Nationalite']) . "</td>";
                            echo "<td class='px-4 py-3 text-center space-x-2'>
                                <a href='Actions/voir.php?matricule=" . htmlspecialchars($etudiant['matricule']) . "' class='text-blue-500 hover:text-blue-700' title='Voir'>
                                    <i class='fa-solid fa-eye text-lg'></i>
                                </a>
                                <a href='Actions/modifier.php?matricule=" . htmlspecialchars($etudiant['matricule']) . "' class='text-yellow-500 hover:text-yellow-700' title='Modifier'>
                                    <i class='fa-solid fa-edit text-lg'></i>
                                </a>
                                <a href='Actions/supprimer.php?matricule=" . htmlspecialchars($etudiant['matricule']) . "' class='text-red-500 hover:text-red-700' title='Supprimer' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cet étudiant ?\")'>
                                    <i class='fa-solid fa-trash text-lg'></i>
                                </a>
                              </td>";
                            echo "</tr>";
                        }
                    } catch (PDOException $e) {
                        echo "<tr><td colspan='6' class='text-center text-red-500 py-3'>Erreur : " . $e->getMessage() . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="flex justify-center mt-8">
            <a href="inscription.php" class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Ajouter un étudiant
            </a>
        </div>
    </div>
</body>

</html>
