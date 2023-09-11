<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BigQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'name' => '東京の難読地名クイズ',
            ],
            [
                'name' => '広島の難読地名クイズ',
            ],
        ];

        $now = Carbon::now();

        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('big_questions')->insert($param);
        }
    }
}
