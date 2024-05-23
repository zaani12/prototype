<?php

namespace App\Http\Controllers\Pkg_competences;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Pkg_competences\TechnologieRepository;

class TechnologieController extends AppBaseController
{
    protected $TechnologieRepository;
    public function __construct(TechnologieRepository $technologieRepository)
    {
        $this->TechnologieRepository = $technologieRepository;
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $technologieData = $this->TechnologieRepository->searchData($searchQuery);
                return view('Pkg_competences.Technologie.index', compact('technologieData'))->render();
            }
        }
        $technologieData = $this->TechnologieRepository->paginate();
        return view('Pkg_competences.Technologie.index', compact('technologieData'));
    }


    public function create()
    {
        $dataToEdit = null;
        return view('Pkg_competences.Technologie.create', compact('dataToEdit'));
    }


    public function store(projetRequest $request)
    {

        try {
            $validatedData = $request->validated();
            $this->TechnologieRepository->create($validatedData);
            return redirect()->route('projets.index')->with('success', __('Pkg_competences.Technologie.singular') . ' ' . __('app.addSucées'));

        } catch (ProjectAlreadyExistException $e) {
            return back()->withInput()->withErrors(['project_exists' => __('Pkg_competences.Technologie/message.createProjectException')]);
        } catch (\Exception $e) {
            return abort(500);
        }
    }


    public function show(string $id)
    {
        $fetchedData = $this->TechnologieRepository->find($id);
        return view('Pkg_competences.Technologie.show', compact('fetchedData'));
    }


    public function edit(string $id)
    {
        $dataToEdit = $this->TechnologieRepository->find($id);
        $dataToEdit->date_debut = Carbon::parse($dataToEdit->date_debut)->format('Y-m-d');
        $dataToEdit->date_de_fin = Carbon::parse($dataToEdit->date_de_fin)->format('Y-m-d');

        return view('Pkg_competences.Technologie.edit', compact('dataToEdit'));
    }


    public function update(projetRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->TechnologieRepository->update($id, $validatedData);
        return redirect()->route('projets.index', $id)->with('success', __('Pkg_competences.Technologie.singular') . ' ' . __('app.updateSucées'));
    }


    public function destroy(string $id)
    {
        $this->TechnologieRepository->destroy($id);
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
        return redirect()->route('projets.index')->with('success', __('Pkg_competences.Technologie.singular') . ' ' . __('app.addSucées'));
    }
}
