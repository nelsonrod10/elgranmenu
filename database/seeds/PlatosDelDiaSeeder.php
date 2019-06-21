<?php

use Illuminate\Database\Seeder;

class PlatosDelDiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Menus\PlatosDelDia::class, 100)->create();
    }
}
