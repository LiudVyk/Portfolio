

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

    require("../core/connexion.php");
    $sql = "SELECT  `id_user`,`nom`,`prenom`,`email`,`role`
    FROM `user`";
    $query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

    $users = mysqli_fetch_all($query, MYSQLI_ASSOC);
    

    ?>
       <title>Liste des utilisateurs inscrits</title>

 <?php 
include("../assets/inc/headerBack.php")
?>

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 mt-5">
                <h1>Liste des utilisateur</h1>
            </div>
        </div>
        <table class="table table-striped-columns" >
        <tr class="table-success">
                <th scope="col" class="table-primary" >Id</th>
                <th scope="col" class="table-primary" >Nom</th>
                <th scope="col"  class="table-primary">Prénom</th>
                <th scope="col" class="table-primary" >Email</th>
                <th scope="col" class="table-primary" >Rôle</th>
                <th scope="col" class="table-primary" ></th>
            </tr>
      
   
    <?php
foreach ($users as $user ) {
    /* TODO : pour chaque utilisateur, créer une nouvelle ligne (tr)
    */
    ?>
<tr>
<td > <a href= "./updateUser.php?id_user= <?= $user["id_user"] ?>"> <?= $user["id_user"] ?></a></td>
<td><?= $user["nom"];?></td>
<td><?= $user["prenom"];?></td>
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

<td><a href= "./updateUser.php?id_user= <?= $user["id_user"] ?>">Modife </a></td>
</tr>
<?php 
}
?>
 <table>
    </div> 


</main>

<?php
    include("../assets/inc/footerBack.php")
?>




