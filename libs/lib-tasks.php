<?php

/*** FOLDER FUNCTION ***/
function get_folder(): false|array
{   // Get All Folder
    global $db_connection;
    $user_id = getCurrentUserId();
    $stmt = $db_connection->prepare("SELECT * from folders where user_id = $user_id");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function add_folder($name_folder): false|array
{   // add One Folder
    global $db_connection;
    $user_id = getCurrentUserId();
    $stmt = $db_connection->prepare("INSERT INTO folders (user_id,name) VALUES ($user_id , ?)");
    $stmt->execute([$name_folder]);
    $Folder_id = $db_connection->prepare("select id from folders ORDER BY id DESC LIMIT 1");
    $Folder_id -> execute();
    return $Folder_id->fetch(PDO::FETCH_ASSOC);

}
function delete_folder($id_Folder): int
{   // Delete One Folder
    global $db_connection;
    $stmt = $db_connection->prepare("DELETE from folders where id = $id_Folder");
    $stmt->execute();
    return $stmt->rowCount();
}

/*** Tasks FUNCTION ***/
function get_tasks($folder_id): false|array
{   // Get All Tasks By $folder_id
    global $db_connection;
    $user_id = getCurrentUserId();
    $stmt = $db_connection->prepare("SELECT * from tasks where user_id = $user_id and folder_id = $folder_id");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function get_all_tasks($Limit = 2): false|array
{   // Get All Tasks By Limit
    global $db_connection;
    $user_id = getCurrentUserId();
    $stmt = $db_connection->prepare("SELECT * from tasks where user_id = $user_id LIMIT $Limit");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function add_tasks($folder_id , $name_Tasks )
{   // add One Tasks
    global $db_connection;
    $user_id = getCurrentUserId();
    $stmt = $db_connection->prepare("INSERT INTO tasks (user_id, folder_id, title) VALUES ($user_id , ? , ?)");
    $stmt->execute([$folder_id,$name_Tasks]);
    $Tasks_id = $db_connection->prepare("select * from tasks ORDER BY id DESC LIMIT 1");
    $Tasks_id -> execute();
    return $Tasks_id->fetch();

}
function delete_tasks($id_tasks , $all = null) :mixed
{   // Delete One Tasks and all
    global $db_connection;
    $result = $db_connection->prepare("SELECT * from tasks where id = $id_tasks");
    $result->execute();
    if(isset($all)){
        $stmt = $db_connection->prepare("DELETE from tasks where folder_id = $all");
    }
    else {
        $stmt = $db_connection->prepare("DELETE from tasks where id = $id_tasks");
    }
    $stmt->execute();
    return $result->fetch(PDO::FETCH_ASSOC);
}

function update_tasks($status_task,$id_task): int
{
    global $db_connection;
    $stmt = $db_connection->prepare('UPDATE tasks set status = ? WHERE id = ?');
    $stmt -> execute([!$status_task,$id_task]);
    return $stmt->rowCount();
}