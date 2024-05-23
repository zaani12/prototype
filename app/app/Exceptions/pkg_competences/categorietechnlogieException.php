<?php

namespace App\Exceptions\pkg_competences;

use Exception;

class categorietechnologieException extends Exception
{
    public static function AlreadyExistCategorieTechnlogie()
    {
        return new self('La Categorie Technlogie existe déjà');
    }
}
