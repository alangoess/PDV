<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'preco' => 'required|string',
            'estoque' => 'required|string',
            'codigo_barras' => 'required|string|unique:produtos,codigo_barras',
            'status' => 'string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $produto = Produto::create($request->all());
        return response()->json($produto);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return response()->json($produto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'sometimes|required|string',
            'preco' => 'sometimes|required|string',
            'estoque_atual' => 'sometimes|required|string',
            'codigo_barras' => 'sometimes|required|string|unique:produtos,codigo_barras,' . $produto->id,
            'status' => 'sometimes|string',
        ]);

        $produto->update($request->all());
        return response()->json($produto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return response()->json(null, 204);
    }
}
