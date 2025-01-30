
<?php include "header.php";
include "connexionPdo.php";
$num=$_POST['num']; // je récupère le libellé du formulaire
$libelle=$_POST['libelle']; // je récupère le libellé du formulaire

$req=$monPdo->prepare("update nationalite set libelle = :libelle where num = :num");
$req->bindParam(':libelle', $libelle);
$req->bindParam(':num', $num);
$nb=$req->execute();


echo '<div class="container" style="padding-top: 5%;"> ';

if($nb == 1){
    echo '<div class="alert alert-success" role="alert">
    La nationalite a bien été modifié
</div>';
}else{
    echo '<div class="alert alert-danger" role="alert">
    La nationalite n\'a pas été modifié
</div>';
}
?>
<a href="listeNationalites.php" class="btn btn-danger"> revenir à la liste des nationalités</a>
 </div>

  <?php include "footer.php";
  
  ?>

