<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ReserveSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    DB::table('reserves')->insert([
      'user_id' => '1',
      'latitude' => '35.694055',
      'longitude' => '139.700753',
      'address' => 'エスパス日拓西武新宿駅前店',
      'date' => '2021-12-28',
      'start_time' => '18:00',
      'end_time' => '21:00',
      'area' => '300',
      'drone' => '200',
      'cost' => '300000',
      'status' => '0',
    ]);
    DB::table('reserves')->insert([
      'user_id' => '1',
      'latitude' => '35.691605',
      'longitude' => '139.696946',
      'address' => 'コクーンタワー',
      'date' => '2021-12-28',
      'start_time' => '18:00',
      'end_time' => '21:00',
      'area' => '300',
      'drone' => '200',
      'cost' => '300000',
      'status' => '0',
    ]);
  }
}
