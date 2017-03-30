<?php

function get_user ( $email, $password ) {
    $pdo = connectDB();
    if ( $pdo ) {
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        try {
            $pdoSt = $pdo -> prepare( $sql );
            $pdoSt -> execute( [
                ':email' => $email,
                ':password' => $password,
            ] );
            return $pdoSt -> fetch();

        } catch ( PDOException $e ) {
            return false;
        }
    } else {
        return false;
    }
}
