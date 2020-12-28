<?php


class Admin extends User
{
    private User $user;
    private string $description;

    public function __construct(User $user, string $description)
    {
        $this->user = $user;
        $this->description = $description;
    }

    public function getEmail(): string
    {
        return $this->user->getEmail();
    }


    public function getName(): string
    {
        return $this->user->getName();
    }


    public function getSurname(): string
    {
        return $this->user->getSurname();
    }

    public function getFile(): string
    {
        return $this->user->getFile();
    }

    public function getDescription(): string
    {
        return $this->description;
    }

}