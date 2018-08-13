<?php

namespace Zgabievi\KendoGridState\Filters;

use Illuminate\Database\Eloquent\Builder;
use Zgabievi\KendoGridState\Contracts\FilterAbstract;

class Group extends FilterAbstract
{
    /**
     * @param Builder $builder
     * @param $descriptors
     * @return mixed
     */
    public function filter(Builder $builder, $descriptors)
    {
        if (!is_array($descriptors)) {
            return $builder;
        }

        foreach ($descriptors as $descriptor) {
            $this->handle($builder, $descriptor);
        }
    }

    /**
     * @param Builder $builder
     * @param $descriptor
     * @return Builder
     */
    protected function handle(Builder $builder, $descriptor)
    {
        if (!is_array($descriptor) || is_null($descriptor['field'])) {
            return $builder;
        }

        return $builder->groupBy(array_get($descriptor, 'field'));
    }
}
