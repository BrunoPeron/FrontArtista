<?php
namespace Transacao\V1\Rest\Contabancaria;

class ContabancariaResourceFactory
{
    public function __invoke($services)
    {
        return new ContabancariaResource($services);
    }
}
