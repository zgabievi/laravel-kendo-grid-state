<?php

namespace Zgabievi\KendoGridState\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Zgabievi\KendoGridState\Traits\Filterable;

class Post extends Model
{
    use Filterable;

    //
    public $timestamps = false;

    //
    protected $table = 'posts';

    //
    protected $guarded = [];
}
