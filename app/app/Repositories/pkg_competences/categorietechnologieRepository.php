<?php
namespace App\Repositories\pkg_competences;

use App\Models\pkg_competences\categorietechnologie;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\pkg_competences\categorietechnologieException;

class categorietechnologieRepository extends BaseRepository
{
        /**
     * Les champs de recherche disponibles pour les projets.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'name'
    ];

    /**
     * Renvoie les champs de recherche disponibles.
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

    /**
     * Constructeur de la classe ProjetRepository.
     */
    public function __construct()
    {
        parent::__construct(new categorietechnologie());
    }

    public function create(array $data){
        return parent::create($data);
    }
}
