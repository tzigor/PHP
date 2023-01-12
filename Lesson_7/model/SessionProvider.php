<?php
require_once 'User.php';

class Session
{
    function __construct()
    {
        session_start();
    }

    public function usernameIsSet(): bool
    {
        return isset($_SESSION['username']) && !empty($_SESSION['username']);
    }

    public function saveUser(User $user): void
    {
        $_SESSION['username'] = $user;
    }

    public function getUser(): User
    {
        return $_SESSION['username'];
    }

    public function getUsername(): ?string
    {
        if (isset($_SESSION['username'])) {
            return $_SESSION['username']->getUsername();
        } else return null;
    }

    public function initMode(): int
    {
        if (isset($_SESSION['mode']) && !empty($_SESSION['mode'])) {
            return $this->getMode();
        } else {
            $this->saveMode(0);
            return 0
        }
    }

    public function saveMode(int $mode): void
    {
        $_SESSION['mode'] = $mode;
    }

    public function getMode(): int
    {
        return $_SESSION['mode'];
    }

    public function setMode(): void
    {
        if (!isset($_SESSION['mode']) || $_SESSION['mode'] == 0) {
            $_SESSION['mode'] = 1;
        } else {
            $_SESSION['mode'] = 0;
        }
    }

    public function deleteSession()
    {
        unset($_SESSION['username']);
        unset($_SESSION['mode']);
        session_destroy();
    }
}
