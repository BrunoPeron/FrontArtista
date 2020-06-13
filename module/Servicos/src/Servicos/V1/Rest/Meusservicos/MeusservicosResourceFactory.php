<?php
namespace Servicos\V1\Rest\Meusservicos;

class MeusservicosResourceFactory
{
    public function __invoke($services)
    {
        return new MeusservicosResource($services);
    }
}
