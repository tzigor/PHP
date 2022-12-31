<?php

class User {
    private string $username;
    private string $email;
    private ?string $sex;
    private ?int $age;
    private bool $isActive = true;
    private DateTime $dateCreated;
 
    // function __construct(string $username, string $email)
    function __construct(string $username)
    {
        $this->username = $username;
        // $this->email = $email;
        $this->dateCreated = new DateTime();
    }
 
    function getUsername(): string
    {
        return $this->username ?? 'unknown';
    }

    public function setAge(?int $age): void
    {
       if ($age == null) {
           $this->age = null;
       } elseif ($age > 0 && $age <= 125) {
           $this->age = $age;
       }
    }

    public function getAge(): ?int
    {
       return $this->age;
    }
 }