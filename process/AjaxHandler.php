<?php

include_once "../bootstrap/init.php";

if(!isAjax()) {
    dieecho("INVALID ITEMS");
}

switch ($_POST['action']){
    case 'ADD_FOLDER' : {
        if(!isset($_POST['name_Fo']) || mb_strlen($_POST['name_Fo']) < 3) {
            dieecho("INVALID ITEMS");
        }
        else {
            $Profile_id = add_folder($_POST['name_Fo']);
            echo $Profile_id['id'];
        }
        break;
    }
    case 'ADD_TASKS' : {
        $url_c = explode('=' , $_POST['url']) ;
        if(!is_numeric(end($url_c))) {
            die();
        }
        else {
            if (!isset($_POST['name_Ta']) || mb_strlen($_POST['name_Ta']) < 3) {
                die();
            }
            else {
                $last_task = add_tasks(end($url_c),$_POST['name_Ta']);
                echo $last_task['title']."*".$last_task['id']."*".$last_task['created_at']."*".$last_task['status'];
            }
        }
        break;
    }
    case 'UPDATE_TASKS' : {
        $url_c = explode('*' , $_POST['update_Ta']) ;
        if(!is_numeric(end($url_c)) or (($url_c[0] != 1) and ($url_c[0] != 0))) {
            die();
        }
        else {
            update_tasks($url_c[0],end($url_c));
            if ($url_c[0]==1){
                echo 1;
            }
            else{
                echo 0;
            }
        }
        break;
    }
    default : dieecho("INVALID ITEMS");
}


