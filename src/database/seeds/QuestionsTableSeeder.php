<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class QuestionsTableSeeder extends Seeder
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
                'big_question_id' => 1,
                'image' => 'takanawa.png'
            ],
            [
                'big_question_id' => 1,
                'image' => 'kameido.png'
            ],
            [
                'big_question_id' => 2,
                'image' => 'mukainada.png'
            ],
        ];

        $now = Carbon::now();

        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('questions')->insert($param);
        }
    }
}
