<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create(array(
            'image' => '..',
            'first_name' => 'NIRA',
            'last_name' => 'ADMIN',
            'role' => 'admin',
            'active' => true,
            'email' => 'tech_support@nira.org.ng',
            'password' => bcrypt(12345),
         ));

         $dept = Department::create(array(
            'title'=> 'Technical Support'
         ));

         $articles = Article::get();
         foreach ($articles as $article)
         {
            $article->department_id = $dept->id;
            $article->save();
         }






        
    }
}
