<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Servicos\\V1\\Rest\\Meusservicos\\MeusservicosResource' => 'Servicos\\V1\\Rest\\Meusservicos\\MeusservicosResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'servicos.rest.meusservicos' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/meusservicos[/:meusservicos_id]',
                    'defaults' => array(
                        'controller' => 'Servicos\\V1\\Rest\\Meusservicos\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'servicos.rest.meusservicos',
        ),
    ),
    'zf-rest' => array(
        'Servicos\\V1\\Rest\\Meusservicos\\Controller' => array(
            'listener' => 'Servicos\\V1\\Rest\\Meusservicos\\MeusservicosResource',
            'route_name' => 'servicos.rest.meusservicos',
            'route_identifier_name' => 'meusservicos_id',
            'collection_name' => 'meusservicos',
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
            'entity_class' => 'Servicos\\V1\\Rest\\Meusservicos\\MeusservicosEntity',
            'collection_class' => 'Servicos\\V1\\Rest\\Meusservicos\\MeusservicosCollection',
            'service_name' => 'meusservicos',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Servicos\\V1\\Rest\\Meusservicos\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'Servicos\\V1\\Rest\\Meusservicos\\Controller' => array(
                0 => 'application/vnd.servicos.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Servicos\\V1\\Rest\\Meusservicos\\Controller' => array(
                0 => 'application/vnd.servicos.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Servicos\\V1\\Rest\\Meusservicos\\MeusservicosEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'servicos.rest.meusservicos',
                'route_identifier_name' => 'meusservicos_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Servicos\\V1\\Rest\\Meusservicos\\MeusservicosCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'servicos.rest.meusservicos',
                'route_identifier_name' => 'meusservicos_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Servicos\\V1\\Rest\\Meusservicos\\Controller' => array(
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
        'Servicos\\V1\\Rest\\Meusservicos\\Controller' => array(
            'input_filter' => 'Servicos\\V1\\Rest\\Meusservicos\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Servicos\\V1\\Rest\\Meusservicos\\Validator' => array(
            0 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'nome',
                'error_message' => 'Nome do projeto não definido',
            ),
            1 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'id',
            ),
            2 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'descricao',
            ),
            3 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cliente',
            ),
            4 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'artista',
            ),
            5 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'status',
            ),
            6 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'dataInicio',
            ),
            7 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'dataFim',
            ),
            8 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'clienteid',
            ),
            9 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'artistaid',
            ),
        ),
    ),
);
