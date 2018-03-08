<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="/index.post.php">Retour à la liste des billets</a></p>

<div class="champ">
<form action="/index.post.php?action=changePost&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="title">Titre</label><br />
        <input style="width: 450px;" type="text" id="title" name="title" value= "<?= htmlspecialchars($post['title']) ?>"/>
    </div>
    <div>
        <label for="pseudonyme">Pseudonyme</label><br />
        <input type="text" id="pseudonyme" name="pseudonyme" value="<?= htmlspecialchars($post['pseudonyme']) ?>"/>
    </div>
    <div>
        <label for="content">Blogpost</label><br />
        <textarea rows="10" cols="60" id="content" name="content"> <?= htmlspecialchars($post['content']) ?></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('views/frontend/template.php'); ?>
