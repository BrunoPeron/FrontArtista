<?php
namespace Pessoa\V1\Rest\Pessoa;

class PessoaResourceFactory
{
    public function __invoke($services)
    {
        return new PessoaResource($services);
    }
}
