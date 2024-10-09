<?php

namespace Database\Seeders;

use App\Models\transaction;
use App\Models\transactiontype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        transactiontype::create([
            'tipo_transaccion'=>'ingreso',
            
        ]);
        transactiontype::create([
            'tipo_transaccion'=>'egreso',
            
        ]);


    }

}
