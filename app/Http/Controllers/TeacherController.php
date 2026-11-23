<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View; // Importación para solicitudes HTTP
use Illuminate\Http\RedirectResponse; // Importación que redirige respuestas al usuario
use Illuminate\Support\Facades\Http; 

class TeacherController extends Controller
{
    //
    // Método privado para usar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    // Listar profesores en formulario:
    public function index(): View
    {
        // Variable de SERVER API:
        $url = env('URL_SERVER_API');
        $teachers = $this->fetchDataFromApi($url.'/teachers');

        // Renderiza la vista y envia respuesta
        return view('Teachers.index', [
            'teachers' => $teachers,
            'showForm' => false,
        ]);
    }
    
    // Mostrar el formulario de creación de profesores:
    public function create(): View {
        // Variable de SERVER API:
        $url = env('URL_SERVER_API');
        $teachers = $this->fetchDataFromApi($url.'/teachers');
        
        // Renderiza la vista y envia respuesta:
        return view('Teachers.create', [
            'teachers' => $teachers,
            'showForm' => true,
        ]);
    }

    // Metodo Post: Crear profesor desde la vista
    public function store(Request $request): RedirectResponse
    {
        $url = env('URL_SERVER_API');
        Http::post($url.'/teachers', $request->all());
        // Busca el nombre de la ruta
        return redirect()->route('teachers.index');
    }

    // Consultar un modulo específico:
    public function show($id): View
    {
        // Variable de SERVER API:
        $url = env('URL_SERVER_API');
        $teacher = $this->fetchDataFromApi($url.'/teachers/'.$id);
        return view('Teachers.show', compact('teacher'));
    }

     // Mostrar el formulario para editar un profesor específico:
    public function edit($id): View
    {
        // Variable de SERVER API:
        $url = env('URL_SERVER_API');
        $teacher = $this->fetchDataFromApi($url.'/teachers/'.$id);

        return view('Teachers.edit', compact('teacher'));
    }

    // Actualizar modulo:
    public function update(Request $request, $id): RedirectResponse
    {
        $url = env('URL_SERVER_API');
        Http::put($url.'/teachers/'.$id, $request->all());

        return redirect()->route('teachers.index');
    }

    // Eliminar Modulo:
    public function destroy($id): RedirectResponse
    {
        $url = env('URL_SERVER_API');
        Http::delete($url.'/teachers/'.$id);

        return redirect()->route('teachers.index');
    }
}