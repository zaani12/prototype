<?php

namespace App\Exceptions\pkg_rh;

use App\Exceptions\BusinessException;

class FormateurAlreadyExistException extends BusinessException
{
    public static function createFormateur()
    {
        return new self(__('Formateur already existe'));
    }
}