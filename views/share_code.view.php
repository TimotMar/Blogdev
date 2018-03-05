<?php $title = "Partage de codes sources"; ?>
<?php include('partials/_header.php'); ?>


    <div id="main-content">
        <div id="main-content-share-code">
            <form action="" autocomplete="off" method="post">
                <textarea name="code" id="code" placeholder="Entrez votre code ici"><?= e($code); ?></textarea>

                <div class="btn-group nav-code">
                    <a href="share_code.php" class="btn btn-danger">Tout effacer</a>
                    <input type="submit" name="save" class="btn btn-success" value="Enregistrer"/>
                </div>

            </form>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
<script src="assets/js/tabby.js"></script>
<script>/*selection du textarea, et mise en place de la tabulation*/
    $("#code").tabby();
    $("#code").height($(window).height() - 50);
</script>


</body>
</html>