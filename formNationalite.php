<?php include "header.php";
include "connexionPdo.php";
$action=$_GET['action']; // soit Ajouter ou Modifier

if($action == "Modifier"){
    include "footer.php";
    $num=$_GET['num'];
    $req=$monPdo->prepare("select * from nationalite where num= :num");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->bindParam(':num', $num);
    $req->execute();
    $laNationalite=$req->fetch();
}
?>
<div class="container mt-5 pt-5">
<h2 class='text-center'> <?php echo $action ?> Modifier une Nationalite</h2>
    <form action="validFormNationalite.php?action=<?php echo $action ?>" method="post" class="col-md-6 offset-md-3 border border-danger p-3 rounded">
            <div  class="form-group">
                <label for='libelle' > libellé </label>
                <input type="text" class='form-control' id='Libelle' placehoder='Saisir le libellé' name='libelle' value="<?php if($action == "Modifier") {echo $laNationalite->libelle ;}?>">
            </div>
            <input type="hidden" id="num" name="num" value=" <?php if($action == "Modifier") {echo $laNationalite->num ;}?>">
            <div class="row">
                <div class="col"> <a href="listeNationalites.php" class= 'btn btn-danger btn-block'>Revenir à la liste</a></div>
                <div class="col"><button type='submit' class='btn btn-success btn-block'> <?php echo $action ?>Ajouter</div>
            </div>
    </form>
</div>
<?php include "footer.php";
  
?>