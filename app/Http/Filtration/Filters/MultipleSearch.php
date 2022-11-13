<?php

namespace App\Http\Filtration\Filters;

use Illuminate\Database\Eloquent\Builder;

class MultipleSearch implements FilterInterface
{
  private $columns;

  public function __construct($columns)
  {
    $this->columns = $columns;
  }

  public function handle(Builder $query, string $value): void
  {
    foreach ($this->columns as $key => $column) {
      if ($key == 0) {
        $query->where($column, 'LIKE', $value);
        continue;
      }

      $query->orWhere($column, 'LIKE', $value);
    }
  }
}