<?php
namespace Mensagens\V1\Rest\Comentarios;

class ComentariosResourceFactory
{
    public function __invoke($services)
    {
        return new ComentariosResource($services);
    }
}
