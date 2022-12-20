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
    

    $id = $_GET["id_user"];
    require("../core/connexion.php");
    $sql = "SELECT `id_user`, `nom`, `prenom`, `email`, `role`
FROM user
WHERE id_user= $id
";

$query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
$user = mysqli_fetch_assoc($query);
/*TODO :
1)Affisher les informations  de l'utilisateur sur la page
2) Afficher un utilisateur en fonction de son id 

*/
?>






 
<title>Modification de l'utisateur</title>
<?php
    include("../assets/inc/headerBack.php")
?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
            <table class="table table-striped-columns" >
        <tr class="table-success">
                <th  class="table-primary"  >Id</th>
                <th  class="table-primary" >Nom</th>
                <th  class="table-primary">Prénom</th>
                <th  class="table-primary" >Email</th>
                <th  class="table-primary" >Rôle</th>
                <th  class="table-primary" ></th>
            </tr>
            <?php
if ($user ) {
  ?>
<tr>
<td > <?= $user["id_user"];?></td>
<td ><?= $user["nom"];?></td>
<td ><?= $user["prenom"];?></td>
<td><?= $user["email"];?></td>
<td>
  <?php
if($user["role"] == "1"){
  echo "Admin";
}
else{
  echo "Utilisator";
}
?></td>
   
</tr>
<?php 
}
?>
 <table>

            </div>
        </div>
    </div> 
</main>

<?php
    include("../assets/inc/footerBack.php")
?> 