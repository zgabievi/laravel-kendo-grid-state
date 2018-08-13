<?php

namespace Zgabievi\KendoGridState\Filters;

use Illuminate\Database\Eloquent\Builder;
use Zgabievi\KendoGridState\Contracts\FilterAbstract;

class Sort extends FilterAbstract
{
    /**
     * @param Builder $builder
     * @param $descriptors
     * @return mixed
     */
    public function filter(Builder $builder, $descriptors)
    {
        if (! is_array($descriptors)) {
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
        if (! is_array($descriptor) || ! array_key_exists('field', $descriptor)) {
            return $builder;
        }

        $direction = in_array(array_get($descriptor, 'dir'), ['asc', 'desc']) ? array_get($descriptor, 'dir') : 'asc';

        return $builder->orderBy(array_get($descriptor, 'field'), $direction);
    }
}
