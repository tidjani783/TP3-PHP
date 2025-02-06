
<?php include "header.php";
include "connexionPdo.php";
$action=$_GET['action'];
$num=$_POST['num']; // je récupère le libellé du formulaire
$libelle=$_POST['libelle']; // je récupère le libellé du formulaire
$continent=$_POST['continent']; // je récupère le continent du formulaire

if($action == "Modifier"){
    $req=$monPdo->prepare("update nationalite set libelle = :libelle, numContinent= :continent where num = :num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
}else{
    $req=$monPdo->prepare("insert into nationalite(libelle, numContinent) values(:libelle, :continent)");
    $req->bindParam(':continent', $continent);
    $req->bindParam(':libelle', $libelle); 
}
$nb=$req->execute();
$message= $action == "Modifier" ? "modifiée" : "ajoutée" ;

echo '<div class="container" style="padding-top: 5%;"> ';

if($nb == 1){
    echo '<div class="alert alert-success" role="alert">
    La nationalite a bien été '. $message .'   </div> ';
}else{
    echo '<div class="alert alert-danger" role="alert">
    La nationalite n\'a pas été '. $message .'  </div> ';
}
?>
<a href="listeNationalites.php" class="btn btn-danger"> revenir à la liste des nationalités</a>
 </div>

  <?php include "footer.php";
  
  ?>

