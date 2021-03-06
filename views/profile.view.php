<?php $title = "Page de Profil"; ?>
<?php include('partials/_header.php'); ?>
<!-- 
*This file is used to recover of all the datas connected to the user and protection with the e() function using html
*
    -->

<!--  -->
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Profil de <?= e($user->pseudo)?></h3>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-5">
                                    <img src="<?= get_avatar_url($user->email, 100) ?>" alt="Image de profil de <?= e($user->pseudo)?>" class="img-circle">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                <strong><?= e($user->pseudo) ?></strong><br>
                                    <a href="mailto:<?= e($user->email) ?>"><?= e($user->email) ?></a><br/>
                                    <?=
                                    $user->city && $user->country ? '<i class="fa fa-location-arrow"></i>&nbsp;'.e($user->city).' - '.e($user->country) .'<br/>' : '';
                                    ?><a href="https://www.google.com/maps?q=<?= e($user->city).' '.e($user->country)?>" target="_blank">Voir sur Google Maps</a>
                                </div>
                                <div class="col-md-6">
                                    <?=
                                    $user->twitter ? '<i class="fa fa-twitter"></i>&nbsp;<a href="//twitter.com/'.e($user->twitter).'">@'.e($user->twitter).'</a><br/>' : '';
                                    ?>
                                    <?=
                                    $user->github ? '<i class="fa fa-github"></i>&nbsp;<a href="//github.com/'.e($user->github).'">'.e($user->github).'</a><br/>' : '';
                                    ?>
                                    <?=
                                    $user->facebook ? '<i class="fa fa-facebook"></i>&nbsp;<a href="//facebook.com/'.e($user->facebook).'">'.e($user->facebook).'</a><br/>' : '';
                                    ?>
                                    <?=
                                    $user->sex == 'H' ? '<i class="fa fa-male"></i>' : '<i class="fa fa-female"></i>';
                                    //tester égalité : ==
                                    ?>
                                    <?=
                                    $user->available_for_hiring ? 'Disponible pour emploi' : 'Non disponible pour emploi';
                                    ?>
                                    <a href=".../file/invoice_dl_1510857088.pdf" target="_blank">Mon cv</a>
                                </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
<!--Button trigger for modal to send an email--> 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Me contacter</button>
 
<!--Begin Modal Window--> 
<div class="modal fade left" id="myModal"> 
<div class="modal-dialog"> 
<div class="modal-content"> 
<div class="modal-header"> 
<h3 class="pull-left no-margin">Formulaire de contact</h3>
<button type="button" class="close" data-dismiss="modal" title="Close"><span class="glyphicon glyphicon-remove"></span>
</button> 
</div> 
<div class="modal-body">

<!--NOTE: you will need to provide your own form processing script--> 
<form class="form-horizontal" role="form" method="post" action="form_to_email_script.php "> 
<span class="required">* Required</span> 
<div class="form-group"> 
<label for="nom" class="col-sm-3 control-label">
<span class="required">*</span> Nom:</label> 
<div class="col-sm-9"> 
<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required> 
</div> 
</div> 
<div class="form-group"> 
<label for="mail" class="col-sm-3 control-label">
<span class="required">*</span> Votre mail: </label> 
<div class="col-sm-9"> 
<input type="email" class="form-control" id="mail" name="mail" placeholder="you@domain.com" required> 
</div> 
</div> 
<div class="form-group"> 
<label for="message" class="col-sm-3 control-label">
<span class="required">*</span> Message:</label> 
<div class="col-sm-9"> 
<textarea name="message" rows="4" required class="form-control" id="message" placeholder="Message"></textarea> 
</div> 
</div> 
<div class="form-group"> 
<div class="col-sm-offset-3 col-sm-6 col-sm-offset-3"> 
<button type="submit" id="envoi" name="envoi" class="btn-lg btn-primary">Envoyer</button> 
</div> 
</div> 
<!--end Form--></form>
</div>
<div class="modal-footer"> 
<button class="btn-sm close" type="button" data-dismiss="modal">Close</button> 
</div> 
</div> 
</div> 
</div>
</div>
</div> 
                            <div class="row">
                                <div class="col-md-12 well" style="margin-top:12px;">
                                    <h5>Petite biographie de <?= e($user->name)?></h5>
                                    <p>
                                        <?=//nl2br permet de récup les retours à la ligne faits par l'user
                                        $user->bio ? nl2br(e($user->bio)) : "Aucune bio pour le moment";
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>


        </div><!-- /.container -->


    </div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://code.jquery.com/jquery-1.12.2.min.js" integrity="sha256-lZFHibXzMHo3GGeehn1hudTAP3Sc0uKXBXAzHX1sjtk=" crossorigin="anonymous"></script> 
<script>window.jQuery || document.write('<script src="../../../../public/assets/js/vendor/jquery-slim.min.js">' +
        '<\/script>')</script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="../public/assets/js/jquery.timeago.js"></script>
<script src="../public/assets/js/jquery.timeago.fr.js"></script>
<script src="../libraries/parsley/i18n/fr.js"></script>
<script src="../libraries/parsley/parsley.min.js"></script>

<script>window.Parsley.setLocale('fr');</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".timeago").timeago();


    });
</script>


</body>
</html>