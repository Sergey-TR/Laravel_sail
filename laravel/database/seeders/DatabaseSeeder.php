<?php

namespace Database\Seeders;

use Database\Factories\CommentFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Category::factory(10)
            ->has(News::factory(3))
            ->create();

    }
}
