<?php
namespace BatePapo\V1\Rest\Chat;

class ChatResourceFactory
{
    public function __invoke($services)
    {
        return new ChatResource($services);
    }
}
