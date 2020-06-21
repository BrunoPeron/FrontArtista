<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Transacao\\V1\\Rest\\Cartao\\CartaoResource' => 'Transacao\\V1\\Rest\\Cartao\\CartaoResourceFactory',
            'Transacao\\V1\\Rest\\Contabancaria\\ContabancariaResource' => 'Transacao\\V1\\Rest\\Contabancaria\\ContabancariaResourceFactory',
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
            'transacao.rest.contabancaria' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/contabancaria[/:contabancaria_id]',
                    'defaults' => array(
                        'controller' => 'Transacao\\V1\\Rest\\Contabancaria\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'transacao.rest.cartao',
            1 => 'transacao.rest.contabancaria',
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
        'Transacao\\V1\\Rest\\Contabancaria\\Controller' => array(
            'listener' => 'Transacao\\V1\\Rest\\Contabancaria\\ContabancariaResource',
            'route_name' => 'transacao.rest.contabancaria',
            'route_identifier_name' => 'contabancaria_id',
            'collection_name' => 'contabancaria',
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
            'entity_class' => 'Transacao\\V1\\Rest\\Contabancaria\\ContabancariaEntity',
            'collection_class' => 'Transacao\\V1\\Rest\\Contabancaria\\ContabancariaCollection',
            'service_name' => 'contabancaria',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Transacao\\V1\\Rest\\Cartao\\Controller' => 'HalJson',
            'Transacao\\V1\\Rest\\Contabancaria\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'Transacao\\V1\\Rest\\Cartao\\Controller' => array(
                0 => 'application/vnd.transacao.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Transacao\\V1\\Rest\\Contabancaria\\Controller' => array(
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
            'Transacao\\V1\\Rest\\Contabancaria\\Controller' => array(
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
            'Transacao\\V1\\Rest\\Contabancaria\\ContabancariaEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'transacao.rest.contabancaria',
                'route_identifier_name' => 'contabancaria_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Transacao\\V1\\Rest\\Contabancaria\\ContabancariaCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'transacao.rest.contabancaria',
                'route_identifier_name' => 'contabancaria_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Transacao\\V1\\Rest\\Cartao\\Controller' => array(
            'input_filter' => 'Transacao\\V1\\Rest\\Cartao\\Validator',
        ),
        'Transacao\\V1\\Rest\\Contabancaria\\Controller' => array(
            'input_filter' => 'Transacao\\V1\\Rest\\Contabancaria\\Validator',
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
        'Transacao\\V1\\Rest\\Contabancaria\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'nrconta',
            ),
            1 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cpf',
            ),
            2 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cnpj',
            ),
            3 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'banco',
            ),
            4 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'nrconta',
            ),
            5 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'tipoconta',
            ),
            6 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'nragencia',
            ),
            7 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'codpessoa',
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
            'Transacao\\V1\\Rest\\Contabancaria\\Controller' => array(
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
