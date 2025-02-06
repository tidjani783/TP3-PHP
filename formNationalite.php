<?php include "header.php";
$action=$_GET['action']; // soit Ajouter ou Modifier
include "connexionPdo.php";

if($action == "Modifier"){
    include "footer.php";
    $num=$_GET['num'];
    $req=$monPdo->prepare("select * from nationalite where num= :num");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->bindParam(':num', $num);
    $req->execute();
    $laNationalite=$req->fetch();
    // liste des continents
}    
    $reqContinent=$monPdo->prepare("select * from continent");
    $reqContinent->setFetchMode(PDO::FETCH_OBJ);
    $reqContinent->execute(); 
    $lesContinents=$reqContinent->fetchAll(); 

?>
<div class="container mt-5 pt-5">
<h2 class='text-center'> <?php echo $action ?> une Nationalite</h2>
    <form action="validFormNationalite.php?action=<?php echo $action ?>" method="post" class="col-md-6 offset-md-3 border border-danger p-3 rounded">
            <div  class="form-group">
                <label for='libelle' > libellé </label>
                <input type="text" class='form-control' id='Libelle' placehoder='Saisir le libellé' name='libelle' value="<?php if($action == "Modifier") {echo $laNationalite->libelle ;}?>">
            </div>
            <div  class="form-group">
                <label for='continent' > libellé </label>
                <select name="continent">
                    <?php
                    foreach($lesContinents as $continents){
                        echo "<option value='$continents->num'>$continents->libelle</option>";
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" id="num" name="num" value=" <?php if($action == "Modifier") {echo $laNationalite->num ;}?>">
            <div class="row">
                <div class="col"> <a href="listeNationalites.php" class= 'btn btn-danger btn-block'>Revenir à la liste</a></div>
                <div class="col"><button type='submit' class='btn btn-success btn-block'> <?php echo $action ?></div>
            </div>
    </form>
</div>
<?php include "footer.php";
  
?>