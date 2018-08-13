<?php

namespace Zgabievi\KendoGridState\Tests;

use Zgabievi\KendoGridState\Tests\Models\Post;

class SortScopeTest extends TestCase
{
    /** @test */
    public function it_requires_to_have_correct_sorting_structure_and_field_value()
    {
        $this->createPost(3);

        $this->assertCount(3, Post::all());

        $response = $this->call('GET', 'posts', ['sort' => [['dir' => 'desc']]]);
        $response->assertJsonCount(3);
        $this->assertEquals(1, $response->json()[0]['id']);

        $response = $this->call('GET', 'posts', ['sort' => 'INVALID']);
        $response->assertJsonCount(3);
        $this->assertEquals(1, $response->json()[0]['id']);
    }

    /** @test */
    public function it_can_sort_if_query_structure_is_correct()
    {
        $this->createPost(3);

        $this->assertCount(3, Post::all());

        $response = $this->call('GET', 'posts', ['sort' => [['field' => 'id']]]);
        $response->assertJsonCount(3);
        $this->assertEquals(1, $response->json()[0]['id']);

        $response = $this->call('GET', 'posts', ['sort' => [['field' => 'id', 'dir' => 'desc']]]);
        $response->assertJsonCount(3);
        $this->assertEquals(3, $response->json()[0]['id']);
    }

    /** @test */
    public function it_can_sort_by_multiple_fields()
    {
        $this->createPost(2, ['name' => 'A']);
        $this->createPost(1, ['name' => 'B']);

        $this->assertCount(3, Post::all());

        $response = $this->call('GET', 'posts', ['sort' => [['field' => 'name']]]);
        $response->assertJsonCount(3);
        $this->assertEquals(1, $response->json()[0]['id']);

        $response = $this->call('GET', 'posts', ['sort' => [['field' => 'name', 'dir' => 'desc']]]);
        $response->assertJsonCount(3);
        $this->assertEquals(3, $response->json()[0]['id']);

        $response = $this->call('GET', 'posts',
            ['sort' => [['field' => 'name', 'dir' => 'asc'], ['field' => 'id', 'dir' => 'desc']]]);
        $response->assertJsonCount(3);
        $this->assertEquals(2, $response->json()[0]['id']);
    }
}
