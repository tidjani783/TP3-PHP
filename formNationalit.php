
<?php include "header.php";
?>
<div class="container mt-5 pt-5">
<h2 class='text-center'>Ajouter une Nationalite</h2>
<form action="valideAjoutNationalites.php" method="post" class="col-md-6 offset-md-3 border border-danger p-3 rounded">
<div  class="form-group">
     <label for='libelle' > libellé </label>
     <input type="text" class='form-control' id='Libellé' placehoder='Saisir le libellé' name='libelle'>
</div>
<div class="row">
    <div class="col"> <a href="listeNationalites.php" class= 'btn btn-danger btn-block'>Revenir à la liste</a></div>
    <div class="col"><button type='submit' class='btn btn-success btn-block'>Ajouter </button></div>
</div>
</form>
</div>
<?php include "footer.php";
  
?>

