<?php
include 'Connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
try{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $nationalite = $_POST['nationalite'];

    $sql="INSERT INTO etudiant (nomEtud, prenomEtud, sexe, Nationalite) VALUES (:nom, :prenom, :sexe, :nationalite)";
    //preparer et executer la requete
    $stmp=$db->prepare($sql);
    $stmp->execute([
        ':nom'=>$nom,
        ':prenom'=>$prenom,
        ':sexe'=>$sexe,
        ':nationalite'=>$nationalite]);
    
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
    <link href="output.css" rel="stylesheet">
    <title>Traitement d'inscription</title>
</head>
<body>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-center mb-6" >Liste des Etudiants Inscrits</h1>

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
            $stmp=$db->query('SELECT * FROM etudiant order by matricule ASC');
            while($etudiants=$stmp->fetch(PDO::FETCH_ASSOC)){
             echo "<tr>";
             echo "<td>".$etudiants["matricule"]."</td>";
             echo "<td>".$etudiants["nomEtud"]."</td>";
             echo "<td>".$etudiants["prenomEtud"]."</td>";
             echo "<td>".$etudiants["sexe"]."</td>";
             echo "<td>".$etudiants["Nationalite"]."</td>";
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
    <div class="flex justify-center mt-6">
        <a href="inscription.php" class="btn btn-primary">
            Ajouter un étudiant
        </a>
    </div>

</div>
</body>
</html>