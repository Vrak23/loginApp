<?php

namespace App\Http\Resources\Concerns;

trait PreservesNullResourceData
{
    public function toResponse($request)
    {
        if ($this->resource !== null) {
            return parent::toResponse($request);
        }

        return response()->json(array_merge(
            ['data' => null],
            $this->with($request),
            $this->additional
        ));
    }
}
