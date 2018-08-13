<?php

namespace Zgabievi\KendoGridState\Filters;

use Illuminate\Database\Eloquent\Builder;
use Zgabievi\KendoGridState\Contracts\FilterAbstract;

class Skip extends FilterAbstract
{
    /**
     * @param Builder $builder
     * @param $value
     * @return \Illuminate\Database\Query\Builder|Builder
     */
    public function filter(Builder $builder, $value)
    {
        if (! self::isValid($value)) {
            return $builder;
        }

        return $builder->skip($value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isValid($value)
    {
        $take = request('take');

        return is_numeric($value) && $value >= 0 && Take::isValid($take);
    }
}
