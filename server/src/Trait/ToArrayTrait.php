<?php

namespace App\Trait;

trait ToArrayTrait
{
    /**
     * Takes entity and converts to array. This trait only converts primitive types. This is intended and left for the user to decide what properties they want.
     *
     * @return array
     */
    public function toArray(): array
    {
        $zval = get_object_vars($this);

        return ($zval);
    }
}
