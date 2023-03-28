<?php
namespace  App;

//function shall be camelCase
//function must have clear name
//function shall be declear what doing!!!
//function shall declear its return type
//function shall has a comment if it needed

class CleanCodeConcept {
   //constant must be FULL CAPITAL, underscore for next word is allowed
const DOMAIN_NAME = "MyWeb.de";
   //properties musst be camecase or depend on the Team. can snake_case;
   public int $id;
   public string $user_id;
   




   public function createUser():int|false {
return false;
   }
   public function printNameOnConsole():void {
      
   }
}