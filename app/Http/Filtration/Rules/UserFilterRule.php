<?php

namespace App\Http\Filtration\Rules;

use App\Http\Filtration\Filter;
use App\Http\Filtration\Filters\MultipleSearch;

class UserFilterRule extends Filter
{
  public $rules;

  public function __construct()
  {
    $this->rules = [
      'search' => new MultipleSearch(['first_name', 'last_name'])
    ];
  }
}