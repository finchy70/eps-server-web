<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Device;
use App\Models\Update;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->
        create([
            'name' => 'Paul Finch',
            'email' => 'paul@epsconstruction.co.uk',
            'admin' => true,
            'authorised' => true,
            'password' => bcrypt('!Emily2008!'
            )]);
//        User::factory(10)->create();
        $this->call(QuestionSeeder::class);
        $this->call(SectionSeeder::class);

        $updated = new Update();
        $updated->data_updated = now();
        $updated->audits_updated = now();
        $updated->save();

        $client = new Client();
        $client->client = "RES";
        $client->save();

        $client = new Client();
        $client->client = "Edina";
        $client->save();

        $client = new Client();
        $client->client = "Conrad Energy";
        $client->save();
    }
}
