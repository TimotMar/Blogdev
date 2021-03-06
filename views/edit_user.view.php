<?php $title = "Edition de Profil"; ?>

<?php include('partials/_header.php');
/*
*This file is used for the edit user view system, such as html
*
*
**/?>


    <div id="main-content">
        <div class="container">
            <div class="row">

                <?php //if same user_id : we get the possibility to change the profil parameters
                if (!empty($_GET['id']) && $_GET['id'] === get_session('user_id')) :?>
                        <div class="col-md-6 col-md-offset-3">

                            <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Compléter mon profil</h3>
            </div>
            <div class="panel-body">
                <?php include('partials/_errors.php');?>
                <form data-parsley-validate method="post" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nom<span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value ="<?= get_input('name') ? get_input('name') : e($user->name)?>"
                                       required="required"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">Ville<span class="text-danger">*</span></label>
                                <input type="text" name="city" id="city" class="form-control"
                                       value ="<?= get_input('city') ? get_input('city') : e($user->city)/* si on a déjà rentré le nom : on récup, sinon valeur en BDD*/?>"
                                       required="required"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Pays<span class="text-danger">*</span></label>
                                <input type="text" name="country" id="country" class="form-control"
                                       value ="<?= get_input('country') ? get_input('country') : e($user->country)?>"
                                       required="required"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sex">Sexe<span class="text-danger">*</span></label>
                                <select required="required" name="sex" id="sex" class="form-control">
                                    <option value="M" <?= $user->sex == "M" ? "selected" : ""?>>
                                        Masculin
                                    </option>
                                    <option value="F" <?= $user->sex == "F" ? "selected" : ""?>>
                                        Feminin
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" id="twitter"
                                       value ="<?= get_input('twitter') ? get_input('twitter') : e($user->twitter)?>"
                                       class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="github">Github</label>
                                <input type="text" name="github" id="github"
                                       value ="<?= get_input('github') ? get_input('github') : e($user->github)?>"
                                       class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="available_for_hiring">
                                    <input type="checkbox" name="available_for_hiring"
                                        <?= $user->available_for_hiring ? "checked" : ""?>/>
                                    Disponible pour emploi?
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" id="facebook"
                                       value ="<?= get_input('facebook') ? get_input('facebook') : e($user->facebook)?>"
                                       class="form-control"/>
                            </div>
                        </div>
                    </div>

  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="bio">Biographie<span class="text-danger">*</span></label>
                                <textarea name="bio" id="bio" cols="36" rows="18" required="required" class="form-control"
                                          value="<?= e($user->bio)?>" placeholder="J'aime la programmation...">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Valider" name="update"/>
                </form>
  <div class="row">
    <div class="col-md-12">
   <form method="post" action="" enctype ="multipart/form-data">
    <label for="mon_fichier">CV (format pdf) :</label>
    <input type="file" name="mon_fichier" id="mon_fichier" />
    <input type="submit" name="fichier" value="Envoyer" />
</form>
 
<?php
 //adding the CV system
if (isset($_FILES['mon_fichier'])) {
    $dossier = 'C:\wamp64\www\test\devnetwork\file/';
    $fichier = basename($_FILES['mon_fichier']['name']);
     
    if (move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $dossier . $fichier)) {//if true : the function worked
        echo 'Upload effectué avec succès !';
    } else //else : get false
    {
        echo 'Echec de l\'upload !';
    }
}
  
?>
</div>
</div>
            </div>
        </div>
    </div>
                <?php endif;?>
                        </div>


                        </div><!-- /.container -->
                        </div>
                        <?php include('partials/_footer.php'); ?>
