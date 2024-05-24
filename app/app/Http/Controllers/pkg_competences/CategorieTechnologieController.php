<?php

namespace App\Http\Controllers\pkg_competences;

use App\Exceptions\pkg_competences\categorietechnologieException;
use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_competences\CategorieTechnologie;
use App\Repositories\pkg_competences\categorietechnologieRepository;
use Illuminate\Http\Request;

class CategorieTechnologieController extends Controller
{

    protected $CategorieTechnologie;
    public function __construct(categorietechnologieRepository $categorieTechnologie)
    {

        $this->CategorieTechnologie = $categorieTechnologie;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $categorieTechnologiesData = $this->CategorieTechnologie->searchData($searchQuery);
                return view('pkg_competences.CategorieTechnologie.index', compact('categorieTechnologiesData'))->render();
            }
        }
        $categorieTechnologiesData = $this->CategorieTechnologie->paginate();
        return view('pkg_competences.CategorieTechnologie.index', compact('categorieTechnologiesData'));
    }

    public function create()
    {
        return view('pkg_competences.CategorieTechnologie.create');
    }

    public function store(CategorieTechnologie $request)
    {
        try {
            $data = $request->validated();
            $this->CategorieTechnologie->create($data);
            return redirect()->route('CategorieTechnologie.index')->with('success', __('pkg_competences.CategorieTechnologie.singular') . ' ' . __('app.addSucées'));
        } catch (categorietechnologieException $e) {
            return back()->withInput()->withErrors($e);
        }
    }
    public function show($id)
    {
        $fetchedData = $this->CategorieTechnologie->find($id);
        return view('pkg_competences.CategorieTechnologie.show', compact('fetchedData'));
    }
    public function edit($id)
    {
        $dataToEdit = $this->CategorieTechnologie->find($id);
        return view('pkg_competences.CategorieTechnologie.edit', compact('dataToEdit'));
    }

    public function update(CategorieTechnologie $request, $id)
    {
        try {
            $data = $request->validated();
            $this->CategorieTechnologie->update($id, $data);
            return redirect()->route('CategorieTechnologie.index')->with('success', 'Categorie Technologie ' . __('app.updateSucées'));
        } catch (categorietechnologieException $e) {
            return back()->withInput()->withErrors($e);
        }
    }

}
