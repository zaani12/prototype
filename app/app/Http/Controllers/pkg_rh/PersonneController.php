<?php

namespace App\Http\Controllers\pkg_rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\pkg_rh\Apprenant;
use App\Models\pkg_rh\Formateur;
use Illuminate\Support\Facades\Route;
use App\Exceptions\pkg_rh\FormateurAlreadyExistException;
use App\Exceptions\pkg_rh\ApprenantAlreadyExistException;



class PersonneController extends Controller
{
   
    public function index(Request $request)
    {
        
        $personnes = $this->getRepositorie()->paginate();
        $type = $this->getType();
        if ($request->ajax()) {
            $searchQuery = $request->get('query');
            if (!empty($searchQuery)) {
                $searchQuery = str_replace(" ", "%", $searchQuery);
                $methodName = 'search' . ucfirst($type);
                $personnes = $this->searchData($searchQuery);
                
                return view('pkg_rh.personne.index', compact('personnes', 'type'))->render();
            }
        }

        return view('pkg_rh.personne.index', compact('personnes', 'type'));
    }


    public function create()
    {
        $type = $this->getType();
        return view('pkg_rh.personne.create',compact('type'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $type = $this->getType();
            $personne =  $this->getRepositorie()->create($data);
            return redirect()->route($type . '.index')->with('success', $type . ' a été ajouté avec succès');
        } catch (FormateurAlreadyExistException $e) {
            return back()->withInput()->withErrors(['' => __('') . ' ' . __('app.existdeja')]);
        } catch (ApprenantAlreadyExistException $e) {
            return back()->withInput()->withErrors(['' => __('') . ' ' . __('app.existdeja')]);
        } catch (\Exception $e) {
            return abort(500);
        }
    }

    public function show($id)
    {
        $type = $this->getType();
        $personne = $this->getRepositorie()->find($id);
        return view('pkg_rh.personne.show', compact('personne'))->with('type', $type);
    }

    public function edit($id)
    {
        $type = $this->getType();
        $personne = $this->getRepositorie()->find($id);
        return view('pkg_rh.personne.edit', compact('personne','type'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $type = $this->getType();
        $personne = $this->getRepositorie()->update($id, $data);
        return back()->with('success', $type.' a été modifiée avec succès');
    }

    public function delete(Request $request ,$id)
    {
        $type = $this->getType();
        $personne = $this->getRepositorie()->delete($id);
        return redirect()->route($type.'.index')->with('success', $type.' a été supprimée avec succès');
    }

    private function getRepositorie(){
        $route = Route::getCurrentRoute()->getName();
        $type = explode('.',$route);
        $model = str::ucfirst($type[0]);
        $modelRepository = $model.'Repositorie';
        $path = "\\App\\Repositories\\personne\\".$modelRepository;

        if($model === 'Formateur'){
            $repository = new $path(new Formateur);
        }elseif($model === 'Apprenant'){
            $repository = new $path(new Apprenant);
        }
        return $repository;
    }

    private function getType(){
        $route = Route::getCurrentRoute()->getName();
        $type = explode('.',$route);
        return $type[0];
    }
}
