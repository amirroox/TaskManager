<?php

include "constants.php";
include MAIN_DIR."/bootstrap/config.php";
include MAIN_DIR."/vendor/autoload.php";
include MAIN_DIR."/libs/helper.php";


/* Init DataBase ::PDO */
try {
    $db_connection = new PDO(
        "mysql:dbname={$database_config['db']};host={$database_config['host']}",
        $database_config['user'],
        $database_config['pass']
    );
}
catch (PDOException $e){
    dieecho("Connection Failed : " . $e->getMessage());
}

include MAIN_DIR."/libs/lib-auth.php";
include MAIN_DIR."/libs/lib-tasks.php";

