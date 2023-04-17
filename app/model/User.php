<?php

namespace App\Model;

use App\Table\UserTable;

require_once('./app/table/UserTable.php');
class User extends UserTable
{
    public function __construct()
    {
        parent::__construct();
    }


public function create(string $email, string $password): int|null
{
    $password = $this->hashPassword($password);
    return $this->insert($email, $password, false);
}

public function makeUserAdmin(string $email): bool
{
    return false;
}

public function removeAdmin(string $email): bool
{
    return false;
}

public function getUserByEmail(string  $email):void
{
    $this->setUserByEmail($email);
}

public function login(string $email, string $password): bool
{
    return false;
}

public function logout(): void
{
}
/**
 * @return array<User> can be aray of null
 */
public function getUsers(): array
{
    $arrayUsers = [];
    //code to get all users from database
    return $arrayUsers;
}


private function hashPassword($password): string
{
    $options = [
      'memory_cost' => 2048,
      'time_cost' => 4,
      'threads' => 2
    ];
    $hash = password_hash($password, PASSWORD_ARGON2ID, $options);
    return $hash;
}

  public function verifyPassword(string $password, string $hash): bool
  {
      if (password_verify($password, $hash)) {
          return true;
      } else {
          return false;
      }
  }
}
