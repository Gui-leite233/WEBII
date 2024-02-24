<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Curso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curso = Curso::all();
        return view('curso.index', compact('curso')); 
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $curso = Curso::all();
        return view('curso.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $obj = new Curso();
        $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
        $obj->descricao = mb_strtoupper($request->descricao, 'UTF-8');
        $timeValue = $request->input('duracao');
        // Formato desejado para armazenamento
        $obj->save();

        return redirect()->route('curso.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('curso.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('curso.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $curso = Curso::find($id);
        if (!$curso) {
            return redirect()->route('curso.index')->with('error', 'Curso não encontrado.');
        }

        $curso->nome = mb_strtoupper($request->nome, 'UTF-8');
        $curso->descricao = mb_strtoupper($request->descricao, 'UTF-8');
        $timeValue = $request->input('duracao');
        $curso->save();

        return redirect()->route('curso.index')->with('success', 'Curso atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return view('curso.destroy');
    }
}
