<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Department;
use App\Models\DocumentMdata;
use App\Models\DocumentPermitionType;
use App\Models\Mdata;
use App\Models\User;
use App\Models\Historic;
use App\Models\Document;
use App\Models\DocumentPermition;
use App\Models\UserDocument;
use App\Models\UserType;
use App\Models\UserTypePermition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (App::environment() == 'local') {
            Department::factory(8)->create();
            User::factory(500)->create();
            User::factory()->create(['name' => 'admin', 'email' => 'admin@example.com', 'password'=> "admin123"]);
            Document::factory(500)->create();
            Historic::factory(500)->create();
            Mdata::factory(6)->create();
            DocumentPermition::factory(4)->create();
            DocumentPermitionType::factory(500)->create();
            UserTypePermition::factory(5)->create();
            UserType::factory(500)->create();
            UserType::factory()->create(['user_type_permition_id'=>'1','user_id'=>"501"]);

            DocumentMdata::factory(500)->create(); // ok

            UserDocument::factory(500)->create();
        }

    }
}
