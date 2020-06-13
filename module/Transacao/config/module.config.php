<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Transacao\\V1\\Rest\\Cartao\\CartaoResource' => 'Transacao\\V1\\Rest\\Cartao\\CartaoResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'transacao.rest.cartao' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/cartao[/:cartao_id]',
                    'defaults' => array(
                        'controller' => 'Transacao\\V1\\Rest\\Cartao\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'transacao.rest.cartao',
        ),
    ),
    'zf-rest' => array(
        'Transacao\\V1\\Rest\\Cartao\\Controller' => array(
            'listener' => 'Transacao\\V1\\Rest\\Cartao\\CartaoResource',
            'route_name' => 'transacao.rest.cartao',
            'route_identifier_name' => 'cartao_id',
            'collection_name' => 'cartao',
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
            'entity_class' => 'Transacao\\V1\\Rest\\Cartao\\CartaoEntity',
            'collection_class' => 'Transacao\\V1\\Rest\\Cartao\\CartaoCollection',
            'service_name' => 'cartao',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Transacao\\V1\\Rest\\Cartao\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Transacao\\V1\\Rest\\Cartao\\Controller' => array(
                0 => 'application/vnd.transacao.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Transacao\\V1\\Rest\\Cartao\\Controller' => array(
                0 => 'application/vnd.transacao.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Transacao\\V1\\Rest\\Cartao\\CartaoEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'transacao.rest.cartao',
                'route_identifier_name' => 'cartao_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Transacao\\V1\\Rest\\Cartao\\CartaoCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'transacao.rest.cartao',
                'route_identifier_name' => 'cartao_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Transacao\\V1\\Rest\\Cartao\\Controller' => array(
            'input_filter' => 'Transacao\\V1\\Rest\\Cartao\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Transacao\\V1\\Rest\\Cartao\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'nrcartao',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'tipo',
            ),
            2 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'nome',
            ),
            3 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'codpessoa',
            ),
            4 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'validade',
            ),
            5 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cpf',
            ),
            6 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'descadd',
            ),
            7 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'sobrenome',
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Transacao\\V1\\Rest\\Cartao\\Controller' => array(
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
);
