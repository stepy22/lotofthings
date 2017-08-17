<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $thread=factory('App\Thread')->create();
        $response = $this->get('/threads');
        $response->assertStatus($thread->title);

        $response = $this->get('/threads',$thread->id);
        $response->assertSee($thread->title);
    }
}
