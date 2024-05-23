<?php 
    if(!empty($_POST)) {
        // Validate
        $errors = [];

        // Username errors
        if(empty($_POST['username'])) {
            $errors['username'] = "A username is required";
        } else if(!preg_match("/^[a-zA-Z]+$/", $_POST['username'])) {
            $errors['username'] = "Username can only have letters and no spaces";
        }
        
        // Email errors
        $query = "select id from users where email = :email limit 1";
        $email = query($query, ['email'=>$_POST['email']]);

        if(empty($_POST['email'])) {
            $errors['email'] = "An email is required";
        } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email not valid";
        } else if($email) {
            $errors['email'] = "That email is already in use";
        }

        // Password errors
        if(empty($_POST['password'])) {
            $errors['password'] = "A password is required";
        } else if(strlen($_POST['password']) < 8) {
            $errors['password'] = "Password must be 8 characters or more";
        } else if($_POST['password'] != $_POST['retype_password']) {
            $errors['password'] = "Passwords do not match";
        }

        // Terms error
        if(empty($_POST['terms'])) {
            $errors['terms'] = "Please accept the terms";
        }

        if(empty($errors)) {
            // Database variables
            $data = [];
            $data['username'] = $_POST['username'];
            $data['email'] = $_POST['email'];
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $data['role'] = "user";

            // Save to a database
            $query = "insert into users (username, email, password, role) values (:username, :email, :password, :role)";
            query($query, $data);

            redirect('login');
        }
    }