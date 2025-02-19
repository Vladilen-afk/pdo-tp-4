<div class="container mt-5">
<h2 class='pt-3 texte-center'><?php echo $mode ?> une nationalite</h2>
    <form action="index.php?uc=nationalites&action=validerForm "method="post" class="col-md-6 offset-md-3" >
            <div class="classformgroup">
                <label for="libelle">Libelle</label>
                <input type="text"class='form-control' id='libelle' placeholder='saisir le libelle' name='libelle' value="<?php if ($mode == 'update') echo $nationalite->getLibelle(); ?>">
            </div>
            <div class="form-group">
                <label for="continent">Continent</label>
                <select name="continent" class="form-control">
                    <?php
                    foreach($lesContinents as $continent){
                        if($mode=='update'){
                        $selection=$continent->getNum() == $nationalite->getContinent()->getNum() ? 'selected' : '';
                    }
                        echo "<option value='".$continent->getNum()."'".$selection.">".$continent->getLibelle()."</option>";
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="num" value="<?php if($mode=='update') echo $laNationalite->getNum(); ?>">
            <div class="row">
                <div class="col"><a href="index.php?uc=nationalites&action=list" class='btn btn-warning btn-block'>Revenir a la liste</a> <a</div>
                <div class="col"><button type='submit' class='btn btn-success btn-block'><?php echo $mode ?></div>
            </div>
    </form>
</div>