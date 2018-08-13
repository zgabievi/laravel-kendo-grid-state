<?php

namespace Zgabievi\KendoGridState\Contracts;

use Illuminate\Database\Eloquent\Builder;

abstract class FilterAbstract
{
    /**
     * @param Builder $builder
     * @param $value
     * @return \Illuminate\Database\Query\Builder|Builder
     */
    abstract public function filter(Builder $builder, $value);
}
