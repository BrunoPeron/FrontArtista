<?php
namespace Transacao\V1\Rest\Cartao;

class CartaoResourceFactory
{
    public function __invoke($services)
    {
        return new CartaoResource($services);
    }
}
