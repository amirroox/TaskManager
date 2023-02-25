<?php

include 'bootstrap/init.php';


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_GET['action'] == 'signup') {
        if(isset($_POST['user-up']) && isset($_POST['email-up']) && isset($_POST['pass-up'])) {
            if(strlen($_POST['user-up']) < 4) {
                massage_error('Please enter more than 4 characters for username');
            }
            else if(strlen($_POST['pass-up']) < 8){
                massage_error('Please enter more than 8 characters for PassWord');
            }
            else {
                if(signUpUser($_POST)) {
                    massage_success('Registration was successful ... UPDATE');
                    header('Location:'.site_url('index.php'));
                }
            }

        }
        else {
            massage_error('FILL THE INPUT');
        }
    }
    if($_GET['action'] == 'login') {
        if(isset($_POST['email-in']) && isset($_POST['pass-in'])) {
            if(signInUser($_POST)) {
                massage_success('Registration was successful');
                header('Location:'.site_url('index.php'));
            }
            else {
                massage_error('Your password or email is not correct !');
            }

        }
        else {
            massage_error('FILL THE INPUT');
        }
    }
}


include 'views/tpl-auth.php';