
<?php include "header.php";
include "connexionPdo.php";
$num=$_GET['num'];

$req=$monPdo->prepare("delete from nationalite where num = :num");
$req->bindParam(':num', $num); 
$nb=$req->execute();

echo '<div class="container" style="padding-top: 5%;"> ';

if($nb == 1){
    echo '<div class="alert alert-success" role="alert">
    La nationalite a bien été supprimée   </div> ';
}else{
    echo '<div class="alert alert-danger" role="alert">
    La nationalite n\'a pas été supprimée  </div> ';
}
?>
<a href="listeNationalites.php" class="btn btn-danger"> revenir à la liste des nationalités</a>
 </div>

  <?php include "footer.php";
  
  ?>

