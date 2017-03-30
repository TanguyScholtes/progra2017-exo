<?php

include( 'models/authModel.php' );

function getLogin () {
    $view = 'views/auth/login.php';
    $_SESSION[ 'email' ] = '';
    $_SESSION[ 'user' ] = null;

    return compact( 'view' );
}

function postLogin () {
    $_SESSION[ 'errors' ] = '';

    if ( filter_var( $_POST[ 'email' ], FILTER_VALIDATE_EMAIL ) && isset( $_POST[ 'password' ] ) ) {
        $user = get_user( $_POST[ 'email' ], $_POST[ 'password' ] );
        if ( $user ) {
            $_SESSION[ 'userMail' ] = $user -> email;
            $_SESSION[ 'userName' ] = $user -> name;
            $_SESSION[ 'userFirstName' ] = $user -> first_name;
            $_SESSION[ 'user' ] = $user -> id;

            header("Location: http://progra2017.app/Course07_23-03-2017/exo/try/index.php?ressource=task&action=index");
            die();
        } else {
            $_SESSION[ 'errors' ] = 'Vos identifiants sont invalides.';
            $_SESSION[ 'email' ] = $_POST[ 'email' ];
            $view = 'views/auth/login.php';
        }
    } else {
        $_SESSION[ 'errors' ] = 'Vos identifiants sont invalides.';
        $_SESSION[ 'email' ] = $_POST[ 'email' ];
        $view = 'views/auth/login.php';
    }

    return compact( 'view' );
}

function getLogout () {
    $view = 'views/auth/login.php';
    if ( $_SESSION[ 'user' ] ) {
        $view = 'views/auth/login.php';
        $_SESSION[ 'user' ] = null;
    }
    return compact( 'view' );
}
