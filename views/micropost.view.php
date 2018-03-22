<?php $title = "Blog"; ?>
<?php include('../views/partials/_header.php'); ?>

<!-- blog functionnality that allows you to put some microposts into the profile page like a social network. On coding -->
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                    <div class="status-post">
                        <form action="../model/microposts.php" method="post" data-parsley-validate>
                            <div class="form-group">
                                <input type="text" id="pseudopost" name="pseudopost" placeholder="Votre pseudo">
                                <label for="content" class="sr-only">Statut : </label><!-- sr only : for people with views problem-->
                                <textarea class="form-control" name="content" id="content" rows="3" placeholder="Quoi de neuf?" required="required" maxlength="140" minlength="3"></textarea>
                            </div>
                            <div class="form-group status-post-submit">
                                <input type="submit" name="publish" value="Publier" class="btn btn-default btn-xs">
                            </div>
                        </form>
                    </div>
<?php var_dump($pseudo); ?>
                <?php error_log(print_r($microposts, true));?>
                <?php foreach ($microposts as $micropost) { ?>
                    <article class="media status-media">
                        <div class="media-body">
                            <h4 class="media-heading">
                                <?= $micropost->pseudopost?>
                            </h4>
                            <p><i class="fa fa-clock-o"></i><span class="timeago" title="<?= $micropost->created_at?>"><?= $micropost->created_at?></span></p>
                            <?= nl2br(e($micropost->contenu)); ?>
                        </div>
                    </article>
                <?php } ?>


            </div>
        </div>


    </div><!-- /.container -->

</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://code.jquery.com/jquery-1.12.2.min.js" integrity="sha256-lZFHibXzMHo3GGeehn1hudTAP3Sc0uKXBXAzHX1sjtk=" crossorigin="anonymous"></script> 
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
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