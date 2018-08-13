<?php

namespace Zgabievi\KendoGridState\Tests;

use Zgabievi\KendoGridState\Tests\Models\Post;

class TakeScopeTest extends TestCase
{
    /** @test */
    public function it_returns_correct_amount_of_items_if_value_is_valid()
    {
        $this->createPost(3);

        $this->assertCount(3, Post::all());

        $response = $this->call('GET', 'posts', ['take' => 4]);
        $response->assertJsonCount(3);

        $response = $this->call('GET', 'posts', ['take' => 2]);
        $response->assertJsonCount(2);
    }

    /** @test */
    public function it_returns_all_records_if_value_is_invalid()
    {
        $this->createPost(3);

        $this->assertCount(3, Post::all());

        $response = $this->call('GET', 'posts', ['take' => 0]);
        $response->assertJsonCount(3);

        $response = $this->call('GET', 'posts', ['take' => 'INVALID']);
        $response->assertJsonCount(3);
    }
}
