<?php

include( 'models/taskModel.php' );
include( 'models/task_userModel.php' );

function index () {
    $view = 'views/auth/login.php';
    $tasks = [];

    if ( $_SESSION[ 'user' ] ) {
        $view = 'views/task/index.php';
        $tasks = getUserTasks( $_SESSION[ 'user' ] );
    }
    return compact( 'view', 'tasks' );
}

function create () {
    $view = 'views/auth/login.php';
    if ( $_SESSION[ 'user' ] ) {
        $taskDescription = $_POST[ "taskDescription" ];
        createTask( $taskDescription );
        $taskId = getLastInsertId();
        addTaskToUser( $taskId, $_SESSION[ 'user' ] );

        header("Location: http://progra2017.app/Course07_23-03-2017/exo/try/index.php?ressource=task&action=index");
        die();
    }
    return compact( 'view' );
}

function getUpdate () {
    $view = 'views/auth/login.php';
    $tasks = [];
    $taskId = $_REQUEST[ 'id' ];

    if ( $_SESSION[ 'user' ] ) {
        $view = 'views/task/index.php';
        $tasks = getUserTasks( $_SESSION[ 'user' ] );
        foreach ( $tasks as $task ) {
            if ( $task -> taskId === $taskId ) {
                $task -> editable = 1;
            } else {
                $task -> editable = 0;
            }
        }
    }
    return compact( 'view', 'tasks' );
}

function postUpdate () {
    $view = 'views/auth/login.php';

    if ( $_SESSION[ 'user' ] ) {
        $taskId = $_REQUEST[ 'id' ];
        $taskDescription = $_POST[ 'taskDescription' ];
        $taskIsDone = $_POST[ 'taskIsDone' ];
        editTask( $taskId, $taskDescription, $taskIsDone );

        header("Location: http://progra2017.app/Course07_23-03-2017/exo/try/index.php?ressource=task&action=index");
        die();
    }
    return compact( 'view' );
}

function delete () {
    $view = 'views/auth/login.php';
    if ( $_SESSION[ 'user' ] ) {
        $taskId = $_REQUEST[ 'id' ];
        deleteTask( $taskId );

        header("Location: http://progra2017.app/Course07_23-03-2017/exo/try/index.php?ressource=task&action=index");
        die();
    }
    return compact( 'view' );
}
