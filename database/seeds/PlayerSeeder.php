<?php
use App\Player;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('players')->insert([
        //     'first_name' => Str::random(20),
        //     'last_name' => Str::random(20),
        // ]);
        factory(Player::class,50)->create();
    }
}
