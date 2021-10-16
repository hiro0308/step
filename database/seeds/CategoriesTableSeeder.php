<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params =
        [
          [
            'name' => 'プログラミング'
          ],
          [
            'name' => 'TOEIC'
          ],
          [
            'name' => '簿記3級'
          ],
          [
            'name' => '英検1級'
          ],
        ];
        
        $now = Carbon::now();
        foreach ($params as $param) {
          $param['created_at'] = $now;
          $param['updated_at'] = $now;
          DB::table('categories')->insert($param);
        }
    }
}
