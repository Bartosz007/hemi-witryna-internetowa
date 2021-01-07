<?php


class User
{
    private string $email;
    private string $password;
    private string $name;
    private string $surname;
    private bool $admin;
    private string $file;



    public function __construct(string $email, string $password,
                                string $name, string $surname,
                                bool $admin = false, string $file="none")
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->file = $file;
        $this->admin = $admin;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }


    public function isAdmin(): bool
    {
        return $this->admin;
    }

    public function getFile(): string
    {
        return $this->file;
    }

}