<?php

require_once "Connection.php";
require_once __DIR__."/../models/User.php";

class UserConnection extends Connection
{

    public function getUser(string $email, string $password): ?User
    {
        $operation = $this->database->connect()->prepare('
            SELECT * FROM "hemi-site"."users" 
            LEFT JOIN "hemi-site"."user_details"
            USING("id_user_details")
            WHERE "email" = :email
            AND "password" = :password;
        ');

        $operation->bindParam(':email', $email, PDO::PARAM_STR);
        $operation->bindParam(':password', $password, PDO::PARAM_STR);

        $operation->execute();

        $user = $operation->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['age'],
            $user['admin']
        );

    }

}