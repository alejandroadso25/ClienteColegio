<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Importación para usar clases
use Illuminate\Contracts\View\View; // Importación para solicitudes HTTP
use Illuminate\Http\RedirectResponse; // Importación que permite respuesta de redirección

class ModuleController extends Controller
{
    // Método privado para usar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    

    // Listar modulos en formulario:
    public function index(): View
    {
        // Variable de SERVER API:
        $url = env('URL_SERVER_API');
        $modules = $this->fetchDataFromApi($url.'/modules');

        // Renderiza la vista y envia respuesta
        return view('Modules.index', [
            'modules' => $modules,
            'showForm' => false,
        ]);
    }
    
    // Mostrar el formulario de creación de modulos:
    public function create(): View {
        // Variable de SERVER API:
        $url = env('URL_SERVER_API');
        $modules = $this->fetchDataFromApi($url.'/modules');
        
        // Renderiza la vista y envia respuesta:
        return view('Modules.create', [
            'modules' => $modules,
            'showForm' => true,
        ]);
    }

    // Metodo Post: Crear modulo desde la vista
    public function store(Request $request): RedirectResponse
    {
        $url = env('URL_SERVER_API');
        Http::post($url.'/modules', $request->all());
        // Busca el nombre de la ruta
        return redirect()->route('modules.index');
    }

    // Consultar un modulo específico:
    public function show($id): View
    {
        // Variable de SERVER API:
        $url = env('URL_SERVER_API');
        $module = $this->fetchDataFromApi($url.'/modules/'.$id);
        return view('Modules.show', compact('module'));
    }

     // Mostrar el formulario para editar un modulo específico:
    public function edit($id): View
    {
        // Variable de SERVER API:
        $url = env('URL_SERVER_API');
        $module = $this->fetchDataFromApi($url.'/modules/'.$id);

        return view('Modules.edit', compact('module'));
    }

    // Actualizar modulo:
    public function update(Request $request, $id): RedirectResponse
    {
        $url = env('URL_SERVER_API');
        Http::put($url.'/modules/'.$id, $request->all());

        return redirect()->route('modules.index');
    }

    // Eliminar Modulo:
    public function destroy($id): RedirectResponse
    {
        $url = env('URL_SERVER_API');
        Http::delete($url.'/modules/'.$id);

        return redirect()->route('modules.index');
    }
}
