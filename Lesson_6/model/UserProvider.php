<?php
require_once 'User.php';

class UserProvider
{
    private $accounts = [
        'admin' => 'admin',
    ];

    public function getByUsernameAndPassword(string $username, string $password): ?User
    {
        $expectedPassword = $this->accounts[$username] ?? null;
        if ($expectedPassword === $password) {
            return new User($username);
        }
        return null;
    }

}