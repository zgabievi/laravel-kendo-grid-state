<?php

namespace Zgabievi\KendoGridState\Scopes;

use Illuminate\Database\Eloquent\{Scope, Model, Builder};
use Zgabievi\KendoGridState\Filters\{Group, Skip, Sort, State, Filter, Take};

class KendoScope implements Scope
{
    /**
     * @var array
     */
    public static $filters = [
        'filter' => Filter::class,
        'group' => Group::class,
        'skip' => Skip::class,
        'sort' => Sort::class,
        'take' => Take::class,
    ];

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param Builder $builder
     * @param Model $model
     * @return Builder
     */
    public function apply(Builder $builder, Model $model)
    {
        return (new State($this->kendoRequest()))->filter($builder);
    }

    /**
     * @return array
     */
    protected function kendoRequest()
    {
        return array_filter(
            request()->only(
                array_keys(self::$filters)
            )
        );
    }
}
