<?php
/*
* By Stefan Schumacher
*/
namespace App\Table;
use Table\Database\QueryProvider;
require_once('./app/table/QueryProvider.php');

class UserTable extends QueryProvider
{

   public int $id;
   public string $email;
   public string $password;
   // when we have boolean var, please use "is" before variable
   public bool $isAdmin;

   //php class constructor

   public function __construct()
   {
      //set id = 0 help to prevent call befre initialization
      $this->id = 0;
      parent::__construct();
   }

   /**
    * @return UserTable if email existed in DB
    * @return null if email does not existed in DB or connection failure 
    */
   public function selectByEmail(string $email):UserTable|null
   {
      $sqlQuery = 'SELECT * FROM users WHERE email = :email';
      $arrayBind = [':email'=>$email];
      $result = $this->selectQuery($sqlQuery,$arrayBind);
      if(isset($result[0]))
      {
         $this->convertSelectResultToObject($result[0]);
         return $this;
      }
      return null;
   }

   public function setUserByEmail(string $email):void
   {
      $sqlQuery = 'SELECT * FROM users WHERE email = :email';
      $arrayBind = [':email'=>$email];
      $result = $this->selectQuery($sqlQuery,$arrayBind);
      if(isset($result[0]))
      {
         $this->convertSelectResultToObject($result[0]);
      }
   }


   
   protected function insert(string $email, string $password , bool $isAdmin = false):int|null
   {
      $sqlQuery = 'INSERT INTO users (email ,password, isAdmin) VALUES (:email,:password,:isAdmin)';
      $arrayBind = [':email'=> $email,':password'=>$password,':isAdmin'=>$isAdmin];
      $result = $this->insertQuery($sqlQuery,$arrayBind);
      var_dump($this->getError());
      return $result;
   }

   public function deleteById(int $id): int|null
   {
      $deleteQuery = 'DELETE FROM users WHERE id = :id';
      $arrayBindDelete = [':id'=>$id];
      return $this->deleteQuery($deleteQuery,$arrayBindDelete);
   }

   public function updatePasswordByEmail(string $email,string $password):int|null
   {      
    $updateQuery = 'UPDATE users SET password = :password WHERE email = :email';    
    $arrayUpdateBindValue = [':password' => $password, ':email' => $email];
    return $this->updateQuery($updateQuery,$arrayUpdateBindValue); 
   }

   public function updateAdminStatusByEmail(string $email, bool $isAdmin):int|null
      {
      $updateQuery = 'UPDATE users SET isAdmin = :isAdmin WHERE email = :email';
      $arrayUpdateBindValue = [':email'=> $email , ':isAdmin' => $isAdmin];
       return $this->updateQuery($updateQuery,$arrayUpdateBindValue);
   }


   private function convertSelectResultToObject(array $tableRow)
   {
      if(is_array($tableRow))
      {
         $this->id = $tableRow['id'];
         $this->email = $tableRow['email'];
         $this->password = $tableRow['password'];
         $this->isAdmin = $tableRow['isAdmin'];
      }
   }

}
