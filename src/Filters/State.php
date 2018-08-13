<?php

namespace Zgabievi\KendoGridState\Filters;

use Illuminate\Database\Eloquent\Builder;
use Zgabievi\KendoGridState\Scopes\KendoScope;

class State
{
    /**
     * @var array
     */
    protected $data;

    /**
     * StateFilter constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function filter(Builder $builder)
    {
        foreach ($this->data as $filter => $value) {
            $this->resolveFilter($filter)->filter($builder, $value);
        }

        return $builder;
    }

    /**
     * @param $filter
     * @return mixed
     */
    protected function resolveFilter($filter)
    {
        return new KendoScope::$filters[$filter];
    }
}
