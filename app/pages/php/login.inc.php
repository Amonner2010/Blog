<?php 
    if(!empty($_POST)) {
        // Validate
        $errors = [];

        // Read from a database
        $query = "select * from users where email = :email limit 1";
        $row = query($query, ['email'=>$_POST['email']]);

        if($row) {
            $data = [];
            if(password_verify($_POST['password'], $row[0]['password'])) {
                // grant access
                authenticate($row);
                redirect('admin');
            } else {
                $errors['email'] = "wrong email or password";
            }
        } else {
            $errors['email'] = "wrong email or password";
        }
    }