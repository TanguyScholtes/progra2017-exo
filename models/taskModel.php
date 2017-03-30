<?php

function getUserTasks ( $userId ) {
    $pdo = connectDB();
    if ( $pdo ) {
        $sql = "SELECT tasks.id AS taskId, tasks.description AS taskDescription, tasks.is_done AS taskIsDone
                FROM tasks
                LEFT JOIN task_user ON tasks.id = task_user.task_id
                LEFT JOIN users ON task_user.user_id = users.id
                WHERE users.id = :userId
                ORDER BY description ASC";
        try {
            $pdoSt = $pdo -> prepare( $sql );
            $pdoSt -> execute( [
                ':userId' => $userId,
            ] );
            return $pdoSt -> fetchAll();

        } catch ( PDOException $e ) {
            return false;
        }
    } else {
        return false;
    }
}

function createTask ( $taskDescription ) {
    $pdo = connectDB();
    if ( $pdo ) {
        $sql = "INSERT INTO tasks('description') VALUES(:description)";
        try {
            $pdoSt = $pdo -> prepare( $sql );
            $pdoSt -> execute( [
                ':description' => $taskDescription,
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

function editTask ( $taskId, $taskDescription, $taskIsDone ) {
    $pdo = connectDB();
    if ( $pdo ) {
        $sql = "UPDATE tasks
                SET description = :taskDescription, is_done = :taskIsDone
                WHERE id = :id";
        try {
            $pdoSt = $pdo -> prepare( $sql );
            $pdoSt -> execute( [
                ':id' => $taskId,
                ':taskDescription' => $taskDescription,
                ':taskIsDone' => $taskIsDone,
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

function deleteTask ( $taskId ) {
    $pdo = connectDB();
    if ( $pdo ) {
        $sql = "DELETE FROM tasks WHERE id = :id";
        try {
            $pdoSt = $pdo -> prepare( $sql );
            $pdoSt -> execute( [
                ':id' => $taskId,
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
