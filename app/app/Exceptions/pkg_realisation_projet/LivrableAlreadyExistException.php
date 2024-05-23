<?php

namespace App\Exceptions\pkg_realisation_projet;

use Exception;

class LivrableAlreadyExistException extends Exception
{
    public function __construct()
    {
        parent::__construct("Livrable already exists.");
    }

    public function render($request)
    {
        return response()->json(['error' => 'Livrable already exists'], 409);
    }
}

<?php

namespace App\Exceptions\GestionProjets;

use App\Exceptions\BusinessException;

class ProjectAlreadyExistException extends BusinessException
{
    public static function createProject()
    {
        return new self(__('GestionProjets/projet/message.createProjectException'));
    }
}