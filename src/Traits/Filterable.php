<?php

namespace Zgabievi\KendoGridState\Traits;

use Zgabievi\KendoGridState\Scopes\KendoScope;

trait Filterable
{
    /**
     * @return void
     */
    public static function bootFilterable()
    {
        static::addGlobalScope(new KendoScope);
    }
}
