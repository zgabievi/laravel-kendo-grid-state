<?php

namespace Zgabievi\KendoGridState\Tests;

use Zgabievi\KendoGridState\Tests\Models\Post;

class SkipScopeTest extends TestCase
{
    /** @test */
    public function it_requires_to_have_take_amount_to_do_a_skip()
    {
        $this->createPost(3);

        $this->assertCount(3, Post::all());

        $response = $this->call('GET', 'posts', ['skip' => 1]);
        $response->assertJsonCount(3);

        $response = $this->call('GET', 'posts', ['skip' => 1, 'take' => 1]);
        $response->assertJsonCount(1);
    }

    /** @test */
    public function it_skips_correctly_when_you_pass_correct_take_and_skip_value()
    {
        $this->createPost(3);

        $this->assertCount(3, Post::all());

        $response = $this->call('GET', 'posts', ['skip' => 1, 'take' => 2]);
        $response->assertJsonCount(2);
        $response->assertJsonMissing([
            'id' => 1,
            'name' => 'Post #1',
        ]);

        $response = $this->call('GET', 'posts', ['skip' => 2, 'take' => 1]);
        $response->assertJsonCount(1);
        $response->assertJsonFragment([
            'id' => 3,
            'name' => 'Post #3',
        ]);
    }
}
