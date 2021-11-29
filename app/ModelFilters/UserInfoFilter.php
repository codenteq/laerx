<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class UserInfoFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function period($period)
    {
        if ($period != 0) {
            return $this->where('periodId', $period);
        }
    }

    public function month($month)
    {
        if ($month != 0) {
            return $this->where('monthId', $month);
        }
    }

    public function group($group)
    {
        if ($group != 0) {
            return $this->where('groupId', $group);
        }
    }
}
