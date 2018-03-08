<?php $title = "Liste des utilisateurs"; ?>
<?php include('partials/_header.php'); ?>


    <div id="main-content">
        <div class="container">

            <h1>Liste des utilisateurs</h1>
            <?php foreach (array_chunk($users, 4) as $user_set): //représentation des users par groupe de 4 ?>
            <div class="row users">
                <?php foreach ($user_set as $user): ?>
                <div class="col-md-3 user-block">
                <a href="../model/profile.php?id=<?= $user->id?>">
                <img src="<?= get_avatar_url($user->email, 100) ?>" alt="Image de profil de <?= e($user->pseudo)?>" class="avatar img-circle">
                </a>
                <a href="../model/profile.php?id=<?= $user->id?>">
                    <h4 class="user_block_username">
                    <?= e($user->pseudo)?>
                </h4>
                </a>
            </div>

<?php endforeach; ?>
            </div>
<?php endforeach; ?>
        </div><!-- /.container -->
    </div>


<?php include('partials/_footer.php'); ?>