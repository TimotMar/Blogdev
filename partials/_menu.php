<nav class="navbar">

    <a class="navbar-brand" href="index.php"><?php echo WEBSITE_NAME;?></a>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a href="list_users.php">Liste des utilisateurs</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if(is_logged_in() ): ?>
                <li class="dropdown <?= set_active('register')?>">
                    <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button">
                        <img src="<?= get_avatar_url(get_session('email')) ?>" alt="Image de profil de <?= get_session('pseudo') ?>" class="img-circle">
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li class=" <?= set_active('profile')?> dropdown-item">
                            <a href="profile.php?id=<?= get_session('user_id')?>">Votre profil </a>
                        </li>
                        <li class=" <?= set_active('edit_user')?> dropdown-item">
                            <a href="edit_user.php?id=<?= get_session('user_id')?>">Edition de profil </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="index.post.php">Blog</a>
                        </li>
                        <li class="divider"></li>
                        <li class="nav-item dropdown-item">
                            <a href="logout.php">Déconnexion</a>
                        </li>
                    </ul>
                </li>
            <?php else : ?>
            <li class="<?= set_active('login')?>">
                <a href="login.php">Connexion</a>
            </li>
            <li class="<?= set_active('register')?>">
                <a href="register.php">Inscription</a>
            </li>

            <?php endif; ?>
        </ul>
        <!--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>-->
    </div>
</nav>