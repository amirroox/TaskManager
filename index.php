<?php

include "bootstrap/init.php";
//$current_self_page = $_SERVER['PHP_SELF'] ;

/* Delete Folder Validation */
if(isset($_GET['Delete_folder']) && is_numeric($_GET['Delete_folder'])) {
    delete_folder($_GET['Delete_folder']);
    delete_tasks(1 , $_GET['Delete_folder']);
//    header("Location:$current_self_page");
}
$folders = get_folder();  // array $[0-n]['name']

/* Delete Tasks Validation */
if(isset($_GET['Delete_tasks']) && is_numeric($_GET['Delete_tasks'])) {
    $res = delete_tasks($_GET['Delete_tasks']);
    $res = site_url('?Folder_id='.$res['folder_id']);
    header("Location:$res");    // redirect to main Folder
}

/* Update Tasks Validation - Method 2 - NOT Ajax */
//if(isset($_GET['Update_tasks'])) {
//    $two_arg = explode("*" , $_GET['Update_tasks']) ;  //status and id
//    if(is_numeric($two_arg[0]) and is_numeric($two_arg[1])) {
//        update_tasks($two_arg[0],$two_arg[1]);
//        $h_url = site_url('?Folder_id='.$two_arg[2]);
//        header("Location:$h_url");    // redirect to main Folder
//    }
//}

/* Show Task Validation */
$tasks = get_all_tasks(5) ;
if(isset($_GET['Folder_id']) and is_numeric($_GET['Folder_id'])) {
    $tasks = get_tasks($_GET['Folder_id']);
}

include "views/tpl-task.php";
