<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pagamento;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Pagamento::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pagamento = Pagamento::create($request->all());
        return response()->json($pagamento, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Pagamento::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pagamento = Pagamento::findOrFail($id);
        $pagamento->update($request->all());
        return response()->json($pagamento, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pagamento::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
