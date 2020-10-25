<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->where('id', 1)->update(['color' => '#f7b653']);
        DB::table('books')->where('id', 2)->update(['color' => '#448922']);
        DB::table('books')->where('id', 3)->update(['color' => '#dc6d37']);
        DB::table('books')->where('id', 4)->update(['color' => '#3886d7']);
        DB::table('books')->where('id', 5)->update(['color' => '#6c398c']);
        DB::table('books')->where('id', 6)->update(['color' => '#0d5897']);
        DB::table('books')->where('id', 7)->update(['color' => '#55c9ee']);
    }
}
