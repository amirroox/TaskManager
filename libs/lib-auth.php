<?php

function is_Login(): bool
{
    return isset($_SESSION['user_login']);
}
function getCurrentUserId() :int
{
    return $_SESSION['user_login']['id'] ?? 0 ;
}

function signUpUser($main): bool
{
    $name = $main['user-up'];
    $email = $main['email-up'];
    $pass = $main['pass-up'];
    $pass = password_hash($pass,PASSWORD_DEFAULT);
    global $db_connection;
    $str = 'SELECT * from users where email = ?' ;
    $stmt = $db_connection->prepare($str);
    $stmt->execute([$email]);
    if(!$stmt->fetch()) {
        $query = 'INSERT INTO users (name, email, password)
              VALUES (:name , :email , :password)' ;
        $stmt = $db_connection -> prepare($query);
        $stmt->execute([':name'=> $name , ':email'=> $email , ':password'=> $pass]);
        $result = $db_connection->prepare('SELECT * from users where email = ?');
        $result->execute([$email]);
        $_SESSION['user_login'] = $result->fetch();
        return true;

    }
    else {
        massage_error('Email is already available !');
        return false;
    }
}

function signInUser($main): bool
{
    $email = $main['email-in'];
    $pass = $main['pass-in'];
    global $db_connection;
    $str = 'SELECT * from users where email = ?' ;
    $stmt = $db_connection->prepare($str);
    $stmt->execute([$email]);
    $user = $stmt->fetch() ;
    if($user) {
        if (password_verify($pass,$user[3])) {
            $_SESSION['user_login'] = $user ;
            return true ;
        }
        else {
            return false;
        }
    }
    else {
        return false;
    }
}
