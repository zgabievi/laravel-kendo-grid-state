<?php

namespace Zgabievi\KendoGridState\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Zgabievi\KendoGridState\Filters\Skip;
use Zgabievi\KendoGridState\Filters\Sort;
use Zgabievi\KendoGridState\Filters\Take;
use Zgabievi\KendoGridState\Filters\Group;
use Zgabievi\KendoGridState\Filters\State;
use Zgabievi\KendoGridState\Filters\Filter;

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
     * @return \Illuminate\Database\Query\Builder|Builder
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
