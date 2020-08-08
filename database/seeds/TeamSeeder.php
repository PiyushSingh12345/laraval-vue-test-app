<?php
use App\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('teams')->insert([
        //     'name' => Str::random(20)
        // ]);
        factory(Team::class,10)->create();
    }
}
