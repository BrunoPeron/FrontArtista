<?php
namespace Galeria\V1\Rest\Obras;

class ObrasResourceFactory
{
    public function __invoke($services)
    {
        return new ObrasResource($services);
    }
}
