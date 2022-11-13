<?php

namespace App\Http\Services;

use App\Http\Filtration\Rules\UserFilterRule;
use Illuminate\Database\Eloquent\Builder;

class UsersService
{
  public function listFilter(Builder $query, array $filters): void
  {
    $filterRule = new UserFilterRule();

    foreach ($filters as $filterName => $filter) {
      $filterRule->filtration($query, $filterName, $filter);
    }
  }
}