<?php 
    //Il faut créer un user avec le role admin dans la bdd pour avoir une personne administrateur du back-office(console d'administration)
    // pour cela on créer un formulaire user pour renseigner la bdd 
    //Au niveau du CRUD, nous allons faire un Create avec l'instruction SQL INSERT INTO
    include("../assets/inc/headBack.php");
?>
<title>Création d'un admin</title>
<?php 
    include("../assets/inc/headerBack.php")
?>
<div class="container">
    <div class="row">
    <h1>Admin</h1>
        <div class="col-4">
            <form class="form-group" action="" method="post">
                <input type="text" class="mt-3 form-control" name="nom" placeholder="Votre nom">
                <input type="text" class="mt-3 form-control" name="prenom" placeholder="Votre prenom">
                <input type="email" class="mt-3 form-control" name="email" placeholder="Votre email">
                <input type="password" class=" mt-3 form-control" name="password" placeholder="Votre mot de passe">
                <div>
                    <input type="checkbox" name="isAdmin" id="isAdmin" >
                <label for="isAdmin">Vous etes admin</label>
            </div>
                <button type="submit" class="btn mt-3 text-align bg-primary fw-bold" name="soumettre">Enregistrer</button>
               
            </form>
            <?php
            // on récupère le fichier de connexion -> connexion.php qui
            //correspond aux paramètres de connexion de notre bdd
            require("../core/connexion.php");
            // une condition pour récupérer les données du formulaire 
            if(isset($_POST["soumettre"])):
                //1 - récupération des données et formattage
                //on utilise les fonctions native php pour formater
                //correctement le texte.
                // addslashes() rajoute un antislashe devant les caractères spéciaux comme '
                //trim permet de supprimer les espace avant et après
                $nom = addslashes(trim(ucfirst($_POST["nom"])));
                $prenom = addslashes(trim(ucfirst($_POST["prenom"])));
                $email = trim(strtolower($_POST["email"]));
                //encodage du mot de passe (12 est l'option de niveau d'encodage):
                $option = ['cost => 12'];
                $password = password_hash(trim($_POST["password"]),PASSWORD_DEFAULT, $option);
                
                if(isset($_POST["isAdmin"])){
                    // si la case "isAdmin" est cochée
                    $role = 1;
                }
                else {
                    // si la case "isAdmin" n'est pas cochée
                    $role = 2;
                }
                
                // on dit que 1 est admin pour le role
               
                //2 - Préparation de l'écriture SQL
                $sql = "
                        INSERT INTO user (
                                        nom,
                                        prenom,
                                        email,
                                        password,
                                        role
                                        )
                        VALUE(
                            '$nom' , 
                            '$prenom' , 
                            '$email' , 
                            '$password', 
                            '$role'  
                            )
                        ";
                
                //3 - Execution de la reqête avec les paramettre de connexion
                mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
                // 4 - message
                $_SESSION["message"] = "Administrateur $nom 
                $prenom est correctement ajouté à la BDD";
                // 5 -  Redirection vers notre page d'accueil (index.php)
                header("location: ../index.php");
                exit;
            endif;
            ?>
        </div>
    </div>
</div>
<?php
include("../assets/inc/footerFront.php")
?>