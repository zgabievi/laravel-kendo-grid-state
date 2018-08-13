<?php

namespace Zgabievi\KendoGridState\Tests;

use Illuminate\Http\Request;
use Zgabievi\KendoGridState\Tests\Models\Post;

class FilterScopeTest extends TestCase
{
    /** @test */
    public function it_requires_to_have_correct_structure_of_filters()
    {
        $this->createPost(3);

        $this->assertCount(3, Post::all());

        $response = $this->call('GET', 'posts', ['filter' => ['logic' => 'and', 'filters' => 'INVALID']]);
        $response->assertJsonCount(3);

        $response = $this->call('GET', 'posts', ['filter' => 'INVALID']);
        $response->assertJsonCount(3);
    }

    /** @test */
    public function it_can_filter_data_by_equality()
    {
        $this->createPost(3);

        $this->assertCount(3, Post::all());

        // EQ
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'name', 'operator' => 'eq', 'value' => 'Post #2'],
                ],
            ],
        ]);
        $response->assertJsonCount(1);
        $this->assertEquals(2, $response->json()[0]['id']);

        // NEQ
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'name', 'operator' => 'neq', 'value' => 'Post #2'],
                ],
            ],
        ]);
        $response->assertJsonCount(2);
    }

    /** @test */
    public function it_can_filter_data_by_null()
    {
        $this->createPost(2);
        $this->createPost(1, ['name' => null]);

        $this->assertCount(3, Post::all());

        // IS NULL
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'name', 'operator' => 'isnull'],
                ],
            ],
        ]);
        $response->assertJsonCount(1);
        $this->assertEquals(3, $response->json()[0]['id']);

        // IS NOT NULL
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'name', 'operator' => 'isnotnull'],
                ],
            ],
        ]);
        $response->assertJsonCount(2);
    }

    /** @test */
    public function it_can_filter_data_by_lower_values()
    {
        $this->createPost(3);

        $this->assertCount(3, Post::all());

        // LOWER THEN
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'id', 'operator' => 'lt', 'value' => 2],
                ],
            ],
        ]);
        $response->assertJsonCount(1);

        // LOWER THEN OR EQUAL
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'id', 'operator' => 'lte', 'value' => 2],
                ],
            ],
        ]);
        $response->assertJsonCount(2);
    }

    /** @test */
    public function it_can_filter_data_by_greater_values()
    {
        $this->createPost(3);

        $this->assertCount(3, Post::all());

        // GREATER THEN
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'id', 'operator' => 'gt', 'value' => 2],
                ],
            ],
        ]);
        $response->assertJsonCount(1);

        // GREATER THEN OR EQUAL
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'id', 'operator' => 'gte', 'value' => 2],
                ],
            ],
        ]);
        $response->assertJsonCount(2);
    }

    /** @test */
    public function it_can_filter_data_by_starting_or_ending_values()
    {
        $this->createPost(2);
        $this->createPost(1, ['name' => 'Other Post']);

        $this->assertCount(3, Post::all());

        // STARTS WITH
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'name', 'operator' => 'startswith', 'value' => 'Pos'],
                ],
            ],
        ]);
        $response->assertJsonCount(2);

        // ENDS WITH
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'name', 'operator' => 'endswith', 'value' => 'Post'],
                ],
            ],
        ]);
        $response->assertJsonCount(1);
    }

    /** @test */
    public function it_can_filter_data_by_containing_values_or_not()
    {
        $this->createPost(2);
        $this->createPost(1, ['name' => 'Other Post']);

        $this->assertCount(3, Post::all());

        // CONTAINS
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'name', 'operator' => 'contains', 'value' => 'ther'],
                ],
            ],
        ]);
        $response->assertJsonCount(1);

        // DOESN'T CONTAINT
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'name', 'operator' => 'doesnotcontain', 'value' => 'Other'],
                ],
            ],
        ]);
        $response->assertJsonCount(2);
    }

    /** @test */
    public function it_can_filter_data_by_emptiness()
    {
        $this->createPost(2);
        $this->createPost(1, ['name' => '']);

        $this->assertCount(3, Post::all());

        // IS EMPTY
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'name', 'operator' => 'isempty'],
                ],
            ],
        ]);
        $response->assertJsonCount(1);
        $this->assertEquals(3, $response->json()[0]['id']);

        // IS NOT EMPTY
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'name', 'operator' => 'isnotempty'],
                ],
            ],
        ]);
        $response->assertJsonCount(2);
    }

    /** @test */
    public function it_can_filter_by_several_filter_combinations()
    {
        $this->createPost(3);

        $this->assertCount(3, Post::all());

        // 2 COMBINATIONS
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'id', 'operator' => 'gt', 'value' => 2],
                    ['field' => 'name', 'operator' => 'contains', 'value' => 'Post'],
                ],
            ],
        ]);
        $response->assertJsonCount(1);
        $this->assertEquals(3, $response->json()[0]['id']);

        // 3 COMBINATIONS
        $response = $this->call('GET', 'posts', [
            'filter' => [
                'logic' => 'and',
                'filters' => [
                    ['field' => 'id', 'operator' => 'gte', 'value' => 2],
                    ['field' => 'name', 'operator' => 'startswith', 'value' => 'Post'],
                    ['field' => 'name', 'operator' => 'isnotempty', 'value' => 'Post'],
                ],
            ],
        ]);
        $response->assertJsonCount(2);
    }
}
