<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepsTableSeeder extends Seeder
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
            'title' => 'sample1',
            'category_id' => 1,
            'comment' => 'sample1',
            'user_id' => 6
          ],
          [
            'title' => 'sample2',
            'category_id' => 2,
            'comment' => 'sample2',
            'user_id' => 6
          ],[
            'title' => 'sample3',
            'category_id' => 3,
            'comment' => 'sample3',
            'user_id' => 6
          ],[
            'title' => 'sample1-1',
            'category_id' => 1,
            'comment' => 'sample1-1',
            'user_id' => 6
          ],[
            'title' => 'sample2-2',
            'category_id' => 2,
            'comment' => 'sample2-2',
            'user_id' => 6
          ],[
            'title' => 'sample3-3',
            'category_id' => 3,
            'comment' => 'sample3-3',
            'user_id' => 6
          ],
        ];
        
        $now = Carbon::now();
        foreach ($params as $param) {
          $param['created_at'] = $now;
          $param['updated_at'] = $now;
          DB::table('steps')->insert($param);
        }
    }
}
