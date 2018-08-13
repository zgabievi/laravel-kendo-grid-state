<?php

namespace Zgabievi\KendoGridState\Filters;

use Illuminate\Database\Eloquent\Builder;
use Zgabievi\KendoGridState\Contracts\FilterAbstract;

class Take extends FilterAbstract
{
    /**
     * @param Builder $builder
     * @param $value
     * @return Builder
     */
    public function filter(Builder $builder, $value)
    {
        if (! self::isValid($value)) {
            return $builder;
        }

        return $builder->take($value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isValid($value)
    {
        return is_numeric($value) && $value > 0;
    }
}
