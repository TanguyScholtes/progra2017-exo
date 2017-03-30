<nav>
    <h2>Main nav menu</h2>
    <?php if( $_SESSION[ 'user' ] ): ?>
        <a href="index.php?ressource=task&action=index">TO-DO List</a>
    <?php else: ?>
        <a href="index.php">TO-DO List</a>
    <?php endif; ?>

    <?php if( $_SESSION[ 'user' ] ): ?>
        <a href="index.php?ressource=auth&action=getLogout">Se déconnecter</a>
    <?php endif; ?>
</nav>
