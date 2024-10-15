<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
       {
        //    $transaccion = transaction::all()->get();
           $transaccion = transaction::included()->get();
       
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
   
           $request->validate([
            'motivo'=>'required|max:100',
            'monto'=>'required|max:100',
            'fecha'=>'required',
            'transactiontype_id'=>'required|exists:transactiontypes,id'
           ]);
           $user_id= Auth::id();
           $request['user_id']=$user_id;
           $transaccion = transaction::create($request->all()); 
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
           $transaccion = transaction::included()->findOrFail($id);
           return response()->json($transaccion);
   
   
       }
   
       /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\Models\Transaction
        * @return \Illuminate\Http\Response
        */
       public function update(Request $request, int $id){
        $transaccion = transaction::find($id);
           $request->validate([
            'motivo'=>'required|max:100',
            'monto'=>'required|max:100',
            'fecha'=>'required',
            'transactiontype_id'=>'required|exists:transactiontypes,id'
        
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
       public function destroy(int $id)
       {
            $transaccion = transaction::findOrFail($id);
           $transaccion->delete();
           return response()->json($transaccion);
       }
}
