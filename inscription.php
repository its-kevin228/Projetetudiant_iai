<!DOCTYPE html>
<html lang="en" data-theme="lemonade">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">
    <title>inscription</title>
</head>
<body>
    
    <div class="container mx-auto p-4 ">
        <div class="card w-96 bg-base-100 shadow-xl mx-auto mt-10">
            <div class="card-body">
                <h2 class="card-title justify-center mb-4">Inscription Etudiant</h2>

                
                <form action="traitement_inscription.php" method="post">
                    
                    <!-- Nom -->
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                                <span class="label-text">Nom</span>
                            </label>

                            <input type="text" name="nom" placeholder="Entrez votre nom" class="input input-bordered w-full max-w-xs" required />
                    
                    </div>

                    <!-- Prenom -->
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                                <span class="label-text">Prenom</span>
                            </label>
                            <input type="text" name="prenom" placeholder="Entrez votre prenom" class="input input-bordered w-full max-w-xs" required />
                    </div>

                    <!-- sexe -->
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                                <span class="label-text">sexe</span>
                            </label>
                            <select name="sexe" class="select select-bordered w-full max-w-xs" required>
                                <option disabled selected>Choisissez votre sexe</option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                    </div>  

                    <!-- nationalite -->
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                                <span class="label-text">Nationalité</span>
                        </label>
                            <input type="text" name="nationalite" placeholder="Entrez votre nationalite" class="input input-bordered w-full max-w-xs" required />
                    </div>  

                    <!-- submit -->
                    <div class="form-control w-full max-w-xs mt-6 flex flex-row justify-between">
                        <button type="submit" class="btn btn-primary w-[50%]">S'inscrire</button>
                        <button type="reset" class="btn btn-error w-[50%]">Annuler</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>