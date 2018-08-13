<?php

namespace Zgabievi\KendoGridState\Filters;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Zgabievi\KendoGridState\Contracts\FilterAbstract;

class Filter extends FilterAbstract
{
    /**
     * @param Builder $builder
     * @param $descriptors
     * @return mixed
     */
    public function filter(Builder $builder, $descriptors)
    {
        $logic = array_get($descriptors, 'logic', 'and');
        $filters = array_get($descriptors, 'filters', []);

        if (! is_array($filters)) {
            return $builder;
        }

        foreach ($filters as $filter) {
            $this->handle($builder, $filter, $logic);
        }
    }

    /**
     * @param Builder $builder
     * @param $descriptor
     * @param $logic
     * @return \Illuminate\Database\Query\Builder|Builder
     */
    protected function handle(Builder $builder, $descriptor, $logic)
    {
        if (! is_array($descriptor) || ! array_key_exists('field', $descriptor)) {
            return $builder;
        }

        $logic = $logic === 'or' ? 'or' : 'and';

        if (array_key_exists('operator', $descriptor)) {
            if ($descriptor['operator'] === 'isnull') {
                return $builder->whereNull($descriptor['field'], $logic);
            }

            if ($descriptor['operator'] === 'isnotnull') {
                return $builder->whereNotNull($descriptor['field'], $logic);
            }
        }

        return $builder->where(
            $this->resolveField($descriptor),
            $this->resolveOperator($descriptor),
            $this->resolveValue($descriptor),
            $logic
        );
    }

    /**
     * @param $descriptor
     * @return \Illuminate\Database\Query\Expression
     */
    protected function resolveField($descriptor)
    {
        return $this->isBinary($descriptor) ? DB::raw('BINARY '.$descriptor['field']) : $descriptor['field'];
    }

    /**
     * @param $descriptor
     * @return string
     */
    protected function resolveOperator($descriptor)
    {
        if (! array_key_exists('operator', $descriptor)) {
            return '=';
        }

        switch ($descriptor['operator']) {
            case 'eq':
            case 'isempty':
                return '=';

            case 'neq':
            case 'isnotempty':
                return '!=';

            case 'lt':
                return '<';

            case 'lte':
                return '<=';

            case 'gt':
                return '>';

            case 'gte':
                return '>=';

            case 'startswith':
            case 'endswith':
            case 'contains':
                return 'LIKE';

            case 'doesnotcontain':
                return 'NOT LIKE';
        }
    }

    /**
     * @param $descriptor
     * @return mixed
     */
    protected function resolveValue($descriptor)
    {
        $value = array_get($descriptor, 'value', '');
        $operator = array_get($descriptor, 'operator', 'eq');

        switch ($operator) {
            case 'eq':
            case 'neq':
            case 'lt':
            case 'lte':
            case 'gt':
            case 'gte':
                return $value;

            case 'startswith':
                return $value.'%';

            case 'endswith':
                return '%'.$value;

            case 'contains':
            case 'doesnotcontain':
                return '%'.$value.'%';

            case 'isempty':
            case 'isnotempty':
                return '';
        }
    }

    /**
     * @param $descriptor
     * @param $sensitive
     * @return bool
     */
    protected function isBinary($descriptor)
    {
        $operator = array_get($descriptor, 'operator', 'eq');
        $ignoreCase = array_get($descriptor, 'ignoreCase', 'true');

        return $ignoreCase === 'false' && in_array($operator, ['eq', 'neq']);
    }
}
