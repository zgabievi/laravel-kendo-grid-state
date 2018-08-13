<?php

namespace Zgabievi\KendoGridState\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Zgabievi\KendoGridState\Tests\Models\Post;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->loadLaravelMigrations(['--database' => 'sqlite']);
        $this->setUpDatabase();
        $this->defineRoute();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [\Zgabievi\KendoGridState\ServiceProvider::class];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['config']->set('app.key', 'TEST_APP_KEY');
    }

    /**
     * @return void
     */
    protected function setUpDatabase()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
        });
    }

    /**
     * @param int $amount
     * @param array|null $data
     * @return void
     */
    public function createPost($amount = 1, array $data = null)
    {
        for ($i = 1; $i <= $amount; $i++) {
            Post::create($data ? $data : ['name' => 'Post #' . $i]);
        }
    }

    /**
     * @param null $callback
     * @return void
     */
    public function defineRoute($callback = null)
    {
        app('router')->get('posts', function () use ($callback) {
            return is_null($callback) ? Post::all() : $callback;
        });
    }
}
