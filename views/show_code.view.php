<?php $title = "Affichage code source"; ?>
<?php include('partials/_header.php'); ?>


<div id="main-content">
    <div id="main-content-share-code">
        <!-- affichage du code tel quel -->
        <pre class="prettyprint linenums"><?= e($data->code);?></pre>
        <div class="btn-group nav-code">
            <a href="share_code.php?id=<?= $_GET['id']?>" class="btn btn-warning">Cloner</a>
            <a href="share_code.php" class="btn btn-primary">Nouveau</a>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
<script src="assets/js/google-code-prettify/prettify.js"></script>
<script>//se trouve au niveau de prettify.js
    prettyPrint();
</script>

</body>
</html>