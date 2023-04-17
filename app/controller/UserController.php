<?php
namespace App\Controller;
require_once('./app/model/User.php');
use App\Model\User;


class UserController extends User
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register(string $email , string $password): bool
    {
        $newUser = new User();
        $result = $newUser->create($email, $password);
        if ($result) {
            return true;
        }
        return false;
    }

    public function checkEmailFormatValidity(string $email): string|null
    {
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

        // Teste die E-Mail-Adresse gegen das Muster
        if (preg_match($pattern, $email)) {
            return $email; // Gültige E-Mail
        }
        return null;
    }

    public static function checkIfUserExisted(string $email): bool
    {
        $user = new User();
        if ($user->selectByEmail($email)) {
            return true;
        }
        return false;
    }

    public function login(string $email , string $password):bool
    {
        $result = false;
        $this->getUserByEmail($email);

        if($this->id > 0 )
        {
            $result = $this->verifyPassword($password, $this->password);
            if($result)
            {
                $_SESSION['user'] = $this->email;
                $_SESSION['id'] = $this->id;
            }
        }

        return $result;
    }
}
