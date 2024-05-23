<?php 
    // --- Redirect user to page ? --- //
    function redirect($page) {
        header('Location: ' . $page);
        die;
    }

    // --- Remove special characters --- //
    function esc($str) {
        return htmlspecialchars($str ?? '');
    }

    // --- Save form values --- //
    function old_value($key) {
        if(!empty($_POST[$key])) {
            return $_POST[$key];
        }
        return "";
    }

    function old_checked($key) {
        if(!empty($_POST[$key])) {
            return " checked ";
        }
        return "";
    }

    // --- Authenticate user information --- //
    function authenticate($row) {
        $_SESSION['USER'] = $row;
    }

    function logged_in() {
        if(!empty($_SESSION['USER'])) {
            return true;
        }
        return false;
    }

    // --- String to URL --- //
    function str_to_url($url) {
        $url = str_replace("'", "", $url);
        $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
        $url = trim($url, "-");
        $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
        $url = strtolower($url);
        $url = preg_replace('~[^-a-z0-9_]+~', '', $url);

        return $url;
    }
    
    // --- Query function --- //
    function query(string $query, array $data = []) {
        $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
        $con = new PDO($string, DBUSER, DBPASS);

        // --- Check if database exists --- //
        $stm = $con->prepare($query);
        $stm->execute($data);

        // --- Grab array of information --- //
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        if(is_array($result) && !empty($result)) {
            return $result;
        }
        return false;
    }
    
    // --- Create database + tables --- //
    // create_table();
    function create_table() {
        $string = "mysql:hostname=localhost;";
        $con = new PDO($string, DBUSER, DBPASS);

        // --- Check if database exists --- //
        $query = "create database if not exists " . DBNAME;
        $stm = $con->prepare($query);
        $stm->execute();

        // --- Use created database --- //
        $query = "use " . DBNAME;
        $stm = $con->prepare($query);
        $stm->execute();

        // --- Create User Table --- //
        $query = "create table if not exists users(
            id int primary key auto_increment,
            username varchar(50) not null,
            email varchar(100) not null,
            password varchar(255) not null,
            image varchar(1024) null,
            date datetime default current_timestamp,
            role varchar(10) not null,

            key username (username),
            key email (email)
        )";
        $stm = $con->prepare($query);
        $stm->execute();

        // --- Create Categories Table --- //
        $query = "create table if not exists categories(
            id int primary key auto_increment,
            category varchar(50) not null,
            slug varchar(100) not null,
            disabled tinyint default 0,

            key category (category),
            key slug (slug)
        )";
        $stm = $con->prepare($query);
        $stm->execute();

        // --- Create Posts Table --- //
        $query = "create table if not exists posts(
            id int primary key auto_increment,
            user_id int,
            category_id int,
            title varchar(100) not null,
            content text null,
            image varchar(1024) null,
            date datetime default current_timestamp,
            slug varchar(100) not null,

            key user_id (user_id),
            key category_id (category_id),
            key title (title),
            key slug (slug),
            key date (date)
        )";
        $stm = $con->prepare($query);
        $stm->execute();
    }