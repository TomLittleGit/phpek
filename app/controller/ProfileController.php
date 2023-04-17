<?php
namespace App\Controller;
use App\Model\Profile;
require_once('./app/model/Profile.php');

class ProfileController extends Profile{

    public function __construct()
    {
        parent::__construct();
    }
    
   
}