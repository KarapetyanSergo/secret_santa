<?php

namespace App\Http\Filtration;

use Illuminate\Database\Eloquent\Builder;

abstract class Filter
{
  public function filtration(Builder $query, string $ruleName, string $ruleValue): void
  {
    $rule = $this->rules[$ruleName];
    $rule->handle($query, $ruleValue);
  }
}