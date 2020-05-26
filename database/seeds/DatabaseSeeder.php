<?php

use Illuminate\Database\Seeder;
use App\Track;
use App\Cource;
use App\Quiz;
use App\Question;
use App\Vadio;
use App\Photo;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
       
    	$users = factory('App\User', 10)->create();

        $tracks = factory('App\Track', 10)->create();
        factory('App\Cource', 50)->create();
        factory('App\Quiz', 100)->create();
        factory('App\Question', 100)->create();
        factory('App\Vadio', 100)->create();
        factory('App\Photo', 50)->create();

        
    	
   
        


        // $courses = factory('App\Cource', 50)->create();
    	
        // foreach ($users as $user) {
        //     $courses_ids = [];

        //     $courses_ids[] = Cource::all()->random()->id;
        //     $courses_ids[] = Cource::all()->random()->id;
        //     $courses_ids[] = Cource::all()->random()->id;

        //     $user->courses()->sync( $courses_ids );
        // }


        // factory('App\Vadio', 50)->create();
    	// $quizzes = factory('App\Quiz', 50)->create();

        // foreach ($users as $user) {
        //     $quizzes_ids = [];

        //     $quizzes_ids[] = Quiz::all()->random()->id;
        //     $quizzes_ids[] = Quiz::all()->random()->id;
        //     $quizzes_ids[] = Quiz::all()->random()->id;

        //     $user->quizzes()->sync( $quizzes_ids );
        // }

    }
}
