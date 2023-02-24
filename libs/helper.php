<?php

function dieecho($msg): void
{
    echo "<div style='padding: 13px;
            display: inline-block;
            color: red;
            text-align: center;    
            background-color: yellow;
            border-radius: 20px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font-size: 26px;
            width: 80%;
'>$msg</div>";
    die();
}
function isAjax() :bool {
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        return true;
    }
    return false;
}

function site_url($url = ''): string
{
    return BASE_URL . $url ;
}