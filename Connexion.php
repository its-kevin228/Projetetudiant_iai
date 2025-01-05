<?php

//connexion a la base de données
    $db=new PDO('mysql:host=localhost;dbname=gestetud', 'root', '');

    // <?php
    // include 'Connexion.php';
    
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     try {
    //         // Validation simple des entrées
    //         $nom = htmlspecialchars(trim($_POST['nom']));
    //         $prenom = htmlspecialchars(trim($_POST['prenom']));
    //         $sexe = htmlspecialchars(trim($_POST['sexe']));
    //         $nationalite = htmlspecialchars(trim($_POST['nationalite']));
    
    //         // Requête SQL pour insérer un étudiant
    //         $sql = "INSERT INTO etudiant (nomEtud, prenomEtud, sexe, Nationalite) VALUES (:nom, :prenom, :sexe, :nationalite)";
    //         $stmt = $db->prepare($sql);
    //         $stmt->execute([
    //             ':nom' => $nom,
    //             ':prenom' => $prenom,
    //             ':sexe' => $sexe,
    //             ':nationalite' => $nationalite
    //         ]);
    //     } catch (PDOException $e) {
    //         echo "Erreur : " . $e->getMessage();
    //     }
    // }
    // ?>

?>