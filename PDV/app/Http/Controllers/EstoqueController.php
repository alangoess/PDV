<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstoqueController extends Controller
{
    public function index()
    {
        return response()->json(Estoque::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'tipo' => 'required|in:ENTRADA,SAIDA',
            'quantidade' => 'required|integer|min:1',
            'motivo' => 'nullable|string',
        ]);

        DB::transaction(function () use ($request) {

            // trava o produto para evitar concorrência
            $produto = Produto::where('id', $request->produto_id)
                ->lockForUpdate()
                ->first();

            // valida saída
            if ($request->tipo === 'SAIDA' && $produto->estoque < $request->quantidade) {
                throw new \Exception('Estoque insuficiente');
            }

            // cria movimentação (NUNCA edita depois)
            Estoque::create([
                'produto_id' => $produto->id,
                'tipo' => $request->tipo,
                'quantidade' => $request->quantidade,
                'motivo' => $request->motivo,
                'data' => now(),
            ]);

            // atualiza o snapshot do produto
            if ($request->tipo === 'ENTRADA') {
                $produto->increment('estoque', $request->quantidade);
            } else {
                $produto->decrement('estoque', $request->quantidade);
            }
        });

        return response()->json(['message' => 'Estoque atualizado com sucesso'], 201);
    }

    public function show(Estoque $estoque)
    {
        return response()->json($estoque);
    }
}
