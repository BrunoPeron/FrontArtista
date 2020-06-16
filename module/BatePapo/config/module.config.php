<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'BatePapo\\V1\\Rest\\Chat\\ChatResource' => 'BatePapo\\V1\\Rest\\Chat\\ChatResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'bate-papo.rest.chat' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/chat[/:chat_id]',
                    'defaults' => array(
                        'controller' => 'BatePapo\\V1\\Rest\\Chat\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'bate-papo.rest.chat',
        ),
    ),
    'zf-rest' => array(
        'BatePapo\\V1\\Rest\\Chat\\Controller' => array(
            'listener' => 'BatePapo\\V1\\Rest\\Chat\\ChatResource',
            'route_name' => 'bate-papo.rest.chat',
            'route_identifier_name' => 'chat_id',
            'collection_name' => 'chat',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'BatePapo\\V1\\Rest\\Chat\\ChatEntity',
            'collection_class' => 'BatePapo\\V1\\Rest\\Chat\\ChatCollection',
            'service_name' => 'chat',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'BatePapo\\V1\\Rest\\Chat\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'BatePapo\\V1\\Rest\\Chat\\Controller' => array(
                0 => 'application/vnd.bate-papo.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'BatePapo\\V1\\Rest\\Chat\\Controller' => array(
                0 => 'application/vnd.bate-papo.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'BatePapo\\V1\\Rest\\Chat\\ChatEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'bate-papo.rest.chat',
                'route_identifier_name' => 'chat_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'BatePapo\\V1\\Rest\\Chat\\ChatCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'bate-papo.rest.chat',
                'route_identifier_name' => 'chat_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'BatePapo\\V1\\Rest\\Chat\\Controller' => array(
                'collection' => array(
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
            ),
        ),
    ),
    'zf-content-validation' => array(
        'BatePapo\\V1\\Rest\\Chat\\Controller' => array(
            'input_filter' => 'BatePapo\\V1\\Rest\\Chat\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'BatePapo\\V1\\Rest\\Chat\\Validator' => array(
            0 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'id',
            ),
            1 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'idChat',
            ),
            2 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'dataMensagem',
            ),
            3 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'mensagem',
            ),
            4 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'de',
            ),
            5 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'para',
            ),
        ),
    ),
);
