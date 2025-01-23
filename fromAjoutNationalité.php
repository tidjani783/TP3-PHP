
<?php include "header.php";
?>
<div class="container mt-5 pt-5">

<form action="valideAjoutNationalité.php" method="post" class="col-md-6">
<div  class="form-group">
     <label for='libelle' > libellé </label>
     <input type="text" class='form-control' id='Libellé' placehoder='Saisir le libellé' name='libelle'>
</div>
<div class="row">
    <div classe="col"> <a href="listeNationalites.hph" class= 'btn btn-warning'>Revenir à la liste</a></div>
    <div class="col"><button type='submit' class='btn btn-success'>Ajouter </button></div>
</div>
</form>
</div>
<?php include "footer.php";
  
?>

