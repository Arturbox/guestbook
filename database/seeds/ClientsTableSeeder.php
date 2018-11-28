<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for( $i= 1 ; $i <= 5 ; $i++ ) {
            DB::table('clients')->insert([
                'name' => 'Artur'.$i,
                'email' => 'test'.$i.'@mail.ru',
                'homepage'=>'test',
                'created_at' => '2018-01-01 15:15:15',
            ]);

            for( $j= 1 ; $j <= 20 ; $j++ ) {
                DB::table('reviews')->insert([
                    'text' => 'text'.$j,
                    'client_id' => $i,
                    'created_at' => '2018-01-01 15:15:15'
                ]);
            }
        }
    }
}
