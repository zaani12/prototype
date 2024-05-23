<?php

namespace App\Http\Controllers\pkg_competences;

use App\Exceptions\pkg_competences\CompetenceAlreadyExistException;
use App\Http\Controllers\Controller;
use App\Imports\pkg_competences\CompetenceImport;
use App\Models\pkg_competences\Competence;
use Illuminate\Http\Request;
use App\Http\Requests\pkg_competences\CompetenceRequest;
use App\Repositories\pkg_competences\CompetenceRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use App\Exports\pkg_competences\CompetenceExport;
use Maatwebsite\Excel\Facades\Excel;

class CompetenceController extends AppBaseController
{
    protected $competenceRepository;
    public function __construct(CompetenceRepository $competenceRepository)
    {
        $this->competenceRepository = $competenceRepository;
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $competenceData = $this->competenceRepository->searchData($searchQuery);
                return view('pkg_competences.competence.index', compact('competenceData'))->render();
            }
        }
        $competenceData = $this->competenceRepository->paginate();
        return view('pkg_competences.competence.index', compact('competenceData'));
    }


    public function create()
    {
        $dataToEdit = null;
        return view('pkg_competences.competence.create', compact('dataToEdit'));
    }


    public function store(CompetenceRequest $request)
    {

        try {
            $validatedData = $request->validated();
            $this->competenceRepository->create($validatedData);
            return redirect()->route('competences.index')->with('success',__('pkg_competences/competence.singular').' '.__('app.addSucées'));

        } catch (CompetenceAlreadyExistException $e) {
            return back()->withInput()->withErrors(['competence_exists' => __('pkg_competences/competence/message.createProjectException')]);
        } catch (\Exception $e) {
            return abort(500);
        }
    }


    public function show(string $id)
    {
        $fetchedData = $this->competenceRepository->find($id);
        return view('pkg_competences.projet.show', compact('fetchedData'));
    }


    public function edit(string $id)
    {
        $dataToEdit = $this->projectRepository->find($id);
        $dataToEdit->date_debut = Carbon::parse($dataToEdit->date_debut)->format('Y-m-d');
        $dataToEdit->date_de_fin = Carbon::parse($dataToEdit->date_de_fin)->format('Y-m-d');

        return view('GestionProjets.projet.edit', compact('dataToEdit'));
    }


    public function update(projetRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->projectRepository->update($id, $validatedData);
        return redirect()->route('projets.index', $id)->with('success',__('GestionProjets/projet.singular').' '.__('app.updateSucées'));
    }


    public function destroy(string $id)
    {
        $this->projectRepository->destroy($id);
        return redirect()->route('projets.index')->with('success', 'Le projet a été supprimer avec succés.');
    }


    public function export()
    {
        $projects = projet::all();

        return Excel::download(new ProjetExport($projects), 'projet_export.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new ProjetImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('projets.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('projets.index')->with('success',__('GestionProjets/projet.singular').' '.__('app.addSucées'));
    }
}
