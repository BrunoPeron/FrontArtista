<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Pessoa\\V1\\Rest\\Pessoa\\PessoaResource' => 'Pessoa\\V1\\Rest\\Pessoa\\PessoaResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'pessoa.rest.pessoa' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/pessoa[/:pessoa_id]',
                    'defaults' => array(
                        'controller' => 'Pessoa\\V1\\Rest\\Pessoa\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'pessoa.rest.pessoa',
        ),
    ),
    'zf-rest' => array(
        'Pessoa\\V1\\Rest\\Pessoa\\Controller' => array(
            'listener' => 'Pessoa\\V1\\Rest\\Pessoa\\PessoaResource',
            'route_name' => 'pessoa.rest.pessoa',
            'route_identifier_name' => 'pessoa_id',
            'collection_name' => 'pessoa',
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
            'entity_class' => 'Pessoa\\V1\\Rest\\Pessoa\\PessoaEntity',
            'collection_class' => 'Pessoa\\V1\\Rest\\Pessoa\\PessoaCollection',
            'service_name' => 'pessoa',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Pessoa\\V1\\Rest\\Pessoa\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'Pessoa\\V1\\Rest\\Pessoa\\Controller' => array(
                0 => 'application/vnd.pessoa.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Pessoa\\V1\\Rest\\Pessoa\\Controller' => array(
                0 => 'application/vnd.pessoa.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Pessoa\\V1\\Rest\\Pessoa\\PessoaEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'pessoa.rest.pessoa',
                'route_identifier_name' => 'pessoa_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Pessoa\\V1\\Rest\\Pessoa\\PessoaCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'pessoa.rest.pessoa',
                'route_identifier_name' => 'pessoa_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Pessoa\\V1\\Rest\\Pessoa\\Controller' => array(
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
        'Pessoa\\V1\\Rest\\Pessoa\\Controller' => array(
            'input_filter' => 'Pessoa\\V1\\Rest\\Pessoa\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Pessoa\\V1\\Rest\\Pessoa\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'nomep',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'sobrenome',
            ),
            2 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cpf',
            ),
            3 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'idade',
            ),
            4 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'sexo',
            ),
            5 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'profissao',
            ),
            6 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'descricao',
            ),
            7 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'pais',
            ),
            8 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'estado',
            ),
            9 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cidade',
            ),
            10 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'bairro',
            ),
            11 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'rua',
            ),
            12 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'complemento',
            ),
            13 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cep',
            ),
            14 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'infadd',
            ),
            15 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'datanasc',
            ),
            16 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'username',
            ),
            17 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'password',
            ),
            18 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'confirmpassword',
            ),
        ),
    ),
);
