<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{
    // Método privado para consultar la API y devolver la respuesta en formato JSON:
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);

        return $response->json();
    }

    // Listar estudiantes:
    public function index(): View
    {
        $url = env('URL_SERVER_API');
        $students = $this->fetchDataFromApi($url.'/students');

        return view('Students.index', [
            'students' => $students,
        ]);
    }

    // Mostrar el formulario de creación y cargar los estudiantes disponibles para elegir delegado:
    public function create(): View
    {
        $url = env('URL_SERVER_API');
        $students = $this->fetchDataFromApi($url.'/students');

        return view('Students.create', compact('students'));
    }

    // Crear un estudiante y enviar la imagen opcional al API para subirla a Cloudinary:
    public function store(Request $request): RedirectResponse
    {
        // Validar el formato y el tamaño de la imagen antes de enviarla al API:
        $request->validate([
            'imagen' => 'sometimes|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');

            // Adjuntar el archivo con el campo "imagen" que espera el API:
            Http::acceptJson()
                ->attach('imagen', $image->getContent(), $image->getClientOriginalName())
                ->post($url.'/students', $request->except('imagen'))
                ->throw();
        } else {
            Http::acceptJson()
                ->post($url.'/students', $request->except('imagen'))
                ->throw();
        }

        return redirect()->route('students.index');
    }

    // Consultar un estudiante específico:
    public function show($id): View
    {
        $url = env('URL_SERVER_API');
        $student = $this->fetchDataFromApi($url.'/students/'.$id);

        return view('Students.show', compact('student'));
    }

    // Mostrar el formulario de edición y cargar los estudiantes disponibles para elegir delegado:
    public function edit($id): View
    {
        $url = env('URL_SERVER_API');
        $student = $this->fetchDataFromApi($url.'/students/'.$id);
        $students = $this->fetchDataFromApi($url.'/students');

        return view('Students.edit', compact('student', 'students'));
    }

    // Actualizar un estudiante y enviar la nueva imagen al API cuando se adjunte:
    public function update(Request $request, $id): RedirectResponse
    {
        // Validar el formato y el tamaño de la imagen antes de enviarla al API:
        $request->validate([
            'imagen' => 'sometimes|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');

            // Adjuntar el archivo con el campo "imagen" que espera al API:
            Http::acceptJson()
                ->attach('imagen', $image->getContent(), $image->getClientOriginalName())
                ->post($url.'/students/'.$id, $request->except('imagen'))
                ->throw();
        } else {
            Http::acceptJson()
                ->put($url.'/students/'.$id, $request->except('imagen'))
                ->throw();
        }

        return redirect()->route('students.index');
    }

    // Eliminar un estudiante:
    public function destroy($id): RedirectResponse
    {
        $url = env('URL_SERVER_API');
        Http::delete($url.'/students/'.$id);

        return redirect()->route('students.index');
    }
}
