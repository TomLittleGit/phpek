<?php
namespace App\Table;
require_once('QueryProvider.php');
use Table\Database\QueryProvider;

 //CRUD  = Create Read Update Delete
class ProfileTable extends QueryProvider {
   public int $id;
   public ?int $user_id;
   public ?string $first_name;
   public ?string $last_name;
   public ?string $picture;


   public function __construct() {
      
      parent::__construct();
   }

   public function selectProfileByUserId(int $user_id)
   {
      $query = "SELECT * FROM profiles WHERE user_id = :user_id";
      $array = [':user_id'=>$user_id];
      $result = $this->selectQuery($query,$array);
      
      if(is_array($result) && count($result) > 0)
      {
         $this->convertSelectResultToObject($result);
      }
   }

   public function insert()
   {

   }

   public function update()
   {

   }

   public function delete()
   {

   }


   private function convertSelectResultToObject(array $tableRow)
   {
      if(is_array($tableRow))
      {
         $this->id = $tableRow['id'];
         $this->user_id = $tableRow['user_id'];
         $this->first_name = $tableRow['first_name'];
         $this->last_name = $tableRow['last_name'];
         $this->picture = $tableRow['picture'];
      }
   }
}