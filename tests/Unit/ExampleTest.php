<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;

class ExampleTest extends TestCase
{
    //This will roll back the creation of your test dummy data after you've done the test
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        /*
         * A good way to go about unit testing is the following structure
         * Given - e.g. Given I have 2 records in the database that are posts
         * and each one is posted a month apart
         * When I fetch the archives
         * Then the response should be in the proper format
         * */

        //Given I have 2 records in the database that are posts
        $first = factory(Post::class)->create();
        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);
        //When I fetch the archives
        $posts = Post::archives();
        //Then the response should be in the proper format
        $this->assertEquals([
            [
                'year' => $first->created_at->format('Y'),
                'month' => $first->created_at->format('F'),
                'published' => 1
            ],
            [
                'year' => $second->created_at->format('Y'),
                'month' => $second->created_at->format('F'),
                'published' => 1
            ]
        ], $posts);
    }
}
