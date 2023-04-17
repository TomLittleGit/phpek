<?php

namespace App\Model;

use App\Table\ProfileTable;

require_once('./app/table/ProfileTable.php');
class Profile extends ProfileTable
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findProfileByUserId(int $user_id):bool
    {
        $this->selectProfileByUserId($user_id);
        if(isset($this->id))
        {
            return true;
        }
        return false;
    }

}

