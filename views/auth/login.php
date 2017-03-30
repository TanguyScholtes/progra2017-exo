<h1>Auth Login</h1>

<div>
    <form action="<?php $_SERVER[ 'PHP_SELF' ]; ?>" method="post">
        <label for="email">Adresse mail :</label>
        <input type="text" id="email" name="email" placeholder="foobar@pendu.be" value="<?php echo( $_SESSION[ 'email' ] ); ?>">

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password">

        <?php if ( $_SESSION['errors'] ): ?>
            <div>
                <p>Erreur : <?php echo( $_SESSION['errors'] ); ?></p>
            </div>
        <?php endif; ?>

        <input type="hidden" name="action" value="postLogin">
        <input type="hidden" name="ressource" value="auth">

        <input type="submit" value="Se connecter">
    </form>
</div>
