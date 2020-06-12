<?php
namespace App\Models\Concerns;

use Laravel\Scout\Searchable;
trait ScoutSearch
{
    use Searchable;

    public function toSearchableArray()
    {
        $searchable = ['id'];
        $searchable = array_merge($searchable,$this->searchable);
        $array = collect($this->toArray())->only($searchable)->toArray();

        return $array;
    }
}