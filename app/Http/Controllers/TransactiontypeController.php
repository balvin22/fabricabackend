<?php

namespace App\Http\Controllers;

use App\Models\transactiontype;
use Illuminate\Http\Request;

class TransactiontypeController extends Controller
{
    public function index()
    {

        $transaccion = transactiontype::all();

        return response()->json($transaccion);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([]);

        $transaccion = transactiontype::create($request->all());

        return response()->json($transaccion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo_Transaccion  
     * @return \Illuminate\Http\Response
     */
    public function show($id) //si se pasa $id se utiliza la comentada
    {
        $transaccion = transactiontype::included()->findOrFail($id);
        return response()->json($transaccion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transactiontype $transaccion)
    {
        $request->validate([

            'tipo_transaccion' => 'required'

        ]);

        $transaccion->update($request->all());

        return response()->json($transaccion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(transactiontype $transaccion)
    {
        $transaccion->delete();
        return response()->json($transaccion);
    }
}
