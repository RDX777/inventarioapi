<?php

namespace App\Exceptions;

use Exception;

class DatabaseException extends Exception
{
    public function render(){
        return response()->json([
            'message' => 'database invalida'
        ], 500);
    }
}
