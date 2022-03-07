<!-- <?php var_dump($_SESSION); ?> -->
<article>
    <h1>Connexion</h1>

    <?php if (isset($_SESSION['flash'])) : ?>
        <?php foreach ($_SESSION['flash'] as $type => $message) : ?>
            <div><?= $message; ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- <?php session_destroy(); ?> -->

    <?php if (isset($_SESSION['flash'])) :  ?>
        <?php unset($_SESSION['flash']) ?>
    <?php endif; ?>

    <form action="#" method="post">

        <label for="email">Email : </label>
        <input type="text" id="email" name="email">

        <label for="mdp">Mot de passe : </label>
        <input type="password" id="mdp" name="mdp">

        <input type="submit" name="submit" value="Connexion">
    </form>
</article>