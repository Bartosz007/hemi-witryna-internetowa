<?php

require_once "Repository.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__."/../helpers/SETTINGS.php";

class UserRepository extends Repository
{

    public function getUser(string $email, string $password): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "hemi-site"."users" 
            LEFT JOIN "hemi-site"."user_details"
            USING("id_user_details")
            WHERE "email" = :email
            AND "password" = :password;
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['admin'],
            $user['avatar']
        );

    }

    public function addUser(User $user, array $avatar): bool{

        if(! $this->isUserAlreadyExists($user))
            return false;

        $stmt = $this->database->connect()->prepare('
            INSERT INTO "hemi-site"."user_details" (surname, name, avatar, created)
            VALUES (?, ?, ?, ?);
        ');

        $date = new DateTime();
        $fileid = explode("/",$avatar["tmp_name"])[2];
        $ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);
        $filename =  $fileid.rand().".".$ext;

        $stmt->execute([
            $user->getSurname(),
            $user->getName(),
            $filename,
            $date->format('Y-m-d')
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO "hemi-site"."users" (id_user_details, email, password)
            VALUES (?, ?, ?);
        ');

        $stmt->execute([
            $this->getUserDetailsId($filename), //najlepiej identyfikować po nazwie +ścieżce avaratara, bo jest unikalna
            $user->getEmail(),
            $user->getPassword()
        ]);

        move_uploaded_file(
            $avatar["tmp_name"],
            dirname(__DIR__).AVATAR_UPLOAD_DIRECTORY.$filename
        );

        return true;

    }

    public function isUserAlreadyExists(User $user): bool{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "hemi-site"."users" WHERE email = :email; 
        ');

        $email = $user->getEmail();

        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();

        $operation = $stmt->fetch(PDO::FETCH_ASSOC);

        if($operation)
            return false;
        else
            return true;
    }

    public function getUserDetailsId(string $filename): int{

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "hemi-site"."user_details" WHERE avatar = :avatar; 
        ');

        $stmt->bindParam(":avatar", $filename, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data["id_user_details"];
    }

}