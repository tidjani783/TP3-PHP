
<?php include "header.php";
include "connexionPdo.php";
// liste des nationalites
$req=$monPdo->prepare("select n.num, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num order by libContinent ");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchALL();

// liste des continents
  $reqContinent=$monPdo->prepare("select * from continent");
$reqContinent->setFetchMode(PDO::FETCH_OBJ);
$reqContinent->execute(); 
$lesContinents=$reqContinent->fetchAll(); 

if(!empty($_SESSION['message'])){
    $mesMessages=$_SESSION['message'];
    foreach($mesMessages as $key=>$message){
      echo '<div class="container pt-5"
      <div class="alert alert-' .$key.' alert-dismissible fade show" role="alert">'.$message.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>';


    }
    $_SESSION['message']=[];
}

?>


<div class="container mt-5 pt-5">

 <div class="row mt-3">
      <div class="col-9"><h2>Listes des nationalités</h2></div>
      <div class="col"><a href="formNationalite.php?action=Ajouter" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer une nationalité</a></div>
      
 </div>


  
  <form action="" method="get" class="border border-primary rounded p-3 mt-3 mb3">
      <div class="row">
        <div class="col">
            <input type="text" class='form-control' id='Libelle' placehoder='Saisir le libellé' name='libelle' value="">
        </div>
        <div class="col">
        <select name="continent" class="form-control">
                      <?php
                      foreach($lesContinents as $continents){
                          $selection=$continent->num == $laNationalite->numContinent ? 'selected' : '';
                          echo "<option value='$continent->num' $selection>$continents->libelle</option>";
                      }
                      ?>
              </select>
        </div>
        <div class="col">
          <button type="submit" class="btn btn-success btn-block"> Rechercher</button>
        </div>
      </div>
  </form>
  


<table class="table table-striped">
  <thead>
    <tr >
      <th scope="col" class="col-md-2">#Numéro</th>
      <th scope="col" class="col-md-5">Libellé</th>
      <th scope="col" class="col-md-3">Continent</th>
      <th scope="col" class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>
   <?php     
   
    foreach($lesNationalites as $nationalite)
    {
      echo "<tr>";
      echo "<td class='col-md-2'>$nationalite->num</td>";
      echo "<td class='col-md-5'>$nationalite->libNation</td>";
      echo "<td class='col-md-3'>$nationalite->libContinent</td>";
      echo "<td class='col-md-2'>
           <a href='formNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
           <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer cette nationalitée ?' data-suppression='suppNationalite.php?num=$nationalite->num' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
      </td>";
      echo "</tr>";
    }

    ?>
  </tbody>
  </table>

  
  <?php include "footer.php";
  
  ?>

