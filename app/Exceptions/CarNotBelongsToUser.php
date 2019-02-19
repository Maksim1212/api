<?php

namespace App\Exceptions;

use Exception;

class CarNotBelongsToUser extends Exception
{
    public function render()
    {
        return ['errors' => 'Car not belongs to user'];
    }
}
