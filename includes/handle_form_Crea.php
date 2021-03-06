<?php

    $errorMessages = [];
    $successMessages = [];

    // Form sent
    if(!empty($_POST)) // si il est envoyé 
    {

        // Retrieve form data
        $username = trim($_POST['username']);
        $mail = trim($_POST['mail']);
        $password = trim($_POST['password']);// rebot et garde les valeurs

        // Test errors
        if(empty($username))
        {
            $errorMessages[] = 'Missing username';
        }

        if(empty($mail))
        {
            $errorMessages[] = 'Missing mail';
        }

        if(empty($password))
        {
            $errorMessages[] = 'Missing password';
        }

        if(!empty($username) && !empty($mail) && !empty($password))
        {
            $query = $pdo->query("SELECT id FROM users WHERE username='$username'");
            $username_used = $query->fetchAll();

            $query = $pdo->query("SELECT id FROM users WHERE mail='$mail'");
            $mail_used = $query->fetchAll();

            if(!empty($username_used))
            {
                $errorMessages[] = 'Username already used';
            }

            if(!empty($mail_used))
            {
                $errorMessages[] = 'Mail already used';
            }
        }

        // Success
        if(empty($errorMessages))
        {
            $prepare = $pdo->prepare('
                INSERT INTO
                    users (username, mail, password)
                VALUES
                    (:username, :mail, :password)
           ');

            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

            $prepare->bindValue('username', $username);
            $prepare->bindValue('mail', $mail);
            $prepare->bindValue('password', $passwordHash);



            $prepare->execute();

            $successMessages[] = 'User registered';

            $_POST['username'] = '';
            $_POST['mail'] = '';
            $_POST['password'] = '';
        }
    }
    else
    {
        $_POST['username'] = '';  // si y a rien d'envoyé 
        $_POST['mail'] = ''; 
        $_POST['password'] = ''; 
    }