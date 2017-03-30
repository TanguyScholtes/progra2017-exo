<?php

function addTaskToUser ( $taskId, $userId ) {
    $pdo = connectDB();
    if ( $pdo ) {
        $sql = "INSERT INTO task_user('task_id', 'user_id') VALUES(:taskId, :userId)";
        try {
            $pdoSt = $pdo -> prepare( $sql );
            $pdoSt -> execute( [
                ':taskId' => $taskId,
                ':userId' => $userId,
            ] );
            $pdoSt -> commit();
            return true;

        } catch ( PDOException $e ) {
            return false;
        }
    } else {
        return false;
    }
}
