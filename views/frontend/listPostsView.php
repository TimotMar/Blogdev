<?php $title = "Page de Profil"; ?>
<?php include('../../views/partials/_header.php');
include('../../controller/filter/user_filter.php'); ?>


<?php ob_start(); ?><!-- input fileds for the posts -->
<h1>Mon blog!</h1>
<div class="champ" style="text-align : center;">
<form action="../../index.post.php?action=addPost" method="post">
    <div>
        <label for="title">Titre</label><br />
        <input style="width: 450px;" type="text" id="title" name="title" />
    </div>
    <div>
        <label for="pseudonyme">Pseudonyme</label><br />
        <input type="text" id="pseudonyme" name="pseudonyme" />
    </div>
    <div>
        <label for="content">Blogpost</label><br />
        <textarea rows="10" cols="60" id="content" name="content"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>
</div>


<p style="text-align: center;"><em>Derniers billets du blog :</em></p>


<?php //getting all the posts with the differents functions (change, delete...)
while ($data = $posts->fetch()) {
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?> par <?= htmlspecialchars($data['pseudonyme']) ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="../../index.post.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>//
            <em><a href="../../index.post.php?action=modifier&amp;id=<?= $data['id'] ?>">Modifier</a></em>//
            <em><a href="../../index.post.php?action=deletePost&amp;id=<?= $data['id'] ?>">Supprimer</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('../../views/frontend/template.php'); ?>