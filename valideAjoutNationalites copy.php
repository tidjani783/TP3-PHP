
<?php include "header.php";
include "connexionPdo.php";
$libelle=$_POST['libelle']; // je récupère le libellé du formulaire

$req=$monPdo->prepare("insert into nationalite(libelle) values(:libelle)");
$req->bindParam(':libelle', $libelle);
$nb=$req->execute();


echo '<div class="container" style="padding-top: 5%;"> ';

if($nb == 1){
    echo '<div class="alert alert-success" role="alert">
    La nationalite a bien été ajoutéé
</div>';
}else{
    echo '<div class="alert alert-danger" role="alert">
    La nationalite n\'a pas été ajoutée
</div>';
}
?>
<a href="listeNationalites.php" class="btn btn-danger"> revenir à la liste des nationalités</a>
 </div>

  <?php include "footer.php";
  
  ?>

