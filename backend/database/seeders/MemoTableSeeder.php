<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Memo;

class MemoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memos')->delete(); //最初に全件削除

        Memo::create([
            'id' => 1,
            'user_id' => 1,
            'title' => '12/13 laravel勉強会',
            'content' => 'データの読み取りと追加をやりました。'
        ]);

        Memo::create([
            'id' => 2,
            'user_id' => 1,
            'title' => '12/6 laravel勉強会',
            'content' => 'Viewの表示をしました。',
        ]);
    }
}
