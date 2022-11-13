<?php

namespace App\Http\Filtration\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
  public function handle(Builder $query, string $value): void;
}