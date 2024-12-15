<?php
include 'Connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
try{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $nationalite = $_POST['nationalite'];

    $sql="INSERT INTO etudiant (nomEtud, prenomEtud, sexe, Nationalite) VALUES (:nom, :prenom, :sexe, :nationalite)";
}
catch(PDOException $e){
    echo "Erreur de connexion :".$e->getMessage();
}
}
   
?>
<!DOCTYPE html>
<html lang="en" data-theme="lemonade">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement d'inscription</title>
</head>
<body>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-center mb-6" >List des Etudiants Inscrits</h1>

    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Sexe</th>
                    <th>Nationalite</th>
                </tr>
            </thead>
            <tbody>
                <?php
            include 'Connexion.php';

           try{
            $stmp=$db->query('SELECT * FROM etudiant order by matricule DESC');
            while($etudiants=$stmp->fetch(PDO::FETCH_ASSOC)){
             echo "<tr>";
             echo "<td>".$etudiants["matricule"]."</td>";
             echo "<td>".$etudiants["nomEtud"]."</td>";
             echo "<td>".$etudiants["prenomEtud"]."</td>";
             echo "<td>".$etudiants["sexe"]."</td>";
             echo "<td>".$etudiants["Nationalite"]."</td>";
             echo "<td>
             <button class='btn btn-sm btn-info'>Modifier</button>
             <button class='btn btn-sm btn-error'>Supprimer</button>
           </td>";
             echo "</tr>";
 
 
            }
           }
           catch(PDOException $e){
            echo "Erreur de connexion :".$e->getMessage();
           }

                ?>
            </tbody>

        </table>

    </div>

</div>
</body>
</html>