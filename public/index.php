<?php 
    session_start();
    require "../app/core/init.php";
    
    // --- Grab the URL --- //
    $url = $_GET['url'] ?? 'home';
    $url = strtolower($url);
    $url = explode("/", $url);

    // --- Grab the file name from URL --- //
    $page_name = trim($url[0]);
    $filename = "../app/pages/" . $page_name . ".php";

    // --- Check file exists? --- //
    if(file_exists($filename)) {
        require_once $filename;
    } else {
        require_once "../app/pages/404.php";
    }

    