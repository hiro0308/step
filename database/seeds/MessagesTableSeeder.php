<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
          'board_id' => 1,
          'user_id' => 8,
          'msg' => 'ユーザーid8のコメント',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);
    }
}
