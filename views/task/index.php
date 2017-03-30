<h1>Task Index</h1>

<div>
    <?php if ( $data[ 'tasks' ] ): ?>
        <ul>
            <?php foreach ( $data[ 'tasks' ] as $task ): ?>
                <li>
                    <span><?php echo( $task -> taskDescription ); ?></span>
                    <form method="POST" action="index.php?ressource=task&action=postUpdate&id=<?php echo( $task -> taskId ); ?>">
                        <input type="checkbox" name="taskIsDone" value="<?php echo( $task -> taskIsDone ); ?>">
                        <?php if ( isset( $task -> editable ) && $task -> editable == 1 ): ?>
                            <p>
                                <label for="taskDescription">Description</label>
                                <input type="text" id="taskDescription" name="taskDescription" value="<?php echo( $task -> taskDescription ); ?>">
                            </p>
                        <?php endif; ?>
                        <input type="submit" value="Enregistrer">
                    </form>
                    <a href="index.php?ressource=task&action=getUpdate&id=<?php echo( $task -> taskId ); ?>">Modifier</a>
                    <form method="POST" action="index.php?ressource=task&action=delete&id=<?php echo( $task -> taskId ); ?>">
                        <input type="submit" value="Supprimer">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Il n'y a aucune tâche à afficher pour cet utilisateur.</p>
    <?php endif; ?>
</div>

<div>
    <h2>Ajouter une tâche</h2>
    <form method="post" action="index.php?ressource=task&action=create">
        <p>
            <label for="taskDescriptionCreate">Description</label>
            <input type="text" id="taskDescriptionCreate" name="taskDescription" value="">
        </p>
        <input type="submit" value="Créer">
    </form>
</div>
