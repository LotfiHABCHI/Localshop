<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\Repository;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    //public function run()
    //{
        // \App\Models\User::factory(10)->create();
    //}

    public function run()
    {
        //touch('database/database.sqlite');
        $repository = new Repository();
        //$repository->createDatabase();
        $repository->fillDatabase();
        //$repository->updateRanking();
        $repository->addCustomer('user@example.com', 'secret');

    }  
}
