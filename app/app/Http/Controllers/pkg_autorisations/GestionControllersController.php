<?php

namespace App\Http\Controllers\pkg_autorisations;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AppBaseController;
// use App\Exceptions\Autorisation\ControllerExceptions;
use App\Models\pkg_autorisations\Controller;
use App\Exceptions\pkg_autorisations\ControllerExceptions;
use App\Repositories\pkg_autorisations\GestionControllersRepository;

class GestionControllersController extends AppBaseController
{
    protected $controllersRepository;

    public function __construct(GestionControllersRepository $controllersRepository)
    {
        $this->controllersRepository = $controllersRepository;
        
    }

    public function index()
    {
        $controllers = $this->controllersRepository->paginate();
        return view('pkg_autorisations.controllers.index', compact('controllers'));
    }

    public function create()
    {
        return view('pkg_autorisations.controllers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255'
        ], );

        try {
            $this->controllersRepository->create($validatedData);
            return redirect()->route('controllers.index')->with('success', __('pkg_autorisations/controllers/message.CreatedController'));
        } catch (ControllerExceptions $e) {
            return redirect()->back()->withErrors(['nom' => $e->getMessage()])->withInput();
        } catch (ControllerExceptions $e) {
            return redirect()->back()->withErrors(['nom' => $e->getMessage()])->withInput();
        } catch (\Exception $e) {
            Log::error('Error de créer le controller: ' . $e->getMessage());
            return redirect(500);
            // return redirect()->route('error-page')->with('error', 'Une erreur s\'est produite. Veuillez réessayer plus tard.');
        }
    }

    public function edit(Controller $controller)
    {
        return view('pkg_autorisations.controllers.edit', compact('controller'));
    }

    public function update(Request $request, Controller $controller)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
        ]);

        try {
            $this->controllersRepository->update($controller->id, $validatedData);
            return redirect()->route('controllers.index')->with('success', __('pkg_autorisations/controllers/message.UpdatedController'));
        } catch (ControllerExceptions $e) {
            return redirect()->back()->withErrors(['nom' => $e->getMessage()])->withInput();
        } catch (ControllerExceptions $e) {
            return redirect()->back()->withErrors(['nom' => $e->getMessage()])->withInput();
        } catch (\Exception $e) {
            Log::error('Error de mise a jour le controller: ' . $e->getMessage());
            return redirect(500);
        }

    }

    public function destroy(Controller $controller)
    {
        try {
            $this->controllersRepository->destroy($controller->id);
            return redirect()->route('controllers.index')->with('success', __('pkg_autorisations/controllers/message.DeletedController'));
        } catch (\Exception $e) {
            Log::error('Error de supprimer le controller: ' . $e->getMessage());
            return redirect(500);
        }
    }

    public function downloadSeeder(Request $request)
    {
        try {
            Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\pkg_autorisations\\ControllerSeeder']);
            return redirect()->route('controllers.index')->with('success', __('pkg_autorisations/controllers/message.DownloadSeeder'));
        } catch (\Exception $e) {
            Log::error('Error running seeder: ' . $e->getMessage());
            return redirect()->back()->with('error', __('pkg_autorisations/controllers/message.errorDownloadSeeder'));
        }
    }
}