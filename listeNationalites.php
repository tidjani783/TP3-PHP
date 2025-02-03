
<?php include "header.php";
include "connexionPdo.php";
$req=$monPdo->prepare("select * from nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchALL();
?>


<div class="container mt-5 pt-5">

 <div class="row mt-3">
      <div class="col-9"><h2>Listes des nationalités</h2></div>
      <div class="col"><a href="formNationalite.php?action=Ajoute" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer une nationalité</a></div>
      
 </div>

<table class="table table-striped">
  <thead>
    <tr >
      <th scope="col" class="col-md-2">#Numéro</th>
      <th scope="col" class="col-md-8">Libellé</th>
      <th scope="col" class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>
   <?php     
   
    foreach($lesNationalites as $nationalite)
    {
      echo "<tr>";
      echo "<td class='col-md-2'>$nationalite->num</td>";
      echo "<td class='col-md-8'>$nationalite->libelle</td>";
      echo "<td class='col-md-2'>
           <a href='formNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
           <a href='#modalSuppression' data-toggle='modal' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
      </td>";
      echo "</tr>";
    }
//suppNationalite.php?num=$nationalite->num'

    ?>
  </tbody>
  </table>

  <div id="modalSuppression" class="modal">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title">Confirmation de suppression</h4>
      </div>
      <div class="modal-body">
        <p>Voulez vous supprimer cette nationalitée ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ne pas supprimer</button>
        <a href="suppNationalite.php?num=" class="btn btn-primary">Supprimer</a>
      </div>
    </div>
  </div>
</div>
  <?php include "footer.php";
  
  ?>

