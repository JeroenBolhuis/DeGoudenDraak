<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert unique dish types
        // Insert unique dish types
        DB::transaction(function () {
            DB::table('dishtype')->insertUsing(
                ['type'],
                DB::table('gouden_draak.menu')->distinct()->select('soortgerecht')
                    ->whereNotIn('soortgerecht', function ($query) {
                        $query->select('type')->from('dishtype');
                    })
            );
        });

        // Insert dishes
        DB::table('dish')->insertUsing(
            ['dishnumber', 'addition', 'name', 'price', 'description', 'dishtype'],
            DB::table('gouden_draak.menu')->select('menunummer', 'menu_toevoeging', 'naam', 'price', 'beschrijving', 'soortgerecht')
        );

        // Insert sales without table_id
        DB::table('sales')->insertUsing(
            ['date', 'table_idtable'],
            DB::table('gouden_draak.sales')->select('saleDate', DB::raw('NULL AS table_idtable'))
        );

        // Insert dish sales data into the new schema
        $amounts = [1, 2, 3, 4];
        foreach ($amounts as $amount) {
            DB::table('dish_has_sales')->insertUsing(
                ['dish_id', 'sales_id', 'comment'],
                DB::table('gouden_draak.sales')
                    ->where('amount', $amount)
                    ->select('itemId AS dish_id', 'id', DB::raw('NULL AS comment'))
            );
        }
    }
}
