<?php
    include("../assets/inc/headBack.php");
   /*if($_SESSION["log-admin"] != true or $_SESSION["role"] != 1):
      $_SESSION["message"] = "Vous n'êtes pas l'administrateur de ce site";
      header("Location: ../admin/index.php");
      exit;
    endif;*/
    if(!isset($_SESSION["role"],$_SESSION["isLog"], $_SESSION["prenom"])|| !$_SESSION ["isLog"] || $_SESSION["role"] != 1){
//L'utilisateur n'a pas droit
$_SESSION["message"] =  "Vous n'êtes pas l'administrateur de ce site";
header("Location: ../admin/index.php");
    exit;
    }
 ?>
<title>Console d'administration</title>
<?php
    include("../assets/inc/headerBack.php")
?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 mt-5">
                <h4>Bienvenue <?=$_SESSION["prenom"]?> sur le back-office</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-3">
                <form action="../core/userController.php" method="post">
                    <input type="hidden" name="faire" value="log-out">
                    <button class="btn bg-black text-white fw-bold"type="submit" name="soumettre">Se déconnecter</button>
                </form>
            </div>
        </div>
    </div> 
</main>

<?php
    include("../assets/inc/footerBack.php")
?>