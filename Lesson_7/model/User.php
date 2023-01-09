<?php

class User
{
    private string $username;
    private string $name;
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

    function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    function getName(): string
    {
        return $this->name ?? 'unknown';
    }

    function setName(string $name): self
    {
        $this->name = $name;
        return $this;
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
