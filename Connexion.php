<?php
try {
    $db=new PDO('mysql:host=localhost;dbname=gestetud', 'root', '');
    echo "Connexion établie avec succès";
}
catch (PDOException $e){
    echo "Erreur de connexion :".$e->getMessage();
}

// $req = $db->query('SELECT * FROM etudiant');

// $etudiants = $req->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($etudiants);


?>