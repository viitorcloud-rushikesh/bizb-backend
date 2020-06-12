<?php

namespace App\Models\Concerns;

trait Hashidable
{
    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        return \Hashids::encode($this->getKey());
    }
}
