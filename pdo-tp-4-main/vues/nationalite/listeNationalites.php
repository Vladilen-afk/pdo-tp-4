<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-9"><h2>Listes des nationalités</h2></div>
        <div class="col-3"><a href="index.php?uc=nationalies&action=add" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer une nationalité </a> </div>
        
    </div>

    <form id="formRecherche" action="index.php?uc=nationalites&action=list" method="post" class="border border-primary rounded p-3 mt-3 mb-3">
    <div class="row">
            <div class="col">
                <input type="text" class='form-control' id='libelle' onInput="document.getElementById('formRecherche').submit()" placehoder='Saisir le libellé' name='libelle' value="<?php echo $libelle; ?>">
            </div>
            <div class="col">
                <select name="continent" class="form-control" onChange="document.getElementById('formRecherche').submit()">
                        <?php 
                        echo "<option value='Tous'>Tous les continents</option>";
                        foreach($lesContinents as $continent){
                            $selection=$continent->getNum() == $continentSel ? 'selected' : '';
                            echo "<option value='".$continent->getNum()."'". $selection.">".$continent->getLibelle."(</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success btn-block"> Rechercher</button>
            </div> 
        </div>
    </form>


<table class="table table-hover table-striped table-dark">
  <thead>
    <tr>
      <th scope="col" class="col-md-2">Numero</th>
      <th scope="col" class="col-md-8">Libelle</th>
      <th scope="col" class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($lesNationalites as $nationalite){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>$Nationalite->numero</td>";
        echo "<td class='col-md-5'>$Nationalite->libNationalite</td>";
        echo "<td class='col-md-3'>$Nationalite->libContinent</td>";
        echo "<td class='col-md-2'>
        <a href='index.php?uc=nationalites&action=update&num=".$nationalite->numero."' class='btn btn-primary'><i class='fas fa-pen'></i></a>
        <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer cette nationalité ?' data-suppression='index.php?uc=nationalites&action=delete&num=".$nationalite->numero."' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
        </td>";
            
        echo "</tr>";
    }
    ?>

    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>
<?php include "footer.php";?>
