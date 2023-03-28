<?php

namespace App\View;

class BaseView
{
    public static function alert(string $type, string $message)
    {
        echo '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">'.
             $message.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}
